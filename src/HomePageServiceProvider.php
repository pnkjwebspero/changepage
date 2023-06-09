<?php

namespace Pnkjwebspero\Changepage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class HomePageServiceProvider extends ServiceProvider
{
    public function boot()
    {
       include __DIR__.'/routes.php';
    }

    public function register()
    {
        // $this->app->singleton('file-adder', function () {
        //     return new \Changepage\Src\Changepage();
        // });
        $this->app->make('Pnkjwebspero\Changepage\HomePageController');
        $this->loadViewsFrom(__DIR__.'/views','changepage');
    }
}
