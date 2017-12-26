<?php

namespace App\Modules\ContentManager\Controllers;

use App\Facades\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Theme;
use App\Modules\ContentManager\Models\Themes;
use App\Modules\ContentManager\Models\ThemeMeta;
use App\Facades\Admin;

class ThemeController extends Controller
{
    public function index()
    {
        // $model = Themes::orderBy('status', 'desc')->where('is_publish', true)->get();
        $model = Themes::where('theme_type_id', '<>', 3)->orderBy('status', 'desc')->get();
        return view("ContentManager::theme.index", ['models' => $model]);
    }

    public function view($id)
    {
        $node = Themes::find($id);
        return view("ContentManager::theme.view", compact('node'));
    }

    public function update(Request $request)
    {
        try {
            $id = $request->idtheme;
            $reqMeta = $request->meta;
            $theme = Themes::find($id);
            // Get before meta data of theme
            $beforeMeta = ThemeMeta::metaGroup('options')->get();

            // Update meta data of theme if it exists in DB
            foreach ($beforeMeta as $value) {
                $meta = unserialize($value->meta_value);
                if (isset($reqMeta[$value->meta_key])) {
                    $newMeta = Helper::recursiveMeta($meta, $reqMeta[$value->meta_key]);
                    /*$theme->meta()
                        ->where('meta_key', $value->meta_key)
                        ->update(['meta_key' => $value->meta_key, 'meta_value' => serialize($newMeta)]);*/

                    ThemeMeta::where('theme_id', $id)->where('meta_key', $value->meta_key)->update(['meta_value' => serialize($newMeta)]);
                }
            }

        } catch (\Exception $exception) {

        }

        return redirect(Admin::StrURL('contentManager/theme/' . $id))->with('success', 'Theme options are updated successfully');
    }

    public function active($id, Request $request)
    {
        $activeTheme = Themes::find($id);
        Theme::setActive($activeTheme);
        $request->session()->flash('response', [
            'success' => true,
            'message' => array("Theme {$activeTheme->name} has been activated.")
        ]);

        return redirect(Admin::StrURL('contentManager/theme'));
    }

    /**
     * Form install theme
     *
     * @return view
     */
    public function install()
    {
        $model = Themes::orderBy('status', 'desc')
            ->get();

        return view('ContentManager::theme.install', ['models' => $model]);
    }

    /**
     * Process install theme
     *
     * @param Request $request
     * @return Illuminate\Response redirect
     */
    public function installed(Request $request)
    {
        try {
            if (!$request->hasFile('theme_zip')) {
                throw new \Exception('Please select a theme to install.');
            }

            $themeZip = $request->file('theme_zip');
            if (!$themeZip->isValid()) {
                throw new \Exception('Theme is valid.');
            }

            $clientMimeType = $themeZip->getClientMimeType();
            $extension = $themeZip->extension();
            if ((!in_array($clientMimeType, ["application/x-zip-compressed", "application/octet-stream"]))
                || ('zip' != $extension)
            ) {
                throw new \Exception('You must install theme in a .zip format');
            }

            $clientOriginalName = $themeZip->getClientOriginalName();
            $themeName = explode(".{$extension}", $clientOriginalName)[0];
            $themeZip->move(app_path('Themes/upload'), $clientOriginalName);

            $install = Theme::install($themeName);
            if (Theme::error()) {
                $errors = implode(Theme::getErrors(), ", ");
                throw new \Exception($errors);
            }

            $request->session()->flash('response', [
                'success' => true,
                'message' => array("Theme {$install['data']['name']} is installed successfully.")
            ]);
        } catch (\Exception $exception) {
            $messages = $exception->getMessage();
            $request->session()->flash('response', [
                'success' => false,
                'message' => is_array($messages) ? $messages : array($messages)
            ]);

            return redirect(Admin::route('contentManager.theme.install'));
        }

        return redirect(Admin::route('contentManager.theme'));
    }

    /**
     * Uninstall theme
     *
     * @param Request $request
     * @param string $themeName
     * @response mixed
     */
    public function uninstall(Request $request, $id)
    {
        try {
            $theme = Themes::find($id);
            $themeName = $theme->name;
            $machineName = $theme->machine_name;
            Theme::uninstall($machineName);

            if (Theme::error()) {
                $errors = implode(Theme::getErrors(), ", ");
                throw new \Exception($errors);
            }

            $request->session()->flash('response', [
                'success' => true,
                'message' => array("Theme {$themeName} is uninstalled successfully.")
            ]);
        } catch (\Exception $exception) {
            $messages = $exception->getMessage();
            $request->session()->flash('response', [
                'success' => false,
                'message' => is_array($messages) ? $messages : array($messages)
            ]);

        }

        redirect(Admin::route('contentManager.theme'));
    }

}
