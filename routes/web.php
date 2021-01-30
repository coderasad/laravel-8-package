<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();


// Google Login Routes 
Route::get('/google-login', 'Auth\GoogleAuthController@redirectToProvider')->name('google.login');
Route::get('/callback', 'Auth\GoogleAuthController@handleProviderCallback');

// Admin Route 
Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin', 'middleware'=>['auth','admin']], function () {											
    Route::get('/dashboard','DashboardController@index')->name('dashboard');											
});											
     
// Author Route 
Route::group(['as'=>'author.','prefix' => 'author','namespace'=>'Author', 'middleware'=>['auth','author']], function () {											
    Route::get('/dashboard','DashboardController@index')->name('dashboard');											
});											
