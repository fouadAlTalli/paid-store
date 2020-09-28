<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// prefix(admin) is available in Routeserviceprovider.php for all routes
// Non-Auth Routes
################################# Begin Admin Login Routes #####################################
Route::group(['namespace' =>'Dashboard','middleware'=> 'guest:admin'], function () {
    Route::get('login', 'AdminLoginController@index')->name('admin.loginIndex');
    Route::post('login', 'AdminLoginController@login')->name('admin.login');
});
################################# End Admin Login Routes #####################################



// prefix(admin) is available in Routeserviceprovider.php for all routes
// Auth Routes
Route::group(['namespace' =>'Dashboard','middleware'=> 'auth:admin'], function () {
    Route::get('/', 'AdminController@index' )->name('dashboard.index'); // the first page admin visits if authentication

});
