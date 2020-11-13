<?php

use Illuminate\Http\Request;
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
        });

        Route::resource('curso', 'CursoController', ['except' => $excepts]);
        Route::resource('tematica-curso', 'TematicaCursoController', ['except' => $excepts]);
        Route::resource('ava', 'AvaController', ['except' => $excepts]);
        Route::resource('orgao', 'OrgaoController', ['except' => $excepts]);
        Route::resource('usuario', 'UsuarioController', ['except' => $excepts]);
        Route::resource('perfil', 'PerfilController', ['except' => $excepts]);
        Route::resource('tarefa-agendada', 'TarefaAgendadaController', ['except' => $excepts]);
        Route::resource('permissao', 'PermissaoController', ['except' => $excepts]);
        Route::resource('ofertas', 'OfertaController', ['except' => $excepts]);
        Route::resource('parceiros', 'ParceiroController', ['except' => $excepts]);
        Route::resource('programas', 'ProgramaController', ['except' => $excepts]);
        Route::resource('exclusividade-oferta', 'ExclusividadeOfertaController', ['except' => $excepts]);
    });

});
