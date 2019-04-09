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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/contact-us', 'HomeController@contact')->name('contact');

Route::group(['prefix' => 'account','middleware' => 'auth'],function($route){
    $route->get('/company-profile', 'RegistrationController@company')->name('company.registration');
    $route->get('/edit', 'AccountController@edit')->name('account.edit');
    $route->put('/edit', 'AccountController@update')->name('account.update');
    $route->get('/update-password', 'AccountController@editPassword')->name('account.password');
    $route->put('/update-password', 'AccountController@updatePassword')->name('password.update');
});