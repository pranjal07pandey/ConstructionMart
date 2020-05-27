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
Route::get('/view-services-all', 'UserServiceController@allServices');
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
    Route::get('/service-manager-index', 'ServiceManagerController@index');
    Route::get('/service-manager-create', 'ServiceManagerController@create');
    Route::post('/service-manager-addService', 'ServiceManagerController@store');
    Route::get('/show-service/{id}', 'ServiceManagerController@show');
    Route::post('/service-delete/{id}', 'ServiceManagerController@destroy');
    Route::get('/service-manager-edit/{id}', 'ServiceManagerController@edit');
    Route::post('/service-manager-update/{id}', 'ServiceManagerController@update');






    // Route::resource('services', 'ServicesController');
    // Route::resource('services-categories', 'ServiceCategoryController');

});



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Products
//throws product of matching product_sub_category_id
Route::any('show/sub/cat/products/{id}', 'ProductController@subCatProducts');
//throws product of matching product_category_id
Route::any('/show/cat/products/{id}', 'ProductController@catProducts');
//throws other products
Route::any('/other/products', 'ProductController@allProducts');
//search products
Route::any('search/product', 'ProductController@search');

//Cart
Route::any('add/to/cart/{id}','ProductController@cart');
Route::any('show/cart/products', 'ProductController@showCart');
Route::any('delete/cart/product/{id}', 'ProductController@removeCart');
Route::get('/cart/update', 'ProductController@updateCart');

Route::post('order/product', 'OrderProductController@create');

// Route::get('/sm-manager', function(){
//     return view('admin.service-manager.smDashboard');

// });

// Product Admin
Route::group(['middleware'=>['auth', 'productManager']], function(){
    Route::any('product', 'ProductController@index')->middleware('auth');
    Route::post('add/product', 'ProductController@store');
    Route::get('show/admin/products', 'ProductController@adminProducts');

});

Auth::routes(['verify' => true]);