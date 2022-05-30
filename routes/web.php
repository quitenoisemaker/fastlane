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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/cinema', 'fastlane\CinemaController@index')->name('cinema.index');
    Route::post('/cinema/create', 'fastlane\CinemaController@store')->name('cinema.store');
    Route::get('/cinema/show/{id}', 'fastlane\CinemaController@show')->name('cinema.show');
    Route::get('/cinema/add/showtime/{id}', 'fastlane\CinemaController@getShowtimeToCinema')->name('cinema.showtime');
    Route::post('/showtime/create', 'fastlane\CinemaController@showtimeStore')->name('showtime.store');
    Route::post('/movie/create', 'fastlane\CinemaController@movieStore')->name('movie.store');
});
