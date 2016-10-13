<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            '*', 'App\Http\Composers\CategoriesComposer'
        );

        View::composer(
            '*', 'App\Http\Composers\PostsComposer'
        );

        View::composer(
            '*', 'App\Http\Composers\TagsComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
