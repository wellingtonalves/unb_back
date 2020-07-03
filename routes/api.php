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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () use ($excepts) {

    Route::namespace('v1')->group(function () use ($excepts) {
        Route::resource('cursos', 'CursoController', ['except' => $excepts]);
    });

});
