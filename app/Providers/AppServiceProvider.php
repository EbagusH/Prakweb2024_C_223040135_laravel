<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    // public const HOME = '/home';
    public const HOME = '/';
    /**
     * Register any application services.
     */

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
}
