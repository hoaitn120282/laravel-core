<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Trans;
use App;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $locale = 'en';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
        parent::boot($router);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        $this->mapWebLocaleRoutes($router);


        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    protected function mapWebLocaleRoutes(Router $router)
    {

        $this->locale = App::getLocale();
        $router->get('/', function () {
            return redirect($this->locale);
        });

        $locales = Schema::hasTable('countries') ? \App\Modules\LanguageManager\Models\Countries::all()->pluck('locale')->toArray() : [];
        $locale = \Illuminate\Support\Facades\Request::segment(1);

        if (in_array($locale, $locales)) {
            $this->locale = Trans::setLocale($locale)->locale();

        }

        $router->group([
            'prefix' => $this->locale,
            'middleware' => ['web'],
        ], function ($router) {
            require app_path('Http/routes/web.php');
        });
    }
}
