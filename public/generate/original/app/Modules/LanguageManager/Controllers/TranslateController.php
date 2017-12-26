<?php

namespace App\Modules\LanguageManager\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\LanguageManager\Models\Language;
use App\Modules\LanguageManager\Models\Translate;
use Illuminate\Http\Request;
use Validator;
use DB;
use File;
use View;
use App\Facades\Admin;

class TranslateController extends Controller
{
    /**
     * Get all translate
     */
    public function index()
    {
        $nodes = Translate::paginate();
        $languages = Language::where('status', true)->orderBy('language_id', 'desc')->get();

        return view('LanguageManager::translate.index', compact('nodes', 'languages'));
    }

    /**
     * Translate key with languages
     *
     * @return response
     */
    public function create()
    {
        $languages = Language::where('status', true)->orderBy('language_id', 'desc')->get();

        return view('LanguageManager::translate.create', compact('languages'));
    }

    /**
     * Store to DB
     *
     * @param Request $request
     * @return response
     */
    public function store(Request $request)
    {
        try {
            $input = [
                'trans_key' => $request->get('trans_key'),
                'trans_meta' => serialize($request->get('trans_meta')),
            ];
            $validator = Validator::make($input, [
                'trans_key' => 'required'//alpha_dash
            ]);
            if ($validator->fails()) {
                throw new \Exception(serialize($validator->errors()->all()));
            }
            $trans = Translate::create($input);
            if (empty($trans->id)) {
                throw new \Exception(serialize(["The {$input['trans_key']} could not translate."]));
            }
            $request->session()->flash('response', [
                'success' => false,
                'message' => ["The {$input['trans_key']} has been created successfully."]
            ]);

            return redirect(Admin::route('languageManager.translate.index'));
        } catch (\Exception $exception) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => unserialize($exception->getMessage())
            ]);

            return redirect(Admin::route('languageManager.translate.create'));
        }
    }

    /**
     * Edit translate languages with key
     *
     * @param int $id
     * @param Request
     * @return response
     */
    public function edit($id, Request $request)
    {
        $languages = Language::where('status', true)->orderBy('language_id', 'desc')->get();
        $node = Translate::find($id);

        return view('LanguageManager::translate.edit', compact('languages', 'node'));
    }

    /**
     * Update translate
     *
     * @param int $id
     * @param Request
     * @return response
     */
    public function update($id, Request $request)
    {
        try {
            $input = [
                'trans_key' => $request->get('trans_key'),
                'trans_meta' => serialize($request->get('trans_meta')),
            ];
            $validator = Validator::make($input, [
                'trans_key' => 'required'//alpha_dash
            ]);
            if ($validator->fails()) {
                throw new \Exception(serialize($validator->errors()->all()));
            }
            $trans = Translate::find($id)->update($input);
            if (!$trans) {
                throw new \Exception(serialize(["The {$input['trans_key']} could not translate."]));
            }
            $request->session()->flash('response', [
                'success' => false,
                'message' => ["The {$input['trans_key']} has been updated successfully."]
            ]);

            return redirect(Admin::route('languageManager.translate.index'));
        } catch (\Exception $exception) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => unserialize($exception->getMessage())
            ]);

            return redirect(Admin::route('languageManager.translate.edit', ['id'=>$id]));
        }
    }

    /**
     * Destroy translate
     */
    public function destroy($id)
    {
        $tmp = explode(",", $id);
        if(is_array($tmp)){
            Translate::destroy($tmp);
        }else{
            Translate::destroy($id);
        }
        Admin::userLog(\Auth::guard('admin')->user()->id,'Delete translation id :'.$id);
    }


}