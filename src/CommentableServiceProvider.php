<?php

namespace DraperStudio\Commentable;

use Illuminate\Support\ServiceProvider;
use Baum\Providers\BaumServiceProvider;

/**
 * Class CommentableServiceProvider.
 */
class CommentableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('/migrations'),
        ], 'migrations');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->register(BaumServiceProvider::class);
    }
}
