<?php

namespace App\Providers;

use App\Repositories\DbUserRepository;
use App\Repositories\UserRepository;
use App\Services\Twitter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepository::class,
            DbUserRepository::class,
            Twitter::class
        );
    }
}
