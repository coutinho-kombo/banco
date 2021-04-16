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
    Route::post('/store', "UserController@store");
});

Route::group(['prefix' => "estudantes", 'middleware' => "adminAuth"], function () {
    Route::get('/', "EstudanteController@index");
    Route::get('/create', "EstudanteController@create");
    Route::get('/show/{id}', "EstudanteController@show");
    Route::get('/edit/{id}', "EstudanteController@edit");
    Route::post('/store', "EstudanteController@store");
    Route::put('/update/{id}', "EstudanteController@update");
});

Route::group(['prefix' => "servicos", 'middleware' => "adminAuth"], function () {
    Route::get('/', "ServicoController@index");
    Route::get('/create', "ServicoController@create");
    Route::get('/show/{id}', "ServicoController@show");
    Route::get('/edit/{id}', "ServicoController@edit");
    Route::post('/store', "ServicoController@store");
    Route::put('/update/{id}', "ServicoController@update");
});

Route::group(['prefix' => "contas", 'middleware' => "adminAuth"], function () {
    Route::get('/', "ContaController@index");
    Route::get('/create', "ContaController@create");
    Route::get('/show/{id}', "ContaController@show");
    Route::get('/edit/{id}', "ContaController@edit");
    Route::post('/store', "ContaController@store");
    Route::put('/update/{id}', "ContaController@update");
    Route::get('/deposito/{id}', "ContaController@deposito");
    Route::put('/depositar/{id}', "ContaController@depositar");
    
});

Route::get('/contas/movimentos/{id}', "ContaController@movimentos")->middleware('auth');

/*ajax request*/
Route::group(['prefix' => "ajax"], function () {
    Route::post('getMunicipios', "AjaxRequestController@getMunicipios")->name('getMunicipios');
    
  });