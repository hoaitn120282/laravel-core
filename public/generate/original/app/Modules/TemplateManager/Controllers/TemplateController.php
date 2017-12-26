<?php

namespace App\Modules\TemplateManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Validator;
use DB;
use App\Facades\Admin;
use App\Facades\Theme;
use App\Modules\TemplateManager\Models\Template;
use App\Modules\ContentManager\Models\Themes;
use App\Modules\ContentManager\Models\WidgetGroups;
use League\Flysystem\Exception;
use Leafo\ScssPhp\Compiler;
use File;
use View;

class TemplateController extends Controller
{
    /**
     * Show list of templates library.
     *
     * @return Response
     */
    public function index($theme_type = 0)
    {
        if ($theme_type == 0) {
            $nodes = Template::where('theme_type_id', '<>', 3)->paginate(6);
        } else {
            $nodes = Template::where('theme_type_id', '<>', 3)->where('theme_type_id', $theme_type)->paginate(6);
        }
        return view('TemplateManager::index', ['nodes' => $nodes, 'theme_type' => $theme_type]);
    }

    /*
     * View list to create new template
     * @param null
     * @return
     * */
    public function listCreate()
    {
        $nodes = Template::where('theme_type_id', '<>', 3)->paginate();
        return view('TemplateManager::list-create', compact('nodes'));
    }

    /**
     * Create new template from existing templates.
     *
     * @param int $id
     * @return Response
     */
    public function create($id)
    {
        $node = Template::find($id);
        if (empty($node)) {
            return redirect(Admin::route('templateManager.index'));
        }

        return view('TemplateManager::form', compact('node'));
    }

    /**
     * Form install template
     *
     * @return view
     */
    public function install()
    {
        $nodes = Themes::where('theme_type_id', '<>', 3)->orderBy('status', 'desc')->where('parent_id', 0)->paginate();
        return view('TemplateManager::install', ['nodes' => $nodes]);
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

        return redirect(Admin::route('templateManager.index'));
    }

    /**
     * Store new template to database
     *
     * @param int $id
     * @return Response
     */
    public function store(Request $request)
    {
        try {
            $themeId = $request->get('theme_id');
            $input = $request->all();
            $validator = Validator::make($input, ['name' => 'required|max:255',]);
            if ($validator->fails()) {
                throw new \Exception(implode(', ', $validator->errors()->all()));
            }
            $oldTemp = Template::find($themeId);
            if (empty($oldTemp)) {
                throw new \Exception('This template Id doesn\'t exist.');
            }
            $themeType = (1 == $oldTemp['theme_type_id']) ? 'simple' : 'medium';
            $input['name'] = $themeType . '_' . $input['name'];
            if (Template::where('name', $input['name'])->count() > 0) {
                throw new \Exception("The name {$input['name']} has already existed.");
            }
            $tempData = ($oldTemp instanceof Collection) ? clone $oldTemp : clone new Collection($oldTemp);
            $input['parent_id'] = ($tempData['parent_id'] == 0) ? $tempData['id'] : $tempData['parent_id'];
            $input = array_merge($tempData->toArray(), $input);
            $newTemp = $this->storeData($input, $oldTemp);
            $resGen = $this->generateCssFile($newTemp);
            $response = array(
                'success' => true,
                'message' => ['Template has been cloned successfully.']
            );
            if (!empty($newTemp->id) && (0 == $newTemp->is_publish)) {
                $response['message'] = ['Template has been cloned and saved as draft successfully.'];
            }

            if (!$resGen['success']) {
                $response['success'] = false;
                $response['message'] = (array)$resGen['errors'];
            }
            $request->session()->flash('response', $response);

            return redirect(Admin::route('templateManager.edit', ['id' => $newTemp->id]));

        } catch (\Exception $exception) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => (array)$exception->getMessage()
            ]);

            return redirect(Admin::route('templateManager.create', ['id' => $themeId]));
        }
    }

    /**
     * Edit the template.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $node = Template::find($id);
        $isEdit = true;
        if (empty($node)) {
            return redirect(Admin::route('templateManager.index'));
        }

        return view('TemplateManager::form', compact('node', 'isEdit'));
    }

    /**
     * Update the template to database
     *
     * @param int $id
     * @param Request
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->get('meta');
        $temp = Template::find($id);
        if (empty($temp)) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => array("This template Id doesn't exist.")
            ]);

            return redirect(Admin::route('templateManager.index'));
        }
        $temp->image_preview = $request->get('image_preview');
        $temp->save();
        // $this->storeData($input, null, $id);
        $metaOpt = $this->storeMetaOptions($temp, $input);
        $genCss = $this->generateCssFile($temp);

        if (!$metaOpt['success'] || !$genCss['success']) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => array_merge(isset($metaOpt['errors']) ? (array)$metaOpt['errors'] : [], isset($genCss['errors']) ? (array)$genCss['errors'] : [])
            ]);
        } else {
            $request->session()->flash('response', [
                'success' => true,
                'message' => array("{$temp->name} has been updated successfully.")
            ]);
        }


        return redirect(Admin::route('templateManager.edit', ['id' => $id]));
    }

    /**
     * Publish theme
     * @param int $id
     */
    public function publish($id, Request $request)
    {
        $template = Template::find($id);
        $template->is_publish = !$template->is_publish;
        $strPublish = ($template->is_publish == 1 ? 'published' : 'saved as draft');
        $response = array(
            'success' => true,
            'message' => array("{$template->name} has been {$strPublish} successfully."),
            'redirect' => Admin::route('templateManager.index'),
        );
        if (!$template->save()) {
            $response['success'] = false;
            $response['message'] = array("{$template->name} has been {$strPublish} failure.");
            $request->session()->flash('response', $response);

        }
        $request->session()->flash('response', $response);

        return response()->json($response);
    }

    /**
     * Preview template
     * @param int $id
     * @return response
     */
    public function preview($id, Request $request)
    {
        try {
            $template = Template::find($id);
            if (empty($template)) {
                throw new \Exception('This template Id doesn\'t exist.');
            }

            $folder = empty($template->parent) ? $template->machine_name : $template->parent->machine_name;
            $page = $request->get('page', 'index');
            $path_file = resource_path("views/themes/{$folder}/previews/{$page}.blade.php");

            if (File::exists($path_file)) {
                $css_default_name = "{$template->machine_name}.css";
                $css_name = File::exists(public_path("themes/{$folder}/css/{$css_default_name}")) ? "{$css_default_name}" : 'main.css';
                $css_path = "themes/{$folder}/css/{$css_name}";

                return view("themes.{$folder}.previews.{$page}", compact('css_path', 'folder'));
            }

        } catch (\Exception $exception) {
            $request->session()->flash('response', [
                'success' => false,
                'message' => (array)$exception->getMessage()
            ]);

            return redirect(Admin::route('templateManager.index'));
        }
    }

    /**
     * Store data of template
     *
     * @param array $input
     * @param boolean $isCreate
     * @return Template $template
     */
    private function storeData($input, $oldTemp = null, $id = null)
    {
        $template = null;
        $primaryInput = array_except($input, ['meta']);
        $metaInput = $input['meta'];
        if (empty($id)) {
            $primaryInput['machine_name'] = uniqid("Sanmax");
            $primaryInput['theme_root'] = ($oldTemp instanceof Template) ? $oldTemp->theme_root : $primaryInput['machine_name'];
            $primaryInput['status'] = 0;
            $template = Template::create($primaryInput);
            if ($oldTemp instanceof Template) {
                $widgetPosition = $oldTemp->widgetGroups()->get();
                foreach ($widgetPosition as $widget) {
                    $group = new WidgetGroups();
                    $group->theme_id = $template->id;
                    $group->name = $widget->name;
                    $group->save();
                }
            }
        } else {
            $template = Template::find($id);
            $template->update($primaryInput);
        }

        if ($template instanceof Template) {
            $this->storeMeta($template, $metaInput, $oldTemp);
        }

        return empty($template) ? new Collection() : $template;
    }

    private function storeMeta($template, $input, $beforeTemp = null)
    {
        if (!$template instanceof Template) {
            throw new \Exception('First param could not is instanceof Template');
        }

        try {
            $resOps = $this->storeMetaNotOptions($template, $input, $beforeTemp);
            $resNOps = $this->storeMetaOptions($template, $input, $beforeTemp);

            if (!$resOps['success'] || !$resNOps['success']) {
                throw new Exception('Has error when store meta data.');
            }
            return array(
                'success' => true,
                'message' => 'Done',
            );

        } catch (\Exception $exception) {
            return array(
                'success' => false,
                'message' => 'Done',
                'errors' => $exception->getMessage()
            );
        }
    }

    /**
     * Store meta data not must options of template
     *
     * @param Template $template
     * @param array $input
     * @param Template $beforTemp
     */
    private function storeMetaNotOptions($template, $input, $beforeTemp = null)
    {
        if (!$template instanceof Template) {
            throw new \Exception('First param could not is instanceof Template');
        }

        try {
            $cloneTemp = ($beforeTemp instanceof Template) ? $beforeTemp : $template;
            $beforeMeta = $cloneTemp->meta()
                ->where('meta_group', '<>', 'options')
                ->get();
            foreach ($beforeMeta as $meta) {
                if ($beforeTemp instanceof Template) {
                    $metaData = array(
                        'meta_group' => $meta->meta_group,
                        'meta_key' => $meta->meta_key,
                        'meta_value' => $meta->meta_value,
                    );
                    $template->meta()
                        ->create($metaData);
                } else {
                    $template->meta()
                        ->where('meta_group', $meta->meta_group)
                        ->where('meta_key', $meta->meta_key)
                        ->update([
                            'meta_value' => $input[$meta->meta_group][$meta->meta_key]
                        ]);
                }
            }

        } catch (\Exception $exception) {
            return array(
                'success' => false,
                'message' => 'Done',
                'errors' => $exception->getMessage()
            );
        }
    }

    /**
     * Store meta data options of template
     *
     * @param Template $template
     * @param array $input
     * @param boolean $isCreate
     */
    private function storeMetaOptions($template, $input, $beforeTemp = null)
    {
        if (!$template instanceof Template) {
            throw new \Exception('First param could not is instanceof Template');
        }

        try {
            $cloneTemp = ($beforeTemp instanceof Template) ? $beforeTemp : $template;
            $beforeMeta = $cloneTemp->meta()
                ->where('meta_group', 'options')
                ->get();
            foreach ($beforeMeta as $value) {
                $meta = unserialize($value->meta_value);

                foreach ($meta as &$val) {
                    if (isset($input[$value->meta_key][$val['name']])) {
                        if (isset($val['value'])) {
                            $val['value'] = $input[$value->meta_key][$val['name']];
                        }

                        if (isset($val['items']) && is_array($val['items'])) {
                            foreach ($val['items'] as &$item) {
                                if (isset($item['value'])) {
                                    $item['value'] = $input[$value->meta_key][$val['name']][$item['name']];
                                }
                            }
                        }
                    }
                }
                if ($beforeTemp instanceof Template) {
                    $metaData = array(
                        'meta_group' => 'options',
                        'meta_key' => $value->meta_key,
                        'meta_value' => serialize($meta)
                    );

                    $template->meta()
                        ->create($metaData);
                } else {
                    $template->meta()
                        ->where('meta_key', $value->meta_key)
                        ->update(['meta_value' => serialize($meta)]);
                }
            }

            return array(
                'success' => true,
                'message' => 'Done',
            );
        } catch (\Exception $exception) {
            return array(
                'success' => false,
                'message' => 'Done',
                'errors' => $exception->getMessage()
            );
        }

    }

    /**
     * Generate typography css file for template
     *
     * @param Template $template
     * @return array $response
     */
    private function generateCssFile($template)
    {
        try {
            if (!$template instanceof Template) {
                throw new \Exception('First param could not instanceof Template');
            }

            $css = array();
            $file = $template->machine_name . '.css';
            $folder = $template->theme_root;// empty($template->parent) ? $template->machine_name : $template->parent->machine_name;
            $path_theme = public_path("themes/{$folder}");
            $path_css = public_path("themes/{$folder}/css");
            $path_file = public_path("themes/{$folder}/css/{$file}");

            $typography = $template->meta()
                ->optionsKey('typography')
                ->first();
            if ($typography) {
                $typo_vals = $typography->getValue();
                foreach ($typo_vals as $typo) {
                    if (isset($typo['items']) && is_array($typo['items'])) {
                        foreach ($typo['items'] as $item) {
                            if (isset($item['value'])) {
                                $css[str_slug($typo['name'] . "_" . $item['name'], '_')] = $item['value'];
                            }
                        }
                    }
                }
            }

            $general = $template->meta()
                ->optionsKey('general')
                ->first();
            if ($general) {
                $css['custom'] = $general->getOption('customcss');
                $css['general_background_image'] = $general->getOption('background_image');
            }

            $string_sass = View::make("themes.{$folder}.typography", compact('css'))->render();
            $scss_compiler = new Compiler();
            $string_css = $scss_compiler->compile($string_sass);
            if (!File::isDirectory($path_css)) {
                File::makeDirectory($path_css, 0755, true);
            }
            File::put($path_file, $string_css);

            return array(
                'success' => true,
                'message' => 'Done',
                'data' => array(
                    'path' => $path_file
                )
            );
        } catch (\Exception $exception) {
            return array(
                'success' => false,
                'message' => 'Done',
                'errors' => $exception->getMessage()
            );
        }
    }

    /* Uninstall theme
    *
    * @param Request $request
    * @param string $themeName
    * @response mixed
    */
    public function uninstall(Request $request, $id)
    {
        try {
            // Could not uninstall if theme has parent id = 0
            $template = Template::find($id);
            if (0 == $template->parent_id) {
                throw new \Exception('It\'s not allowed to delete installed theme.');
            }

            if ($template->clinics()->count() > 0) {
                throw new \Exception("This template has been in use. It's not allowed to delete it.");
            }
            $themeName = $template->name;
            $machineName = $template->machine_name;
            Theme::uninstall($machineName);

            if (Theme::error()) {
                $errors = implode(Theme::getErrors(), ", ");
                throw new \Exception($errors);
            }

            $request->session()->flash('response', [
                'success' => true,
                'message' => array("Theme {$themeName} has been deleted successfully.")
            ]);
        } catch (\Exception $exception) {
            $messages = $exception->getMessage();
            $request->session()->flash('response', [
                'success' => false,
                'message' => is_array($messages) ? $messages : array($messages)
            ]);
        }

        redirect(Admin::route('templateManager.index'));
    }
}