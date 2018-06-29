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

Route::get('/', ['uses'=>'ProductsController@index'])->name('home');

Route::post('/save', ['uses'=>'ProductsController@save'])->name('save');

Route::put('/edit/{index}', ['uses'=>'ProductsController@edit'])->name('edit');
