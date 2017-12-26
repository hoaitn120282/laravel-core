<?php

namespace App\Modules\ContentManager\Controllers;

use Illuminate\Http\Request;
use App\Modules\ContentManager\Models\Menus;
use App\Modules\ContentManager\Models\ArticleMeta;
use App\Modules\ContentManager\Models\Articles;
use App\Modules\ContentManager\Models\Terms;
use App\Modules\ContentManager\Models\Options;
use App\Modules\ContentManager\Models\ThemeMeta;
use App\Http\Controllers\Controller;
use DB;
use App\Facades\Admin;
use App\Facades\Theme;
use Trans;

class MenuController extends Controller
{
    public function index($name = "main-menu")
    {
        $groupName = Options::where("name", "menu_name")->first();
        if (!in_array($name, unserialize($groupName->value))) {
            return abort(404);
        }
        $model = Menus::join('post_meta', 'posts.id', '=', 'post_meta.post_id')
            ->where('post_meta.meta_key', '_nav_item_parent')
            ->where('post_meta.meta_value', '')
            ->where('posts.menu_group', $name)
            ->orderBy('posts.menu_order', 'asc')
            ->get();
        $page = Articles::where('post_type', 'page')->where('post_status', 'publish')->orderBy('id', 'desc')->get();
        $post = Articles::where('post_type', 'post')->where('post_status', 'publish')->orderBy('id', 'desc')->get();
        $category = Terms::where("taxonomy", "category")
            ->where("parent", 0)
            ->get();
        $groupActive = $name;
        $themeMeta = ThemeMeta::where("theme_id", Theme::getID())->where("meta_group", "menu_position")->get();
        return view("ContentManager::menu.index", [
            "model" => $model,
            "page" => $page,
            "post" => $post,
            "category" => $category,
            "groupName" => unserialize($groupName->value),
            "groupActive" => $groupActive,
            "themeMenu" => $themeMeta
        ]);
    }

    public function addGroupMenu(Request $request)
    {
        $this->validate($request, [
            'name_group' => 'required',
        ]);
        $groupName = Options::where("name", "menu_name")->first();
        $tmp = unserialize($groupName->value);
        $model = Options::find($groupName->id);
        $tmp[] = str_slug($request->name_group);
        $model->value = serialize($tmp);
        $model->save();
        return redirect(Admin::StrUrl("contentManager/menu"));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'datamenu' => 'required',
        ]);
        $data = $request->datamenu;
        $countData = count($data);
        for ($i = 1; $i < $countData; $i++) {
            $idPost = $data[$i]["id"];
            $label = $data[$i]["label"];
            $model = Menus::find($idPost);
            $model->menu_order = $i;
            $model->save();
            foreach ($label as $locale => $input) {
                $model->translateOrNew($locale)->post_title = $input;
            }
            $model->save();
            ArticleMeta::where("post_id", $idPost)->where("meta_key", "_nav_item_parent")->update(['meta_value' => $data[$i]["parent_id"]]);
        }

        ThemeMeta::where("theme_id", Theme::getID())
            ->where("meta_group", "menu_position")
            ->where("meta_value", $request->group)
            ->update(['meta_value' => '']);

        if ($request->thememenu != "") {
            ThemeMeta::where("theme_id", Theme::getID())
                ->where("meta_group", "menu_position")
                ->where("meta_key", $request->thememenu)
                ->update(['meta_value' => $request->group]);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required',
            "label" => 'required',
        ]);
        $model = new Menus();
        $model->post_author = \Auth::guard('admin')->user()->id;
        $model->post_type = "nav-menu";
        $model->post_name = str_slug($request->label, "-");
        $model->menu_group = $request->group;
        $model->post_mime_type = "nav-menu";
        $model->comment_status = "close";
        $model->save();
        foreach (Trans::languages() as $language) {
            $model->translateOrNew($language->country->locale)->post_title = $request->label;
        }
        $model->save();
        $meta = array(
            array('post_id' => $model->id, 'meta_key' => '_nav_item_parent', 'meta_value' => ""),
            array('post_id' => $model->id, 'meta_key' => '_nav_item_url', 'meta_value' => $request->url),
            array('post_id' => $model->id, 'meta_key' => '_nav_item_type', 'meta_value' => $request->type),
        );
        ArticleMeta::insert($meta);
        $label = [];
        foreach ($model->translations as $translation) {
            $label[$translation->locale] = $translation->post_title;
        }

        return response()->json(['label' => $label, 'url' => $request->url, 'id' => $model->id]);
    }

    public function storemulti(Request $request)
    {
        $this->validate($request, [
            'datamenu' => 'required',
        ]);
        $locale = Trans::locale();
        $res = [];
        foreach ($request->datamenu as $value) {
            $type = $value["type"];
            $model = new Menus();
            $model->post_author = \Auth::guard('admin')->user()->id;
            $model->post_type = "nav-menu";
            $model->post_name = str_slug($value["label"][$locale], "-");
            $model->menu_group = $request->group;
            $model->post_mime_type = "nav-menu";
            $model->comment_status = "close";
            $model->save();
            foreach ($value["label"] as $locale => $input) {
                $model->translateOrNew($locale)->post_title = $input;
            }
            $model->save();
            $meta = array(
                array('post_id' => $model->id, 'meta_key' => '_nav_item_parent', 'meta_value' => ""),
                array('post_id' => $model->id, 'meta_key' => '_nav_item_url', 'meta_value' => $value["url"]),
                array('post_id' => $model->id, 'meta_key' => '_nav_item_type', 'meta_value' => $value["type"]),
            );
            ArticleMeta::insert($meta);
            $res[] = ['label' => $value["label"], 'url' => $value["url"], 'id' => $model->id];
        }

        return response()->json($res);
    }

    public function deleteGroup($name, Request $request)
    {
        try {
            if ("main-menu" == $name) {
                throw new \Exception("It's not allowed to delete Main Menu");
            }

            $groupName = Options::where("name", "menu_name")->first();
            if (empty($groupName)) {
                throw new \Exception("The menu {$name} could not found.");
            }
            $menusGr = unserialize($groupName->value);
            if (!in_array($name, $menusGr)) {
                throw new \Exception("The menu {$name} could not found.");
            }
            $menusGr = array_where($menusGr, function ($key, $value) use ($name) {
                if ($value != $name) {
                    return $value;
                }
            });
            $nodes = Menus::join('post_meta', 'posts.id', '=', 'post_meta.post_id')
                ->where('post_meta.meta_key', '_nav_item_parent')
                ->where('post_meta.meta_value', '')
                ->where('posts.menu_group', $name)
                ->orderBy('posts.menu_order', 'asc')
                ->get();
            foreach ($nodes as $node) {
                foreach ($node->children() as $value) {
                    $this->recursiveDelete($value);
                }
                Menus::destroy($node->id);
            }
            $groupName->value = serialize($menusGr);
            $groupName->save();

            $request->session()->flash('response', [
                'success' => true,
                'message' => array("This menu {$name} has been deleted successfully.")
            ]);
        } catch (\Exception $exception) {
            $messages = $exception->getMessage();
            $request->session()->flash('response', [
                'success' => false,
                'message' => is_array($messages) ? $messages : array($messages)
            ]);
        }
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Delete menu group :' . $name);

        // return redirect(Admin::StrURL('contentManager/menu'));
    }

    public function destroy($id)
    {
        $model = Menus::join('post_meta', 'posts.id', '=', 'post_meta.post_id')
            ->where('posts.id', $id)
            ->first();

        foreach ($model->children() as $value) {
            $this->recursiveDelete($value);
        }

        Menus::destroy($id);
    }

    private function recursiveDelete($data)
    {
        Menus::destroy($data->id);
        foreach ($data->children() as $value) {
            $this->recursiveDelete($value);
        }
    }

}
