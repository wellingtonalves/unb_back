<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$excepts = ['create', 'edit'];
$optionsReadOnly = ['only' => ['index', 'show']];

Route::group(['prefix' => 'v1'], function () use ($excepts, $optionsReadOnly) {

    Route::group(['prefix' => 'auth'], function () {
        Route::namespace('Auth')->group(function () {
            Route::post('login', 'AuthController@login')->name('login');
            Route::post('logout', 'AuthController@logout')->name('logout')->middleware('auth:api');
            Route::get('user', 'AuthController@user');
        });
    });

    Route::namespace('v1')->middleware('auth:api')->group(function () use ($excepts, $optionsReadOnly) {

        Route::group(['prefix' => 'vw'], function () {
            Route::resource('valida-certificado', 'VwValidacaoCertificadoController', ['only' => ['show']]);
            Route::resource('cursos-realizados', 'VwCursosRealizadosController', ['only' => ['index']]);
            Route::get('emissao-certificado/{idCertificado}/{txOrigem}', 'VwEmissaoCertificadoController@find');
        });

        Route::namespace('Domain')->group(function () use ($optionsReadOnly) {
            Route::resource('situacao-usuario', 'SituacaoUsuarioController', $optionsReadOnly);
            Route::resource('pais', 'PaisController', $optionsReadOnly);
            Route::resource('municipio', 'MunicipioController', $optionsReadOnly);
            Route::resource('uf', 'UfController', $optionsReadOnly);
            Route::resource('tipo-oferta', 'TipoOfertaController', $optionsReadOnly);
            Route::resource('modelo-certificado', 'ModeloCertificadoController', $optionsReadOnly);
            Route::resource('tipo-exclusividade-oferta', 'TipoExclusividadeOfertaController', $optionsReadOnly);
            Route::resource('criterio-programa', 'CriterioProgramaController', $optionsReadOnly);
        });

        Route::resource('curso', 'CursoController', ['only' => ['index', 'show']])->withoutMiddleware('auth:api');
        Route::resource('curso', 'CursoController', ['only' => ['store', 'update', 'delete']]);
        Route::resource('tematica-curso', 'TematicaCursoController', ['except' => $excepts]);
        Route::get('catalogo-curso', 'TematicaCursoController@catalogoCurso')->withoutMiddleware('auth:api');
        Route::resource('ava', 'AvaController', ['except' => $excepts]);
        Route::resource('orgao', 'OrgaoController', ['except' => $excepts]);
        Route::resource('usuario', 'UsuarioController', ['except' => $excepts]);
        Route::put('usuario/{idUser}/resetar-senha', 'UsuarioController@resetPassword');
        Route::resource('perfil', 'PerfilController', ['except' => $excepts]);
        Route::resource('tarefa-agendada', 'TarefaAgendadaController', ['except' => $excepts]);
        Route::resource('permissao', 'PermissaoController', ['except' => $excepts]);
        Route::resource('ofertas', 'OfertaController', ['except' => $excepts]);
        Route::resource('parceiros', 'ParceiroController', ['except' => $excepts]);
        Route::resource('programas', 'ProgramaController', ['except' => $excepts]);
        Route::resource('programas', 'ProgramaController', ['only' => ['index', 'show']])->withoutMiddleware('auth:api');
        Route::resource('programas', 'ProgramaController', ['only' => ['store', 'update', 'delete']]);
        Route::resource('exclusividade-oferta', 'ExclusividadeOfertaController', ['except' => $excepts]);
        Route::resource('valor-exclusividade-oferta', 'ValorExclusividadeOfertaController', ['except' => $excepts]);
        Route::resource('inscricao', 'InscricaoController', ['except' => $excepts]);
        Route::get('inscricao/cursos-aluno/{tipo}', 'InscricaoController@cursosAluno');
        Route::get('inscricao/cursos-mais-acessados/{tipo}', 'InscricaoController@cursosMaisAcessados')->withoutMiddleware('auth:api');
        Route::get('comprovantes-inscricao', 'InscricaoController@comprovantesInscricao');
        Route::get('comprovantes-inscricao/{id}/gerar', 'InscricaoController@gerarComprovanteInscricao');
        Route::resource('certificado', 'CertificadoController', ['only' => ['index', 'show', 'store'] ]);
        Route::resource('certificado-programa', 'CertificadoProgramaController', ['only' => ['index', 'show', 'store'] ]);
        Route::get('inscricao/validar/{nr_codigo_validador}', 'InscricaoController@validar')->withoutMiddleware('auth:api');
        Route::get('certificado/validar/{nr_codigo_validador}', 'CertificadoController@validar')->withoutMiddleware('auth:api');
    });

});
