<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //for getting router name in view file
        View::composer('*', function ($view) {
            $route = request()->route();
            $currentRouteName = $route ? $route->getName() : null;
            $view->with('currentRouteName', $currentRouteName);
        });    
    }
}
