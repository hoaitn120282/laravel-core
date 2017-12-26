<?php

namespace App\Modules\ContentManager\Controllers;

use Illuminate\Http\Request;
use App\Modules\ContentManager\Models\Articles;
use App\Http\Controllers\Controller;
use Admin;
use Theme;
use Trans;
use Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Articles::where('post_type', 'doctor')->orderBy('id', 'desc')->paginate(10);
        return view("ContentManager::doctor.index", ['model' => $model]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $theme = $this->currentTheme();
        $meta = $theme->meta()->optionsKey('layouts')->first();
        $layouts = $meta->getOption('layout_style');
        $layouts = is_array($layouts) ? $layouts : [$layouts => $layouts];

        return view("ContentManager::doctor.create", ["model" => "", 'layouts' => $layouts]);
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
        $validator = Validator::make($request->all(), [
            "trans.{$locale}.post_title" => 'required|max:255',
            "trans.{$locale}.post_excerpt" => 'required',
            "trans.{$locale}.post_content" => 'required',
            "meta.appointment_link" => 'required|url',
            "status" => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.doctor.create'))->withInput($request->input());
        }
        $model->post_author = \Auth::guard('admin')->user()->id;
        $model->post_type = "doctor";
        $model->post_name = str_slug($request['trans'][$locale]['post_title'], "-");
        $model->post_status = $request->status;
        $model->save();
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->post_title = $input['post_title'];
            $model->translateOrNew($locale)->post_excerpt = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $input['post_excerpt']);
            $model->translateOrNew($locale)->post_content = $input['post_content'];
        }
        if ($model->save()) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The doctor has been created successfully.']
            ]);

            Admin::userLog(\Auth::guard('admin')->user()->id, 'Create doctor ' . $request['trans'][$locale]['post_title']);
            foreach ($request->meta as $key => $value) {
                $model->meta()->updateOrCreate(["meta_key" => $key], ["meta_key" => $key, "meta_value" => $value]);
            }

            return redirect(Admin::route('contentManager.doctor.index'));
        } else {
            $request->session()->flash('response', [
                'success' => false,
                'message' => ['The doctor has been created failure.']
            ]);
        }

        return redirect(Admin::route('contentManager.doctor.create'))->withInput($request->input());
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

        return view(Theme::pageNode('page', $model->post_name), compact('model', 'appTitle', 'layout'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $theme = $this->currentTheme();
        $meta = $theme->meta()
            ->optionsKey('layouts')
            ->first();
        $layouts = $meta->getOption('layout_style');
        $layouts = is_array($layouts) ? $layouts : [$layouts => $layouts];
        $model = Articles::find($id);

        return view("ContentManager::doctor.update", ['model' => $model, 'layouts' => $layouts]);
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
        $validator = Validator::make($request->all(), [
            "trans.{$locale}.post_title" => 'required|max:255',
            "trans.{$locale}.post_excerpt" => 'required',
            "trans.{$locale}.post_content" => 'required',
            "meta.appointment_link" => 'required|url',
            "status" => 'required',
        ]);
        if ($validator->fails()) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => $validator->errors()->all()
            ]);

            return redirect(Admin::route('contentManager.doctor.edit', ['id' => $id]))->withInput($request->input());
        }
        $model->post_type = "doctor";
        $model->post_name = str_slug($request['trans'][$locale]['post_title'], "-");
        $model->post_status = $request->status;
        $model->save();
        foreach ($request['trans'] as $locale => $input) {
            $model->translateOrNew($locale)->post_title = $input['post_title'];
            $model->translateOrNew($locale)->post_excerpt = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $input['post_excerpt']);
            $model->translateOrNew($locale)->post_content = $input['post_content'];
        }
        if ($model->save()) {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The doctor has been updated successfully.']
            ]);

            Admin::userLog(\Auth::guard('admin')->user()->id, 'Update doctor ' . $request->post_title);
            foreach ($request->meta as $key => $value) {
                $model->meta()->updateOrCreate(["meta_key" => $key], ["meta_key" => $key, "meta_value" => $value]);
            }
            
            return redirect(Admin::route('contentManager.doctor.index'));
        } else {
            $request->session()->flash('response', [
                'success' => true,
                'message' => ['The doctor has been updated failure.']
            ]);
        }

        return redirect(Admin::route('contentManager.doctor.edit', ['id' => $id]))->withInput($request->input());
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
        $request->session()->flash('response', ['success' => true, 'message' => ['The doctor information has been deleted successfully.']]);
        Admin::userLog(\Auth::guard('admin')->user()->id, 'Delete page id :' . $id);
    }
}
