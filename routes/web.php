<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/produtos', ['as'=>'lista', 'uses'=>'ProdutoController@lista']);
Route::get('/produtos', 'ProdutoController@lista');
Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');
Route::get('/produtos/novo', 'ProdutoController@novo');
Route::get('/produtos/json', 'ProdutoController@listaJson');
//Route::get('/produtos/remove/{id}', ['autorizacao', 'ProdutoController@remove']);
Route::get('/produtos/remove/{id}', 'ProdutoController@remove');
Route::get('/produtos/edita/{id}', 'ProdutoController@edita');    

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
