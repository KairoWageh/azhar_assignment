<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\contracts\BaseRepositoryInterface',
            'App\Repository\sql\BaseRepository'
        );

        $this->app->bind(
            'App\Repository\contracts\UserRepositoryInterface',
            'App\Repository\sql\UserRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
