<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('host')
    ->name('host.')
    ->namespace('Host')
    ->middleware('auth')
    ->group(function() {
        
        Route::resource('places', 'PlaceController')
        ->except('show')
        ->scoped([
            'place' => 'slug'
        ]);
        
        Route::get('places/{place:slug}', 'PlaceController@toggleVisibility')
            ->name('places.toggleVisibility');

        Route::resource('places.messages', 'MessageController')
            ->only('index', 'show', 'destroy')
            ->scoped([
                'place' => 'slug'
        ]);
    });

Route::get('/{any?}', function(){ 
    return view('guest.app');
})->where('any', '.*');