<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        switch (env('APP_ENV')) {
            case 'test':
                // TODO
            default:
                $this->app->bind('App\Repositories\User\UserRepository', 'App\Repositories\User\UserRepositoryImple');
        }
    }
}
