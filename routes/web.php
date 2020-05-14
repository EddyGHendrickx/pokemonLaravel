<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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

Route::get('/pokemon/{id}', 'singlePokemon@index')->name('route.onePokemon');

Route::get('/homepage', 'HomepageController@index')->name('route.homepage');

Route::post('/search', 'pokeSearch@index')->name('route.pokeSearch');
