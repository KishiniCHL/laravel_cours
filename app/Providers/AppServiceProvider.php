<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;


class AppServiceProvider extends ServiceProvider
{
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
        Inertia::share([
            'isAdmin' => function () {
                return auth()->user() ? auth()->user()->admin : null;
            },
        ]);

        Model::preventLazyLoading(config('app.env') !== 'production');
    }
}
