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



//User
Route::group([], function () {
    Route::get('/', 'IndexController@index')->name('indexUser');
    Route::post('/search', 'UserJobController@search')->name('search');

    Route::resource('jobs', 'UserJobController');

    Route::get('/login', 'UserAuth\LoginController@showLoginForm')->name('loginUser');
    Route::post('/login', 'UserAuth\LoginController@login');
    Route::post('/logout', 'UserAuth\LoginController@logout')->name('logoutUser');

    Route::get('/register', 'UserAuth\RegisterController@showRegistrationForm')->name('registerUser');
    Route::post('/register', 'UserAuth\RegisterController@register');

    Route::post('/password/email', 'UserAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'UserAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'UserAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/user/password/reset/{token}', 'UserAuth\ResetPasswordController@showResetForm');
});

//Company
Route::group(['prefix' => 'company'], function () {
    Route::resource('jobs', 'JobController');

    Route::get('/', function () {return view('company.index');})->name('indexCompany');
    Route::get('/login', 'CompanyAuth\LoginController@showLoginForm')->name('loginCompany');
    Route::post('/login', 'CompanyAuth\LoginController@login');
    Route::post('/logout', 'CompanyAuth\LoginController@logout')->name('logoutCompany');

    Route::get('/register', 'CompanyAuth\RegisterController@showRegistrationForm')->name('registerCompany');
    Route::post('/register', 'CompanyAuth\RegisterController@register');

    Route::post('/password/email', 'CompanyAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
    Route::post('/password/reset', 'CompanyAuth\ResetPasswordController@reset')->name('password.email');
    Route::get('/password/reset', 'CompanyAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::get('/password/reset/{token}', 'CompanyAuth\ResetPasswordController@showResetForm');
});
