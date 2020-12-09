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
        'App\Models\Oferta' => 'App\Policies\OfertaPolicy',
        'App\Models\Orgao' => 'App\Policies\OrgaoPolicy',
        'App\Models\Perfil' => 'App\Policies\PerfilPolicy',
        'App\Models\TarefaAgendada' => 'App\Policies\TarefaAgendadaPolicy',
        'App\Models\Permissao' => 'App\Policies\PermissaoPolicy',
        'App\Models\Domain\SituacaoUsuario' => 'App\Policies\Domain\SituacaoUsuarioPolicy',
        'App\Models\Domain\Pais' => 'App\Policies\Domain\PaisPolicy',
        'App\Models\Domain\Municipio' => 'App\Policies\Domain\MunicipioPolicy',
        'App\Models\Domain\UF' => 'App\Policies\Domain\UfPolicy',
        'App\Models\Domain\TipoOferta' => 'App\Policies\Domain\TipoOfertaPolicy',
        'App\Models\Domain\TipoExclusividadeOferta' => 'App\Policies\Domain\TipoExclusividadeOfertaPolicy',
        'App\Models\ExclusividadeOferta' => 'App\Policies\ExclusividadeOfertaPolicy',
        'App\Models\ValorExclusividadeOferta' => 'App\Policies\ValorExclusividadeOfertaPolicy',
        'App\Models\Domain\ModeloCertificado' => 'App\Policies\Domain\ModeloCertificadoPolicy',
        'App\Models\Parceiro' => 'App\Policies\ParceiroPolicy',
        'App\Models\Programa' => 'App\Policies\ProgramaPolicy',
        'App\Models\View\VwValidacaoCertificado' => 'App\Policies\VwValidacaoCertificadoPolicy',
        'App\Models\View\VwCursosRealizados' => 'App\Policies\VwCursosRealizadosPolicy',
        'App\Models\View\VwEmissaoCertificado' => 'App\Policies\VwEmissaoCertificadoPolicy',
        'App\Models\Domain\CriterioPrograma' => 'App\Policies\Domain\CriterioProgramaPolicy',
        'App\Models\Certificado' => 'App\Policies\CertificadoPolicy',
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
