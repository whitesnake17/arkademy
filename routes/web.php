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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/produk','ProdukController@index');
Route::post('/produk/store','ProdukController@store');
Route::post('/produk/update','ProdukController@update');
Route::get('/produk/delete/{id}','ProdukController@destroy');
Route::get('/produk/edit/{id}','ProdukController@edit');
