<?php

namespace DraperStudio\Commentable;

use Illuminate\Support\ServiceProvider;

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
        $timestamp = date('Y_m_d_His', time());

        $this->publishes([
            __DIR__.'/../database/migrations/create_comments_table.php' => database_path('/migrations/'.$timestamp.'_create_comments_table.php'),
        ], 'migrations');
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }
}
