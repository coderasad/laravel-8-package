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


// Google Login Routes 
Route::get('/google-login', 'Auth\GoogleAuthController@redirectToProvider');
Route::get('/callback', 'Auth\GoogleAuthController@handleProviderCallback');

// Admin Route 
Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function () {											
    Route::get('/dashboard','DashboardController@index')->name('dashboard');											
});											
     
// Author Route 
Route::group(['as'=>'author.','prefix' => 'author','namespace'=>'Author', 'middleware'=>['auth','author']], function () {											
    Route::get('/dashboard','DashboardController@index')->name('dashboard');											
});											