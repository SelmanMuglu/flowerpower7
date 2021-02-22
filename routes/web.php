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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact');


//Route::get('/artikel/{artikels}/edit', 'ArtikelsController@edit')->name('artikel')->middleware('can:manage-users');
//Route::put('/artikel/{artikels}', 'ArtikelsController@update');
//Route::get('/artikel/create', 'ArtikelsController@create')->name('artikel')->middleware('can:manage-users');
//Route::post('/artikel', 'ArtikelsController@store');
//Route::get('/artikel', 'ArtikelsController@index')->name('artikel');
//Route::get('/artikel/{artikels}/edit', 'ArtikelsController@edit')->name('artikel')->middleware('can:manage-users');
//Route::put('/artikel/{artikels}', 'ArtikelsController@update');
Route::resource('/artikel', 'ArtikelsController',['except' => ['show']]);







Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UsersController',['except' => ['show', 'create', 'store']]);
});
