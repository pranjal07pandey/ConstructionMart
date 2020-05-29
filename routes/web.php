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




Route::group(['middleware'=>['auth', 'admin']], function(){

   
    Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('auth');
    
    
    Route::resource('services', 'ServicesController');
    Route::resource('services-categories', 'ServiceCategoryController');

    Route::get('/role-register', 'Admin\DashboardController@registered' )->middleware('auth');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registerEdit');
    Route::post('/role-update/{id}', 'Admin\DashboardController@registerUpdate');
    Route::post('/role-delete/{id}', 'Admin\DashboardController@registerDelete');

    Route::get('/services-categories/edit/{id}','ServiceCategoryController@edit');

    Route::get('/order-details/{id}','Admin\DashboardController@orderDetails');
    Route::post('/order-details/{id}','Admin\DashboardController@checkDelivered');


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

    
    // routes for vendor service categories
    Route::get('/service-cat-manager-index','ServiceManagerCatController@index');
    Route::get('/service-cat-manager-create','ServiceManagerCatController@create');
    Route::post('/service-cat-manager-addCategory','ServiceManagerCatController@store');




    

});


//multi language

Route::get('/lang/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
});



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Products
Route::any('product', 'ProductController@index');

Route::post('add/product', 'ProductController@store');

//throws product of matching product_sub_category_id
Route::any('show/sub/cat/products/{id}', 'ProductController@subCatProducts');
//throws product of matching product_category_id
Route::any('/show/cat/products/{id}', 'ProductController@catProducts');
//throws other products
Route::any('/other/products', 'ProductController@allProducts');
//search products
Route::post('search/product', 'ProductController@search');

//Cart
Route::any('add/to/cart/{id}','ProductController@cart');
Route::any('show/cart/products', 'ProductController@showCart');

Route::get('/product-index', function(){
    return view('product.index');

});