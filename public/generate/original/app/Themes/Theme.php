<?php

namespace App\Themes;

use App\Facades\Helper;
use App\Modules\ContentManager\Models\ThemeMeta;
use App\Modules\ContentManager\Models\Themes;
use App\Modules\ContentManager\Models\WidgetGroups;
use File;

class Theme
{
    protected $config;
    protected $defaulTmpPath;
    protected $copyPath;
    protected $activeName;
    protected $activeExtraName;
    protected $activeID;
    private $errors = [];
    private $requireConfigFile = [
        'name',
        'version',
        'author',
        'author_url',
        'description',
        'image_preview',
        'options',
        'widget_position',
        'menu_position',
    ];

    public function __construct()
    {
        $this->config = config("theme");
        $this->defaulTmpPath = [
            "theme" => app_path('Themes/tmp/theme'),
            "widget" => app_path('Themes/tmp/widget'),
            "widgetView" => app_path('Themes/tmp/widgetView'),
            "asset" => app_path('Themes/tmp/asset'),
        ];
        if ($this->config['driver'] == "file") {
            $this->activeName = $this->config['active'];
            $this->activeExtraName = empty($this->config['active_extra']) ? $this->config['active'] : $this->config['active_extra'];
            $this->activeID = isset($this->config['active_id']) ? $this->config['active_id'] : 1;
        } else {
            $active = Themes::where('status', true)->first();
            $this->activeName = $active->machine_name;
            $this->activeExtraName = empty($active->parent) ? $active->machine_name : $active->parent->machine_name;
            $this->activeID = $active->id;
        }
    }

    public function asset($path = '')
    {
        return url("{$this->activeName}/" . trim($path, '/'));
    }

    /**
     * Set theme active
     *
     * @param App\Modules\ContentManager\Models\Themes $model
     * @return $this
     */
    public function setActive($model)
    {
        if ($model instanceof Themes) {
            Themes::where('status', 1)->update(['status' => 0]);
            $model->status = 1;
            $model->save();
            $activeId = $model->id;
            $activeName = $model->theme_root; //empty($model->parent) ? $model->machine_name : $model->parent->machine_name;
            $activeExtraName = $model->machine_name;
            $this->activeID = $activeId;
            $this->activeName = $activeName;
            $this->activeExtraName = $activeExtraName;

            $this->generateThemeConfig([
                'id' => $activeId,
                'name' => $activeName,
                'active_extra' => $activeExtraName,
                'driver' => 'file'
            ]);
        }

        return $this;
    }

    public function getID()
    {
        return $this->activeID;
    }

    public function frontpage()
    {
        return $this->active() . ".frontpage";
    }

    public function strActive()
    {
        return $this->activeName;
    }

    public function strActiveExtra()
    {
        return $this->activeExtraName;
    }

    public function active()
    {
        return "themes." . $this->activeName;
    }

    public function setCopyPath($name)
    {
        return $this->copyPath = [
            "asset" => public_path("themes/" . $name),
            "theme" => resource_path('views/themes/' . $name),
            "widgetView" => resource_path('views/widgets/' . $name),
            "widget" => app_path('Widgets/' . $name),
        ];
    }

    public function checkFileExist($path)
    {
        return file_exists($path);
    }

    public function createThemeDir($name)
    {
        $copyPath = $this->setCopyPath($name);
        foreach ($copyPath as $key => $value) {
            File::makeDirectory($value);
        }
    }

    public function checkFileConfig($name, $default = true)
    {
        $pathFile = $this->setPathConfig($name, $default);
        if ($this->checkFileExist($pathFile)) {
            $file = include_once $pathFile;
            foreach ($this->requireConfigFile as $value) {
                if (!isset($file[$value])) {
                    $this->errors[] = $value . " Not found";
                }
            }

            return $file;
        } else {
            $this->errors[] = "config.php not found";
        }
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function error()
    {
        if (count($this->errors) > 0) {
            return true;
        }

        return false;
    }

    public function install($name)
    {
        $path = app_path('Themes/upload') . "/" . $name . ".zip";
        if ($this->checkFileExist($path)):
            Helper::extract(app_path('Themes/tmp'), $path);
            $file = $this->checkFileConfig($name, false);
            $themeName = $file['name'];
            $machineName = uniqid("Sanmax");
            $countTheme = Themes::where('name', $themeName)->count();
            if ($countTheme > 0) {
                throw new \Exception("Theme {$themeName} has been installed already. Please choose other theme.");
            }

            $this->insertToDB($machineName, false);
            if (!$this->error()) {
                $copyPath = $this->setCopyPath($machineName);
                $this->createThemeDir($machineName);
                foreach ($this->defaulTmpPath as $key => $value) {
                    File::copyDirectory($value, $copyPath[$key]);
                }
                $this->makeWidgets($machineName);
            }
            $this->removeTmp();
            // delete file uploaded
            if (File::isDirectory($path)) {
                File::deleteDirectory($path);
            }

            return array('success' => true, 'data' => ['name' => $themeName]);
        else:
            $this->errors[] = "file " . $name . ".zip not found";

            return array('success' => false);
        endif;
    }

    public function uninstall($machineName)
    {
        $theme = Themes::where('machine_name', $machineName)->first();
        if (empty($theme)) {
            return false;
        }
        $copyPath = $this->setCopyPath($machineName);
        $file = app_path('Themes/upload') . "/" . $machineName . ".zip";
        foreach ($copyPath as $key => $value) {
            if (File::isDirectory($value)) {
                File::deleteDirectory($value);
            }
        }
        if (File::exists($file)) {
            File::delete($file);
        }
        $this->deleteFromDB($machineName);

        return true;
    }

    public function setCompress($name)
    {
        $this->removeTmp();
        $copyPath = $this->setCopyPath($name);
        foreach ($this->defaulTmpPath as $key => $value) {
            File::makeDirectory($value);
            File::copyDirectory($copyPath[$key], $value);
        }
        $pathZip = app_path('Themes/upload') . "/" . $name . ".zip";
        if (File::exists($pathZip)) {
            File::delete($pathZip);
        }
        Helper::compress(app_path('Themes/tmp'), $pathZip);
        $this->removeTmp();
    }

    private function removeTmp()
    {
        foreach ($this->defaulTmpPath as $key => $value) {
            if (File::isDirectory($value)) {
                File::deleteDirectory($value);
            }
        }
    }

    public function option($key, $name, $defaultValue = "")
    {
        $tmp = ThemeMeta::where('theme_id', $this->activeID)->where('meta_group', 'options')->where('meta_key', $key)->first();
        $meta = unserialize($tmp->meta_value);

        $res = "";
        foreach ($meta as $value) {
            if ($value['name'] == $name) {
                $res = $value['value'];
                break;
            }
        }
        return $res;
    }

    /**
     * Get layout default
     *
     * @param string $key
     * @return mixed
     */
    public function layout($page = 'default')
    {
        $meta = ThemeMeta::where('theme_id', $this->activeID)->optionsKey('layouts')->first();
        $templates = empty($meta) ? [] : $meta->getOption('layout_style', 'xvalue');

        return isset($templates[$page]) ? $templates[$page] : (isset($templates['default']) ? $templates['default'] : null);
    }

    /**
     * Check view has been overwrite
     *
     * @param string $pageType
     * @param string $viewName
     * @return string
     */
    public function pageNode($pageType = 'frontend', $viewName = 'view')
    {
        $themeActive = Theme::active();
        $viewBase = "{$themeActive}.{$pageType}.view";
        $viewOverwrite = "{$themeActive}.{$pageType}.{$viewName}";

        return view()->exists($viewOverwrite) ? $viewOverwrite : (view()->exists($viewBase) ? $viewBase : "ContentManager::{$pageType}.show");
    }

    /**
     * Get file css is activated
     *
     * @param string $fileBase
     * @return string
     */
    public function cssFile($fileBase = "main.css")
    {
        $folder = $this->strActive();
        $active = Theme::strActiveExtra();
        $css_file_base = "/themes/{$folder}/css/{$fileBase}";
        $css_file_generate = "themes/{$folder}/css/{$active}.css";

        return File::exists(public_path($css_file_generate)) ? asset($css_file_generate) : asset($css_file_base);
    }

    public function menu($group)
    {
        $tmp = ThemeMeta::where("theme_id", $this->getID())
            ->where("meta_group", "menu_position")
            ->where("meta_key", $group)
            ->first();
        if (count($tmp) == 0) {
            return null;
        } else {
            return Helper::menu($tmp->meta_value);
        }
    }

    private function setPathConfig($name, $default = true)
    {
        if ($default) {
            $path = $this->setCopyPath($name);
        } else {
            $path = $this->defaulTmpPath;
        }
        return $path['theme'] . "/config.php";
    }

    public function insertToDB($machineName, $default = true)
    {
        $pathFile = $this->setPathConfig($machineName, $default);
        if ($this->checkFileExist($pathFile)) {
            $file = include $pathFile;
            $this->deleteFromDB($machineName);
            $theme = new Themes();
            $theme->name = $file['name'];
            $theme->machine_name = $machineName;
            $theme->theme_root = $machineName;
            $theme->version = $file['version'];
            $theme->author = $file['author'];
            $theme->author_url = $file['author_url'];
            $theme->description = $file['description'];
            $theme->image_preview = asset("themes/{$machineName}/images/{$file['image_preview']}");
            $theme->theme_type_id = $file['theme_type_id'];
            $theme->is_publish = 1;
            $theme->save();
            foreach ($file['widget_position'] as $value) {
                $group = new WidgetGroups();
                $group->theme_id = $theme->id;
                $group->name = $value;
                $group->save();
            }
            foreach ($file['menu_position'] as $value) {
                $meta = new ThemeMeta();
                $meta->theme_id = $theme->id;
                $meta->meta_group = "menu_position";
                $meta->meta_key = $value;
                $meta->meta_value = "";
                $meta->save();
            }
            foreach ($file['options'] as $key => $value) {
                $meta = new ThemeMeta();
                $meta->theme_id = $theme->id;
                $meta->meta_group = "options";
                $meta->meta_key = $key;
                $meta->meta_value = serialize($value);
                $meta->save();
            }
        } else {
            $this->errors[] = "config.php not found";
        }
    }

    private function deleteFromDB($machineName)
    {
        Themes::where("machine_name", $machineName)->delete();
    }

    /**
     * Generate theme config
     *
     * @param array $config
     * @return string $str
     */
    protected function generateThemeConfig($config)
    {
        $themeFile = config_path("theme.php");
        $str = '<?php' . "\n";
        $str .= '$config = [];' . "\n\n";
        $str .= '$config[\'active\'] =\'' . $config['name'] . '\';' . "\n";
        $str .= '$config[\'active_extra\'] =\'' . $config['active_extra'] . '\';' . "\n";
        $str .= '$config[\'active_id\'] =\'' . $config['id'] . '\';' . "\n";
        $str .= '$config[\'driver\'] =\'' . $config['driver'] . '\';' . "\n";
        $str .= "\n" . 'return $config;';
        try {
            $fh = fopen($themeFile, 'w');
            fwrite($fh, $str);
            fclose($fh);
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $str;
    }

    /**
     * Make widgets with template
     *
     * @param string $theme
     */
    protected function makeWidgets($theme)
    {
        try {
            $baseWidget = resource_path("views/themes/{$theme}/generate/widget");
            if (!File::isDirectory($baseWidget)) {
                throw new \Exception('Could not found base widget');
            }
            $files = File::allFiles($baseWidget);
            foreach ($files as $file) {
                $fileName = $file->getFilename();
                $widget = explode(".blade.php", $fileName)[0];
                $this->generateWidget($theme, $widget);
            }

        } catch (\Exception $exception) {
            \Log::info($exception->getMessage());
        }
    }

    /**
     * Generate widget with template
     *
     * @param string $theme
     * @param string $widget
     * @param array $fields
     * @return mixed
     */
    protected function generateWidget($theme, $widget)
    {
        $widgetPath = app_path("Widgets/{$theme}");
        $widgetFilePath = app_path("Widgets/{$theme}/{$widget}.php");
        // Make directory widget
        if (!File::isDirectory($widgetPath)) {
            File::makeDirectory($widgetPath, 0777, true, true);
        }
        if (File::exists($widgetFilePath)) {
            $this->error('Widget already exists!');

            return false;
        }
        $widget_string = \View::make("themes.{$theme}.generate.widget.{$widget}", compact('theme', 'widget'))->render();

        return File::put($widgetFilePath, "<?php\n\n{$widget_string}");
    }
}
