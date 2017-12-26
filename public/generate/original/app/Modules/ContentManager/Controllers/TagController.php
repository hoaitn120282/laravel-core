<?php

namespace App\Modules\ContentManager\Controllers;

use Illuminate\Http\Request;
use App\Modules\ContentManager\Models\Terms;
use App\Modules\ContentManager\Models\TermRelationships;
use App\Http\Controllers\Controller;
use App\Facades\Admin;
use Theme;
use Validator;
use Trans;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = "";
        $nodes = Terms::where("taxonomy", "tag")->orderBy('term_id', 'desc')->paginate(10);
        $category = Terms::where("taxonomy", "tag")
            ->where("parent", 0)
            ->get();
        return view("ContentManager::tag.index", compact('model', 'nodes', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = '';
        $category = Terms::where("taxonomy", "category")->where("parent", 0)->get();

        return view("ContentManager::tag.create", compact('model', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Terms();
        $locale = Trans::locale();
        $validator = Validator::make($request->all(), [
            "trans.{$locale}.name" => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.tag.create'))->withInput($request->input());
        }
        if (!empty(trim($request->slug))):
            $model->slug = str_slug($request->slug, "-");
        else:
            $model->slug = str_slug($request['trans'][$locale]['name'], "-");
        endif;
        $model->term_group = 0;
        $model->taxonomy = "tag";
        $model->parent = 0;
        $model->save();
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->name = $input['name'];
            $model->translateOrNew($locale)->description = $input['description'];
        }
        $response = $model->save();

        if ($response) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The tag has been created successfully.']
            ]);

            return redirect(Admin::StrURL('contentManager/tag'));
        } else {
            $request->session()->flash('response', [
                'success' => false,
                'message' => ['The tag has been created failure.']
            ]);
        }

        return redirect(Admin::route('contentManager.tag.create'))->withInput($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $model = Terms::where("slug", $slug)->where('taxonomy', 'tag')->firstOrFail();
        if (view()->exists(Theme::active() . '.post.archive')) {
            return view(Theme::active() . '.post.archive', ['model' => $model, 'appTitle' => $model->name]);
        } else {
            return view("ContentManager::tag.show", ['model' => $model, 'appTitle' => $model->name]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Terms::find($id);
        $nodes = Terms::where("taxonomy", "tag")->orderBy('term_id', 'desc')->paginate(10);
        $category = Terms::where("taxonomy", "tag")
            ->where("parent", 0)
            ->get();

        return view("ContentManager::tag.update", compact('model', 'nodes', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Terms::find($id);
        $locale = Trans::locale();
        $validator = Validator::make($request->all(), [
            "trans.{$locale}.name" => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.tag.edit', ['id' => $id]))->withInput($request->input());
        }
        if (!empty(trim($request->slug))):
            $model->slug = str_slug($request->slug, "-");
        else:
            $model->slug = str_slug($request['trans'][$locale]['name'], "-");
        endif;
        $model->term_group = 0;
        $model->taxonomy = "tag";
        $model->parent = 0;
        $model->save();
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->name = $input['name'];
            $model->translateOrNew($locale)->description = $input['description'];
        }
        $response = $model->save();

        if ($response) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The tag has been updated successfully.']
            ]);

            return redirect(Admin::StrURL('contentManager/tag'));
        } else {
            $request->session()->flash('response', [
                'success' => false,
                'message' => ['The tag has been updated failure.']
            ]);
        }

        return redirect(Admin::route('contentManager.tag.edit', ['id' => $id]))->withInput($request->input());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tmp = explode(",", $id);
        if (is_array($tmp)) {
            Terms::destroy($tmp);
            foreach ($tmp as $value) {
                TermRelationships::where("term_taxonomy_id", $value)->delete();
            }
        } else {
            Terms::destroy($id);
            TermRelationships::where("term_taxonomy_id", $id)->delete();
        }
    }
}
