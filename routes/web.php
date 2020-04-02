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






