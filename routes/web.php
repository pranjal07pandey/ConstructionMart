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


Route::get('/', 'FrontController@index');
Route::get('/order/service', 'FrontController@serviceOrder');
Route::get('/view-services', 'UserServiceController@index');
Route::get('/view-services/{id}', 'UserServiceController@show');

Route::get('/order-categories/{id}', 'OrderServiceController@order')->middleware('auth');
Route::post('/order-categories/{id}', 'OrderServiceController@store')->middleware('auth');




Route::get('/contact', 'ContactFormController@create');
Route::post('/contact', 'ContactFormController@store');



// Route::get('/services', 'ServicesController@index');
// Route::post('/services-add', 'ServicesController@create');
// Route::post('/services-store', 'ServicesController@store');


Route::group(['middleware'=>['auth', 'admin']], function(){

   
    Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('auth');
    
    
    Route::resource('services', 'ServicesController');
    Route::resource('services-categories', 'ServiceCategoryController');

    Route::get('/role-register', 'Admin\DashboardController@registered' )->middleware('auth');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registerEdit');
    Route::post('/role-update/{id}', 'Admin\DashboardController@registerUpdate');
    Route::post('/role-delete/{id}', 'Admin\DashboardController@registerDelete');

    Route::get('/services-categories/edit/{id}','ServiceCategoryController@edit');


});

Route::group(['middleware'=>['auth', 'serviceManager']], function(){

    Route::get('/sm-dashboard', 'Admin\DashboardController@smDashboard');
    Route::resource('services', 'ServicesController');
    Route::resource('services-categories', 'ServiceCategoryController');


});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

// Route::get('/sm-manager', function(){
//     return view('admin.service-manager.smDashboard');

// });