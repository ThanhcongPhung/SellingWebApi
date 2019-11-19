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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//add index
Route::get('/', 'IndexController@index');
Route::match(['get','post'],'/admin','AdminController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard','AdminController@dashboard');
Route::get('/admin/setting','AdminController@setting');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');
//add banner
Route::match(['get','post'],'/admin/add-banner','BannerController@addBanner');
Route::match(['get','post'],'/admin/edit-banner/{id}','BannerController@editBanner');
Route::get('admin/view-banner','BannerController@viewBanner');
Route::get('/admin/delete-banner/{id}','BannerController@deleteBanner');
Route::match(['get','post'],'/admin/add-coupon','CouponController@addCoupon');
Route::get('admin/view-coupons','CouponController@viewCoupons');

Route::get('/logout','AdminController@logout');
