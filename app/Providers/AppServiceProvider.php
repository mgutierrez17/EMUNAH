<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Empresa;
use Laravel\Jetstream\Jetstream;

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
    public function boot()
    {
        Jetstream::useUserModel(\App\Models\User::class);

        view()->composer('*', function ($view) {
            $empresa = Empresa::first();
            $view->with('empresa', $empresa);
        });
    }
}
