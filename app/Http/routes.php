<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Show public page 
Route::get('/', function () {
    return view('filiations.index');
})->name('app');

// Show login form
Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');

// Login user to system
Route::post('login', 'Auth\AuthController@login');

// Logout user from system
Route::post('logout', 'Auth\AuthController@logout')->name('logout');

//Show change password form
Route::get('/password/change', 'Auth\PasswordController@showChangeForm')->name('password.change');

//Change default user password
Route::post('/password/change', 'Auth\PasswordController@updatePassword')->name('password.update');
