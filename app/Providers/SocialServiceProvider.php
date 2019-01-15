<?php

namespace App\Providers;

use app\Services\Twitter;
use Illuminate\Support\ServiceProvider;



//Services providers are a means to register or bootstrap something for a service needed for the project?

/*
 *
 * PHP ARTISAN CONFIG:CACHE will combine config files for optimization
 * Can use php artisan optimize:clear to clear cache (maybe no same cache) if I run into a not resolved error
 * It can be the case that config files are cached, and if so then changing the config files might lead to errors/not seeing changes
 * We don't need to cache for development, only production
 * https://stackoverflow.com/questions/24124360/unresolvable-dependency-resolving-parameter-0-required-name
 *
 *
 * */

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Twitter::class, function() {
            return new Twitter(config('services.twitter.secret'));
        });
    }
}
