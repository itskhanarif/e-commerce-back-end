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

Route::get('/', 'FrontEnd\PageController@index')->name('index');
Route::post('/search', 'FrontEnd\PageController@search')->name('search');







Route::get('/product/{slug}', 'FrontEnd\PageController@show')->name('single-product-show');



Route::get('/women-clothing', 'FrontEnd\PageController@women_clothing')->name('women-clothing');
Route::get('/men-clothing', 'FrontEnd\PageController@men_clothing')->name('men-clothing');
Route::get('/bags-shoes', 'FrontEnd\PageController@bags_shoes')->name('bags-shoes');
Route::get('/computer-office', 'FrontEnd\PageController@computer_office')->name('computer-office');
Route::get('/consumer-electronics', 'FrontEnd\PageController@consumer_electronics')->name('consumer-electronics');
Route::get('/jewelary-watches', 'FrontEnd\PageController@jewelary_watches')->name('jewelary-watches');
Route::get('/phone-accessories', 'FrontEnd\PageController@phone_accessories')->name('phone-accessories');


/* Seller's All routes    */
Route::group(['prefix' => 'seller'], function(){
  //Login Routes
  Route::get('/', 'BackEnd\seller\SellerAuthPagesController@LoginFormShow')->name('seller.login');
  Route::post('/login', 'BackEnd\seller\SellerLoginController@login')->name('seller.login.submit');

  //Registration Routes
  Route::get('/registration', 'BackEnd\seller\SellerAuthPagesController@RegistrationFormShow')->name('seller.registration_form');
  Route::post('/create', 'BackEnd\seller\SellerAuthPagesController@RegistrationDataStore')->name('seller.create');

  //After login
  Route::get('/afterauth', 'BackEnd\seller\SellerAuthPagesController@afterauth')->name('seller.auth.afterauth');
  Route::get('/logout', 'BackEnd\seller\SellerLoginController@logout')->name('seller.logout');

  //product managing section
  Route::group(['prefix' => 'product'], function(){
    Route::get('/product-create', 'BackEnd\seller\ProductController@create')->name('product-create');
    Route::post('/product-store', 'BackEnd\seller\ProductController@store')->name('product-store');
    Route::get('/product-edit/{id}', 'BackEnd\seller\ProductController@edit')->name('product-edit');
    Route::get('/product-view', 'BackEnd\seller\ProductController@view')->name('product-view');
    Route::post('/product-update/{id}', 'BackEnd\seller\ProductController@update')->name('product-update');
    Route::post('/product-delete/{id}', 'BackEnd\seller\ProductController@delete')->name('product-delete');
  });

});

/* Admin's All routes    */
Route::group(['prefix' => 'admin'], function(){
  Route::get('/', 'BackEnd\admin\AdminAuthController@afterauth')->name('admin.afterauth');

  Route::get('/login', 'Auth\Admin\LoginController@ShowLoginForm')->name('admin.login');
  Route::post('/login/submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit');

  Route::get('/logout', 'Auth\Admin\LoginController@logout')->name('admin.logout');


  //admin password reset Email send
  Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/email', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

  //admin password reset
  Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
  Route::post('/password/reset', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.update');


  /*Catagory's All routes*/
  Route::group(['prefix' => 'catagory'], function(){
    Route::get('/catagory-create', 'BackEnd\admin\CatagoryController@create')->name('catagory-create');
    Route::post('/catagory-store', 'BackEnd\admin\CatagoryController@store')->name('catagory-store');
    Route::get('/catagory-edit/{id}', 'BackEnd\admin\CatagoryController@edit')->name('catagory-edit');
    Route::get('/catagory-view', 'BackEnd\admin\CatagoryController@view')->name('catagory-view');
    Route::post('/catagory-update/{id}', 'BackEnd\admin\CatagoryController@update')->name('catagory-update');
    Route::post('/catagory-delete/{id}', 'BackEnd\admin\CatagoryController@delete')->name('catagory-delete');
  });



  /*Brand's All routes*/
  Route::group(['prefix' => 'brand'], function(){
    Route::get('/brand-create', 'BackEnd\admin\BrandController@create')->name('brand-create');
    Route::post('/brand-store', 'BackEnd\admin\BrandController@store')->name('brand-store');
    Route::get('/brand-edit/{id}', 'BackEnd\admin\BrandController@edit')->name('brand-edit');
    Route::get('/brand-view', 'BackEnd\admin\BrandController@view')->name('brand-view');
    Route::post('/brand-update/{id}', 'BackEnd\admin\BrandController@update')->name('brand-update');
    Route::post('/brand-delete/{id}', 'BackEnd\admin\BrandController@delete')->name('brand-delete');
  });


  /*division's All routes*/
  Route::group(['prefix' => 'division'], function(){
    Route::get('/division-create', 'BackEnd\admin\DivisionController@create')->name('division-create');
    Route::post('/division-store', 'BackEnd\admin\DivisionController@store')->name('division-store');
    Route::get('/division-edit/{id}', 'BackEnd\admin\DivisionController@edit')->name('division-edit');
    Route::get('/division-view', 'BackEnd\admin\DivisionController@view')->name('division-view');
    Route::post('/division-update/{id}', 'BackEnd\admin\DivisionController@update')->name('division-update');
    Route::post('/division-delete/{id}', 'BackEnd\admin\DivisionController@delete')->name('division-delete');
  });


  /*district's All routes*/
  Route::group(['prefix' => 'district'], function(){
    Route::get('/district-create', 'BackEnd\admin\DistrictController@create')->name('district-create');
    Route::post('/district-store', 'BackEnd\admin\DistrictController@store')->name('district-store');
    Route::get('/district-edit/{id}', 'BackEnd\admin\DistrictController@edit')->name('district-edit');
    Route::get('/district-view', 'BackEnd\admin\DistrictController@view')->name('district-view');
    Route::post('/district-update/{id}', 'BackEnd\admin\DistrictController@update')->name('district-update');
    Route::post('/district-delete/{id}', 'BackEnd\admin\DistrictController@delete')->name('district-delete');
  });
});



/* User's All routes    */
Route::group(['prefix' => 'user'], function(){
  Route::get('/token/{remember_token}', 'VerificationController@verify')->name('user.verification');
  Route::get('/dashboard', 'FrontEnd\UsersController@dashboard')->name('user.dashboard');
  Route::post('/update/{id}', 'FrontEnd\UsersController@update')->name('user.update');
});

/* Cart's All routes    */
Route::group(['prefix' => 'cart'], function(){
  Route::get('/', 'FrontEnd\CartsController@index')->name('cart.show');
  Route::post('/store', 'FrontEnd\CartsController@store')->name('carts.store');
  Route::post('/update/{id}', 'FrontEnd\CartsController@update')->name('carts.update');
  Route::post('/delete/{id}', 'FrontEnd\CartsController@delete')->name('carts.delete');
});

/* Checkout's All routes    */
Route::group(['prefix' => 'checkouts'], function(){
  Route::get('/', 'BackEnd\Checkouts\CheckoutsController@index')->name('checkouts');
  Route::post('/store', 'BackEnd\Checkouts\CheckoutsController@store')->name('checkouts.store');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



?>
