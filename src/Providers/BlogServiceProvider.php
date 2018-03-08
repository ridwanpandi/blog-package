<?php

namespace Ridwanpandi\Blog\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        include (__DIR__."/../Routes/web.php");
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        //include (__DIR__."/../../vendor/autoload.php");

        // Blog Repositories
        $this->app->singleton(
            \Ridwanpandi\Blog\Repositories\BlogRepository::class,
            \Ridwanpandi\Blog\Repositories\BlogEloquent::class
        );
        // end Blog Repositories

        $this->loadMigrationsFrom(__DIR__.'/../Database');

        $this->app->make('Ridwanpandi\Blog\Http\Controllers\BlogController');
        $this->app->make('Ridwanpandi\Blog\Http\Controllers\TokenController');
        $this->app->make('Ridwanpandi\Blog\Http\Middleware\JWTMiddleware');
        $this->app->make('Ridwanpandi\Blog\Models\Blog');
        $this->app->make('Ridwanpandi\Blog\Models\Meta');

        $this->publishes([
            __DIR__.'/../Database' => base_path('database/migrations'),
        ]);

        $this->app->routeMiddleware([
            'jwt' => \Ridwanpandi\Blog\Http\Middleware\JWTMiddleware::class,
        ]);
    }

}
