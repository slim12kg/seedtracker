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
    $route->get('/edit', 'AccountController@edit')->name('account.edit');
    $route->put('/edit', 'AccountController@update')->name('account.update');
    $route->get('/update-password', 'AccountController@editPassword')->name('account.password');
    $route->put('/update-password', 'AccountController@updatePassword')->name('password.update');
    $route->get('/applications', 'RegistrationController@viewApplications')->name('applications.review');
    $route->get('/applications/{registration}', 'RegistrationController@viewApplication')->name('applications.view');
    $route->put('/applications/{registration}', 'RegistrationController@updateApplicationStatus')->name('applications.update-status');
    $route->get('certificate', 'RegistrationController@certificate')->name('certificate');
});

Route::get('account/activate/{token}', 'AccountController@activate')->name('account.activate');
Route::get('/verify/{certificate_id}', 'AccountController@activate')->name('application.verify');

//use BaconQrCode\Renderer\ImageRenderer;
//use BaconQrCode\Renderer\Image\SvgImageBackEnd;
//use BaconQrCode\Renderer\RendererStyle\RendererStyle;
//use BaconQrCode\Writer;

//Route::get('demo',function(){
//
//    $renderer = new ImageRenderer(
//        new RendererStyle(400),
//        new SvgImageBackEnd()
//    );
//
//    $detail = "1. \t NASC \n";
//    $detail .= "2. \t Company Name \n";
//    $detail .= "3. \t Validity Period \n";
//    $detail .= "4. \t Verify URL \n";
//    $path = storage_path('app/public/qr-codes/demo.svg');
//
//    $writer = new Writer($renderer);
//    $writer->writeFile($detail,$path);
//});