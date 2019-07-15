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
    $route->post('/company-profile', 'RegistrationController@completeRegistration')->name('registration.complete');
    $route->put('/company-profile', 'RegistrationController@submitApplication')->name('registration.submit');
    $route->get('/edit', 'AccountController@edit')->name('account.edit');
    $route->put('/edit', 'AccountController@update')->name('account.update');
    $route->get('/update-password', 'AccountController@editPassword')->name('account.password');
    $route->put('/update-password', 'AccountController@updatePassword')->name('password.update');
    $route->get('/applications', 'RegistrationController@viewApplications')->name('applications.review');
    $route->get('/applications/filter', 'RegistrationController@filterApplications')->name('applications.filter');
    $route->get('/applications/{registration}', 'RegistrationController@viewApplication')->name('applications.view');
    $route->put('/applications/{registration}', 'RegistrationController@updateApplicationStatus')->name('applications.update-status');
    $route->get('certificate', 'RegistrationController@certificate')->name('certificate');
    $route->get('certificate/{registration}', 'RegistrationController@viewApplicantCertificate')->name('certificate.view');
    $route->post('communication/mail', 'CommunicationController@mailApplicant')->name('mail-applicant');
});

Route::get('account/activate/{token}', 'AccountController@activate')->name('account.activate');
Route::get('/certificate/{certificate_id}', 'AccountController@verifyCertificate')->name('certificate.verify');
//Route::get('/verify/{certificate_id}', 'AccountController@activate')->name('application.verify');

Route::get('check-for-certificate-expiry','CertificateNotificationController@checkForExpiringCertificate');

Route::get('demo',function(){

    dd(date('d-m-Y',strtotime('2019-06-02')));
//    {{date('Y-m-d','')}}
});