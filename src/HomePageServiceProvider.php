<?php

namespace Pnkjwebspero\Changepage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

class HomePageServiceProvider extends ServiceProvider
{
    public function boot()
    {
    //    include __DIR__.'/routes.php';
    }

    // public function register()
    // {
    //     // $this->app->singleton('file-adder', function () {
    //     //     return new \Changepage\Src\Changepage();
    //     // });
    //     $this->app->make('Pnkjwebspero\Changepage\HomePageController');
    //     $this->loadViewsFrom(__DIR__.'/views','changepage');
    // }

    public function register(){

        if ($this->app->runningInConsole()) {
            $this->commands([
                ButtonCommand::class,
                // ControllersCommand::class,
                // UiCommand::class,
            ]);
        }
        // if ($this->app->runningInConsole()) {
        //     $resourcePath = resource_path('views');
        //     if (!File::exists($resourcePath)) {
        //         File::makeDirectory($resourcePath);
        //     }
        //     File::put($resourcePath . '/new-file.txt', 'This is a new file created by composer update.');
        // }
    }
}
