<?php

Auth::routes();

Route::view('/facebook', 'pages.facebook');
Route::get('/courier/customers/{user}/access/qrerror', 'QRErrorController@index');
Route::get('/', 'UsersController@error');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', 'Auth\RegisterController@list');
    Route::get('/', 'WelcomeController@index');
    Route::view('/about', 'pages.about');
    Route::get('/pricing', 'PricingController@index');
    Route::get('/register/{videoke}', 'PricingController@show');
    Route::get('/contact', 'ContactFormController1@create');
    Route::post('/contact', 'ContactFormController1@store');
    Route::view('/service', 'pages.service');
    Route::view('/team', 'pages.team');
    // Route::get('/qrcode', 'QRCodeLoginController@create');
    // Route::post('/qrcode', 'QRCodeLoginController@store');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/{user}/account/home', 'UsersController@home');
    Route::get('/qrcode/{user}/preview', 'UsersController@preview');
    // Route::get('/user/{user}/account/qrcode', 'UsersController@qrcode');
    Route::get('/user/{user}/account/personalinformation', 'UsersController@personalinformation');
    Route::get('/user/{user}/account/reservation', 'UsersController@reservation');
    Route::get('/user/{user}/account/payment', 'UsersController@payment');
    Route::get('/user/{user}/account/writemessage', 'ContactFormController@create');
    Route::post('/user/{user}/account/writemessage', 'ContactFormController@store');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', 'Admin\DashboardController@index');
    
    Route::get('/admin/customers', 'Admin\UsersController@index');
    Route::get('/admin/customers/{user}/edit', 'Admin\UsersController@edit'); 
    Route::patch('/admin/customers/{user}', 'Admin\UsersController@update'); 
    Route::delete('/admin/customers/{user}', 'Admin\UsersController@destroy');
    Route::resource('/admin/videokes', 'Admin\VideokesController');
    Route::resource('/admin/payments', 'Admin\PaymentsController');
    
    Route::get('/admin/reservations', 'Admin\ReservationsController@index');
    Route::get('/admin/reservations/{user}/show', 'Admin\ReservationsController@show');
    
    Route::get('/admin/customers/{user}/access', 'AccessController@show'); 
    Route::get('/admin/customers/{user}/access/edit', 'AccessController@edit');
    Route::patch('/admin/customers/{user}/access', 'AccessController@update');

    
    // IF I AM GOING TO EDIT THE CONFIRM BUTTON AND THEN SET THE IS_RETURN TO PENDING IT WILL NOT RETURN REDIRECT TO THE admin/customers/{user}/access BECAUSE THERE IS SAME URI LIKE THIS  
    // Route::get('/admin/customers/{user}/access/confirm', 'ConfirmationController@edit');
    // Route::patch('/admin/customers/{user}/access', 'ConfirmationController@update');

    Route::get('/admin/report', 'Admin\ReportController@index');

    Route::get('/admin/sales', 'Admin\SalesController@index');
    Route::get('/admin/sales/january', 'Admin\SalesController@january');
    Route::get('/admin/sales/february', 'Admin\SalesController@february');
    Route::get('/admin/sales/march', 'Admin\SalesController@march');
    Route::get('/admin/sales/april', 'Admin\SalesController@april');
    Route::get('/admin/sales/may', 'Admin\SalesController@may');
    Route::get('/admin/sales/june', 'Admin\SalesController@june');
    Route::get('/admin/sales/july', 'Admin\SalesController@july');
    Route::get('/admin/sales/august', 'Admin\SalesController@august');
    Route::get('/admin/sales/september', 'Admin\SalesController@september');
    Route::get('/admin/sales/october', 'Admin\SalesController@october');
    Route::get('/admin/sales/november', 'Admin\SalesController@november');
    Route::get('/admin/sales/december', 'Admin\SalesController@december');
    
    Route::get('/admin/notification', 'Admin\NotificationController@index');
});

Route::middleware(['auth', 'courier'])->group(function () {
    Route::get('/courier', 'Courier\DashboardController@index');

    Route::get('/courier/notification', 'Courier\NotificationController@index');

    Route::get('/courier/customers', 'Courier\UsersController@index');

    Route::get('/courier/customers/{user}/access/confirm', 'QRCodeController@create');
    Route::post('/courier/customers/{user}/access', 'QRCodeController@store');

    Route::get('/courier/customers/{user}/access', 'Courier\AccessController@show'); 
    Route::get('/courier/customers/{user}/access/edit', 'Courier\AccessController@edit');
    Route::patch('/courier/customers/{user}/access', 'Courier\AccessController@update');

});