<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Models\Curso' => 'App\Policies\CursoPolicy',
         'App\Models\TematicaCurso' => 'App\Policies\TematicaCursoPolicy',
         'App\Models\Usuario' => 'App\Policies\UsuarioPolicy',
         'App\Models\Perfil' => 'App\Policies\PerfilPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
