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
Route::get('/', 'ClientsController@index');
Route::post('/mail', 'ClientsController@mail');
Route::post('/newsletter', 'ClientsController@newsletter');


Route::get('/restrito', 'AdminController@index');
Route::post('/restrito/salvar-pedido', 'AdminController@storeRequest');
Route::delete('/restrito/{id}/remover', 'AdminController@destroyRequest');
Route::post('/restrito/{id}/editar', 'AdminController@editRequest');


require __DIR__.'/auth.php';
