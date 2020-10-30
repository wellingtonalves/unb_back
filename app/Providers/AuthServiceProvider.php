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
         'App\Models\Ava' => 'App\Policies\AvaPolicy',
         'App\Models\Orgao' => 'App\Policies\OrgaoPolicy',
         'App\Models\Perfil' => 'App\Policies\PerfilPolicy',
         'App\Models\Permissao' => 'App\Policies\PermissaoPolicy',
         'App\Models\Domain\SituacaoUsuario' => 'App\Policies\Domain\SituacaoUsuarioPolicy',
         'App\Models\Domain\Pais' => 'App\Policies\Domain\PaisPolicy',
         'App\Models\Domain\Municipio' => 'App\Policies\Domain\MunicipioPolicy',
         'App\Models\Domain\UF' => 'App\Policies\Domain\UfPolicy',
         'App\Models\View\VwValidacaoCertificado' => 'App\Policies\VwValidacaoCertificadoPolicy',
         'App\Models\View\VwCursosRealizados' => 'App\Policies\VwCursosRealizadosPolicy',
         'App\Models\View\VwEmissaoCertificado' => 'App\Policies\VwEmissaoCertificadoPolicy',
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
