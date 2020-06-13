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

//newsletter
Route::post('/subscribe-newsletter', 'NewsletterController@store');



Route::group(['middleware'=>['auth', 'admin']], function(){

   
    Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('auth');
    
    //test
    // /services/{{$service->id}}/edit
    // Route::get('services/{id}/edit', 'ServicesController@edit');
    Route::post('/services-update/{id}', 'ServicesController@update');
    
    Route::resource('services', 'ServicesController');
    Route::resource('services-categories', 'ServiceCategoryController');

    Route::get('/role-register', 'Admin\DashboardController@registered' )->middleware('auth');
    Route::get('/role-edit/{id}', 'Admin\DashboardController@registerEdit');
    Route::post('/role-update/{id}', 'Admin\DashboardController@registerUpdate');
    Route::post('/role-delete/{id}', 'Admin\DashboardController@registerDelete');
    
    //user profile
    Route::get('/user-profile/{id}','Admin\DashboardController@viewUserProfile');

    Route::get('/services-categories/edit/{id}','ServiceCategoryController@edit');

    // Route::get('/user-viewProfile/{id}', 'HomeController@viewProfile');

    Route::get('/order-details/{id}','Admin\DashboardController@orderDetails');
    Route::post('/order-details/{id}','Admin\DashboardController@checkDelivered');





    Route::get('/order-details-products/{id}','Admin\DashboardController@orderDetailsProducts');
    Route::post('/order-details-products/{id}','Admin\DashboardController@checkDeliveredProducts');

    //view newsletter
    Route::get('/view-newsletter','Admin\DashboardController@viewNewsletter');


});

Route::group(['middleware'=>['auth', 'serviceManager']], function(){

    Route::get('/sm-dashboard', 'Admin\DashboardController@smDashboard');
    Route::get('/service-manager-index', 'ServiceManagerController@index');
    Route::get('/service-manager-create', 'ServiceManagerController@create');
    Route::any('/product-manager-index', 
        'ServiceManagerController@productIndex');
    Route::post('/service-manager-addService', 'ServiceManagerController@store');

    //return to the add product index
    Route::any('/service-manager-addProduct-index', 
        'ServiceManagerController@addProductIndex');
    //adds products
    Route::post('/service-manager-addProduct', 
        'ServiceManagerController@addProduct');
    //return to edit product page
    Route::any('/service-manager-editProduct-index/{id}', 
        'ServiceManagerController@editProductIndex');
    //updates the product
    Route::any('update/product/service-manager/{product_id}/{category_id}/{subcategory_id}', 'ServiceManagerController@updateProduct');
    //Deletes the product of service manager
    Route::any('delete/product/service-manager/{id}', 'ServiceManagerController@deleteProd');
     
    Route::get('/show-service/{id}', 'ServiceManagerController@show');
    Route::post('/service-delete/{id}', 'ServiceManagerController@destroy');
    Route::get('/service-manager-edit/{id}', 'ServiceManagerController@edit');
    Route::post('/service-manager-update/{id}', 'ServiceManagerController@update');

    
    // routes for vendor service categories
    Route::get('/service-cat-manager-index','ServiceManagerCatController@index');
    Route::get('/service-cat-manager-create','ServiceManagerCatController@create');
    Route::post('/service-cat-manager-addCategory','ServiceManagerCatController@store');
    Route::get('/show-service-cat/{id}','ServiceManagerCatController@show');
    Route::post('/service-cat-delete/{id}', 'ServiceManagerCatController@destroy');
    Route::get('/service-cat-edit/{id}', 'ServiceManagerCatController@edit');
    Route::post('/service-cat-update/{id}', 'ServiceManagerCatController@update');







//check delivery for service manager
    Route::get('/order-details/{id}','Admin\DashboardController@orderDetailsServiceManager');
    Route::post('/order-details/{id}','Admin\DashboardController@checkDeliveredServiceManger');
    

});


//multi language

Route::get('/lang/{locale}', function($locale){
    session()->put('locale', $locale);
    return redirect()->back();
});



Auth::routes(['verify' => true]);

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
Route::any('admin/search/product', 'ProductController@adminSearch');
Route::any('serviceManager/search', 'ProductController@serviceManagerSearch');

//Cart
Route::any('add/to/cart/{id}','ProductController@cart');
Route::any('show/cart/products', 'ProductController@showCart');
Route::any('delete/cart/product/{id}', 'ProductController@removeCart');
Route::get('/cart/update', 'ProductController@updateCart');
Route::any('cart/wishlist/{id}', 'ProductController@wishlistCart');
Route::any('addToCart/wishlist/{id}', 'ProductController@moveToCart');

Route::any('order/product', 'OrderProductController@indexOrder')->middleware('auth');
Route::any('final/order/product', 'OrderProductController@create');
Route::any('order/index', 'OrderProductController@index');

Route::get('product/index', 'ProductController@productIndex');
Route::any('view-products/{id}', 'ProductController@productDetails');

// Product Admin
Route::group(['middleware'=>['auth', 'productManager']], function(){
    Route::any('product', 'ProductController@index')->middleware('auth');
    Route::any('delete/product/{id}', 'ProductController@destroy');
    Route::post('add/product', 'ProductController@store');
    Route::get('show/admin/products', 'ProductController@adminProducts');
    Route::any('edit/product/{id}', 'ProductController@edit');
    Route::any('update/product/{product_id}/{category_id}/{subcategory_id}', 'ProductController@update');

});

Auth::routes(['verify' => true]);
Route::get('/product-index', function(){
    return view('product.index');

});
