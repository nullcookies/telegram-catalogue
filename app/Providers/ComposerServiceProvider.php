<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(
            'frontend.layouts.layout', 'App\Http\ViewComposers\NavigationComposer'
        );
        \View::composer(
            'frontend.cabinet.*', 'App\Http\ViewComposers\TopThreeChannelsComposer'
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
