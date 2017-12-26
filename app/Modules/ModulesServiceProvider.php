<?php
namespace App\Modules;

use Illuminate\Foundation\AliasLoader;
use Trans;
use Admin;
use Permission;

/**
 * ServiceProvider
 *
 * The service provider for the modules. After being registered
 * it will make sure that each of the modules are properly loaded
 * i.e. with their routes, views etc.
 *
 * @author Kamran Ahmed <kamranahmed.se@gmail.com>
 * @package App\Modules
 */
class ModulesServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public $admin;

    /**
     * Will make sure that the locale
     * @var string
     */
//    public $locale;

    public function boot()
    {
        parent::boot();
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");
        $this->admin = config("module.backend");

        foreach ($modules as $module => $value) {
            if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
                include __DIR__ . '/' . $module . '/routes.php';
            }
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }
            if (is_dir(__DIR__ . '/' . $module . '/Database')) {
                $this->publishes([
                    __DIR__ . '/' . $module . '/Database/' => database_path('/migrations')
                ], 'migrations');
            }
        }

    }

    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Permission', 'App\Facades\Permission');
            $loader->alias('Admin', 'App\Facades\Admin');
            $loader->alias('Trans', 'App\Facades\Trans');

            /*$file = app_path('Helpers/Admin.php');
            if (file_exists($file)) {
                include $file;
            }*/
            $this->app->singleton(Permission::class, function ($app) {
                return new Permission();
            });

            $this->app->singleton(Admin::class, function ($app) {
                return new Admin();
            });

            $this->app->singleton(Trans::class, function ($app) {
                return new Trans();
            });
        });

    }

}