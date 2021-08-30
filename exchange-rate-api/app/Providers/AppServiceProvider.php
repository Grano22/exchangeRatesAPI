<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Routing\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('listRoutes', function () {
            $routes = [];
            //$routes = "";
            foreach (Route::getRoutes()->getRoutes() as $route) {
                $action = $route->getAction();
                if (array_key_exists('as', $action)) {
                    $routes[] = $action['as'];
                    //$routes .= $action['as'];
                }
            }
            //dd($route_name);
            return '<?php echo $routes; ?>';
        });
    }

}
