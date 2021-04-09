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

//Route::get('/artikel/bestellen/{artikel}', 'ArtikelsController@bestellen')->name('bestellen');
//Route::post('/artikel/bestellen', 'ArtikelsController@storeBestelling')->name('bestellen');


Route::resource('/artikel', 'ArtikelsController',['except' => ['show']]);

Route::get('/artikel/bestellen/{artikel}', 'ArtikelsController@bestellen');
Route::get('/artikel/bestellingen', 'ArtikelsController@indexBestellen');
Route::post('/artikel/bestellingen', 'ArtikelsController@storeBestelling');

//Route::resource('/bestellen', 'BestellingsController',['except'=> ['index','store']]);

Route::get('/bestelling','BestellingsController@index')->name('bestelling');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function (){
    Route::resource('/users', 'UsersController',['except' => ['show', 'create', 'store']]);
});
