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


Route::group(['prefix' => 'v1'], function () use ($excepts) {

    Route::group(['prefix' => 'auth'], function () {
        Route::namespace('auth')->group(function () {
            Route::post('login', 'AuthController@login')->name('login');
            Route::get('/user', 'AuthController@user');
        });
    });

    Route::namespace('v1')->middleware('auth:api')->group(function () use ($excepts) {
        Route::resource('cursos', 'CursoController', ['except' => $excepts]);
    });

});
