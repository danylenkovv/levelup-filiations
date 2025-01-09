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

// Show public page
Route::get('/', 'FiliationController@appIndex')->name('app');

// Auth routes
Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login')->name('login');
Route::post('logout', 'Auth\AuthController@logout')->name('logout');

Route::get('/password/change', 'Auth\PasswordController@showChangeForm')->name('password.change');
Route::post('/password/change', 'Auth\PasswordController@updatePassword')->name('password.update');

// Admin routes with middleware for authentication
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'check.default.password']], function () {

    Route::resource('filiation', 'FiliationController', ['except' => [
        'show',
    ]]);

    Route::resource('user', 'UserController', ['only' => [
        'index',
        'create',
        'store',
        'destroy'
    ]]);

    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings', 'SettingController@update')->name('settings.update');
});
