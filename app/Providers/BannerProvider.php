<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BannerProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\RepositoryEloquent\Banner\BannerInterface',
            'App\RepositoryEloquent\Banner\BannerRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
