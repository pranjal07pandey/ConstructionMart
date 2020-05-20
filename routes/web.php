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
Route::get('/contact', 'FrontController@contact');
Route::get('/order/service', 'FrontController@serviceOrder');

// Route::get('/services', 'ServicesController@index');
// Route::post('/services-add', 'ServicesController@create');
// Route::post('/services-store', 'ServicesController@store');


Route::resource('services', 'ServicesController');
Route::resource('services-categories', 'ServiceCategoryController');

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


