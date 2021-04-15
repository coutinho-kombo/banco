<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index")->name('home');

Route::group(['prefix' => "user"], function () {
    Route::get('/login', "UserController@login")->name('login');
    Route::get('/logout', "UserController@logout")->name('logout');
    Route::post('/logar', "UserController@logar")->name('logar');
    Route::get('/create', "UserController@create");
    Route::get('/contrat', "UserController@contrat");
});

Route::group(['prefix' => "estudantes", 'middleware' => "adminAuth"], function () {
    Route::get('/', "EstudanteController@index");
    Route::get('/create', "EstudanteController@create");
    Route::get('/show/{id}', "EstudanteController@show");
    Route::get('/edit/{id}', "EstudanteController@edit");
    Route::post('/store', "EstudanteController@store");
    Route::put('/update/{id}', "EstudanteController@update");
});

/*ajax request*/
Route::group(['prefix' => "ajax", 'middleware' => "auth"], function () {
    Route::post('getMunicipios', "AjaxRequestController@getMunicipios")->name('getMunicipios');
    
  });