<?php

namespace DraperStudio\Commentable;

use Illuminate\Support\ServiceProvider;
use Baum\Providers\BaumServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->register(BaumServiceProvider::class);
    }
}
