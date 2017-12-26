<?php

namespace App\Modules\ContentManager\Controllers;

use Illuminate\Http\Request;
use App\Modules\ContentManager\Models\Articles;
use App\Http\Controllers\Controller;
use Admin;
use Theme;
use Trans;

class PageController extends Controller
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
            "trans.{$locale['locale']}.post_title" => "title",
            "trans.{$locale['locale']}.post_content" => "content",
            "status" => "status",
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Articles::where('post_type', 'page')->orderBy('id', 'desc')->paginate(10);
        return view("ContentManager::page.index", ['model' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $layouts = [];
        $theme = $this->currentTheme();
        if (!empty($theme)) {
            $meta = $theme->meta()->optionsKey('layouts')->first();
            $layouts = $meta->getOption('layout_style');
        }
        $layouts = is_array($layouts) ? $layouts : [$layouts => $layouts];

        return view("ContentManager::page.create", ["model" => "", 'layouts' => $layouts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Articles();

        $locale = Trans::locale();
        $this->validate($request, [
            "trans.{$locale}.post_title" => 'required|max:255',
            "trans.{$locale}.post_content" => 'required',
            "status" => 'required',
        ], $this->messages, $this->attributes);

        $model->post_author = \Auth::guard('admin')->user()->id;
        $model->post_type = "page";
        $model->post_name = str_slug($request['trans'][$locale]['post_title'], "-");
        $model->post_status = $request->status;
        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Create page ' . $request['trans'][$locale]['post_title']);

        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->post_title = $input['post_title'];
            $model->translateOrNew($locale)->post_content = $input['post_content'];
        }
        $model->save();

        foreach ($request->meta as $key => $value) {
            $model->meta()->updateOrCreate(["meta_key" => $key], ["meta_key" => $key, "meta_value" => $value]);
        }

        return redirect(Admin::StrURL('contentManager/page'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $model = Articles::where("post_name", $slug)->where("post_type", "page")->where('post_status', 'publish')->firstOrFail();
        $layout = empty($model->getMetaValue('layout')) ? Theme::layout('page') : $model->getMetaValue('layout');
        $appTitle = $model->post_title;

        if (view()->exists(Theme::pageNode('page', $model->post_name))) {
            return view(Theme::pageNode('page', $model->post_name), compact('model', 'appTitle', 'layout'));
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
        $layouts = [];
        $theme = $this->currentTheme();
        if (!empty($theme)) {
            $meta = $theme->meta()->optionsKey('layouts')->first();
            $layouts = $meta->getOption('layout_style');
        }
        $layouts = is_array($layouts) ? $layouts : [$layouts => $layouts];
        $model = Articles::find($id);

        return view("ContentManager::page.update", ['model' => $model, 'layouts' => $layouts]);
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
        $model = Articles::find($id);
        $locale = Trans::locale();
        $this->validate($request, [
            "trans.{$locale}.post_title" => 'required|max:255',
            "trans.{$locale}.post_content" => 'required',
            "status" => 'required',
        ], $this->messages, $this->attributes);
        $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $request->post_content);
        $model->post_type = "page";
        $model->post_name = str_slug($request['trans'][$locale]['post_title'], "-");
        $model->post_status = $request->status;
        $model->save();
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Update page ' . $request->post_title);
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->post_title = $input['post_title'];
            $model->translateOrNew($locale)->post_content = $input['post_content'];
        }
        $model->save();
        foreach ($request->meta as $key => $value) {
            $model->meta()->updateOrCreate(["meta_key" => $key], ["meta_key" => $key, "meta_value" => $value]);
        }
        return redirect(Admin::StrURL('contentManager/page'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $tmp = explode(",", $id);
        if (is_array($tmp)) {
            Articles::destroy($tmp);
        } else {
            Articles::destroy($id);
        }
        $request->session()->flash('response', ['success' => true, 'message' => ['The page has been deleted successfully.']]);
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Delete page id :' . $id);
    }
}
