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
$optionsReadView = ['only' => ['show']];


Route::group(['prefix' => 'v1'], function () use ($excepts, $optionsReadOnly, $optionsReadView) {

    Route::group(['prefix' => 'auth'], function () {
        Route::namespace('Auth')->group(function () {
            Route::post('login', 'AuthController@login')->name('login');
            Route::post('logout', 'AuthController@logout')->name('logout')->middleware('auth:api');
            Route::get('user', 'AuthController@user');
        });
    });

    Route::namespace('v1')->middleware('auth:api')->group(function () use ($excepts, $optionsReadOnly, $optionsReadView) {

        Route::namespace('Domain')->group(function () use ($optionsReadOnly) {
            Route::resource('situacao-usuario', 'SituacaoUsuarioController', $optionsReadOnly);
            Route::resource('pais', 'PaisController', $optionsReadOnly);
            Route::resource('municipio', 'MunicipioController', $optionsReadOnly);
            Route::resource('uf', 'UfController', $optionsReadOnly);
        });

        Route::group(['prefix' => 'vw'], function () use ($optionsReadView) {
            Route::resource('valida-certificado', 'VwValidacaoCertificadoController', $optionsReadView);
        });

        Route::resource('curso', 'CursoController', ['except' => $excepts]);
        Route::resource('tematica-curso', 'TematicaCursoController', ['except' => $excepts]);
        Route::resource('ava', 'AvaController', ['except' => $excepts]);
        Route::resource('orgao', 'OrgaoController', ['except' => $excepts]);
        Route::resource('usuario', 'UsuarioController', ['except' => $excepts]);
        Route::resource('perfil', 'PerfilController', ['except' => $excepts]);
        Route::resource('permissao', 'PermissaoController', ['except' => $excepts]);
    });

});
