<?php

namespace App\Modules\ContentManager\Controllers;

use App\Modules\ContentManager\Models\Articles;
use Illuminate\Http\Request;
use App\Modules\ContentManager\Models\Terms;
use App\Modules\ContentManager\Models\TermRelationships;
use App\Facades\Admin;
use App\Http\Controllers\Controller;
use App\Facades\Theme;
use Validator;
use Trans;

class CategoryController extends Controller
{
    protected $messages;
    protected $attributes = [];

    public function __construct()
    {
        $locale = Trans::currentLocale();
        $this->messages = [
            'required' => "{$locale['name']} is active, :attribute in this language are required.",
            'max' => 'The :attribute may not be greater than :max characters.'
        ];
        $this->attributes = [
            "trans.{$locale['locale']}.name" => "name",
            "parent" => "parent",
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = "";
        $nodes = Terms::where("taxonomy", "category")->orderBy('term_id', 'desc')->paginate(10);
        $category = Terms::where("taxonomy", "category")
            ->where("parent", 0)
            ->get();

        return view("ContentManager::category.index", compact('model', 'nodes', 'category'));
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

        return view("ContentManager::category.create", compact('model', 'category'));
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
            'parent' => 'required',
        ], $this->messages, $this->attributes);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.category.create'))->withInput($request->input());
        }

        if (!empty(trim($request->slug))):
            $model->slug = str_slug($request->slug, "-");
        else:
            $model->slug = str_slug($request['trans'][$locale]['name'], "-");
        endif;
        $model->term_group = 0;
        $model->taxonomy = "category";
        $model->parent = $request->parent;
        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Create category ' . $request['trans'][$locale]['name']);
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->name = $input['name'];
            $model->translateOrNew($locale)->description = $input['description'];
        }
        $response = $model->save();

        if ($request->ajax()) {
            return json_encode(["id" => $model->term_id, "parent" => $model->parent]);
        }

        if ($response) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The category has been created successfully.']
            ]);

            return redirect(Admin::StrURL('contentManager/category'));
        } else {
            $request->session()->flash('response', [
                'success' => false,
                'message' => ['The category has been created failure.']
            ]);
        }


        return redirect(Admin::route('contentManager.category.create'))->withInput($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $model = Terms::where("slug", $slug)->where('taxonomy', 'category')->firstOrFail();
        $nodes = $model->posts()->paginate(2);
        $layout = Theme::layout('category');
        $appTitle = $model->name;

        if (view()->exists(Theme::pageNode('category', $model->slug))) {
            return view(Theme::pageNode('category', $model->slug), compact('model', 'nodes', 'appTitle', 'layout'));
        }
        return abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function news()
    {
        $model = null;
        $nodes = Articles::where('post_type', 'post')->orderBy('id', 'desc')->paginate(2);
        $layout = Theme::layout('category');
        $appTitle = "News";

        if(request()->ajax()) {
            return response()->json($nodes);
        }

        if (view()->exists(Theme::pageNode('category', '_news'))) {
            return view(Theme::pageNode('category', '_news'), compact('model', 'nodes', 'appTitle', 'layout'));
        }
        return abort(404);
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
        $nodes = Terms::where("taxonomy", "category")->orderBy('term_id', 'desc')->paginate(10);
        $category = Terms::where("taxonomy", "category")
            ->where("parent", 0)
            ->get();

        return view("ContentManager::category.update", compact('model', 'nodes', 'category'));
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
            'parent' => 'required',
        ], $this->messages, $this->attributes);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.category.edit', ['id' => $id]))->withInput($request->input());
        }
        if (!empty(trim($request->slug))):
            $model->slug = str_slug($request->slug, "-");
        else:
            $model->slug = str_slug($request['trans'][$locale]['name'], "-");
        endif;
        $model->term_group = 0;
        $model->taxonomy = "category";
        $model->parent = $request->parent;
        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Update category ' . $request['trans'][$locale]['name']);
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->name = $input['name'];
            $model->translateOrNew($locale)->description = $input['description'];
        }
        $response = $model->save();

        if ($response) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The category has been updated successfully.']
            ]);

            return redirect(Admin::StrURL('contentManager/category'));
        } else {
            $request->session()->flash('response', [
                'success' => false,
                'message' => ['The category has been updated failure.']
            ]);
        }

        return redirect(Admin::route('contentManager.category.edit', ['id' => $id]))->withInput($request->input());
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
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Delete category id :' . $id);
    }
}
