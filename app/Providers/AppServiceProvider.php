<?php

namespace App\Providers;

use App\Models\Curso;
use App\Models\Usuario;
use App\Observers\CursoObserver;
use App\Observers\UsuarioObserver;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Curso::observe(CursoObserver::class);
        Usuario::observe(UsuarioObserver::class);
    }
}
