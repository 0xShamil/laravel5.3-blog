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

        View::composer(
            '*', 'App\Http\Composers\SettingsComposer'
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
