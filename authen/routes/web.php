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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Route cho administrator
 */
Route::prefix('admin')->group(function (){
    // Gom nhom cac route cho phan admin

    /**
     * URL : authen.com/admin/
     * Route mac dinh cua admin
     */



    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL : authen.com/admin/dashboard
     * Route dang nhap thanh cong
     */
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');

    /**
     * URL : authen.com/admin/register
     * Route tra ve view dung de dang ki tai khoan admin
     */
    Route::get('register', 'AdminController@create')->name('admin.register');

    /**
     * URL : authen.com/admin/register
     * Phuong thuc la POST
     * Route dung de dang ki 1 admin tu form POST
     */
    Route::post('register', 'AdminController@store')->name('admin.register.store');


    /**
     * URL : authen.com/admin/login
     * METHOD : GET
     * Route tra ve view dang nhap admin
     */
    Route::get('login', 'Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     * URL : authen.com/admin/login
     * MRTHOD : POST
     * Route xu li qua trinh dang nhap admin
     */
    Route::post('login', 'Auth\Admin\LoginController@loginAdmin')->name('admin.auth.loginAdmin');

    /**
     * URL : authen.com/admin/logout
     * METHOD : POST
     * Route dung de dang xuat
     */
    Route::post('logout', 'Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});

/**
 * Route cho cac nha cung cap san pham (seller)
 */

Route::prefix('seller')->group(function () {
    // Gom nhom cac route phan seller

    /**
     *  URL : authen.com/seller/
     *  Route mac dinh cua seller
     */
    Route::get('/', 'SellerController@index')->name('seller.dashboard');

    /**
     *  URL : authen.com/seller/dashboard
     *  Route dang nhap thanh cong
     */
    Route::get('/dashboard', 'SellerController@index')->name('seller.dashboard');

    /**
     * URL : authen.com/seller/register
     * Route tra ve view dung de dang ki tai khoan seller
     */
    Route::get('register', 'SellerController@create')->name('seller.register');

    /**
     * URL : authen.com/seller/register
     * Phuong thuc la POST
     * Route dung de dang ki 1 seller tu form POST
     */
    Route::post('register', 'SellerController@store')->name('seller.register.store');

    /**
     * URL : authen.com/seller/login
     * METHOD : GET
     * Route tra ve view dang nhap seller
     */
    Route::get('login', 'Auth\Seller\LoginController@login')->name('seller.auth.login');

    /**
     * URL : authen.com/seller/login
     * MRTHOD : POST
     * Route xu li qua trinh dang nhap seller
     */
    Route::post('login', 'Auth\Seller\LoginController@loginSeller')->name('seller.auth.loginSeller');

    /**
     * URL : authen.com/seller/logout
     * METHOD : POST
     * Route dung de dang xuat
     */
    Route::post('logout', 'Auth\Seller\LoginController@logout')->name('seller.auth.logout');
});


/**
 * Route cho cac nha van chuyen (shipper)
 */
Route::prefix('shipper')->group(function (){
   // Gom nhom cac route cho phan shipper

    /**
     *  URL : authen.com/shipper/
     *  Route mac dinh cua shipper
     */
    Route::get('/', 'ShipperController@index')->name('shipper.dashboard');

    /**
     *  URL : authen.com/shipper/dashboard
     *  Route dang nhap thanh cong
     */
    Route::get('/dashboard', 'ShipperController@index')->name('shipper.dashboard');

    /**
     * URL : authen.com/shipper/register
     * Route tra ve view dung de dang ki tai khoan shipper
     */
    Route::get('register', 'ShipperController@create')->name('shipper.register');

    /**
     * URL : authen.com/shipper/register
     * Phuong thuc la POST
     * Route dung de dang ki 1 shipper tu form POST
     */
    Route::post('register', 'ShipperController@store')->name('shipper.register.store');

    /**
     * URL : authen.com/shipper/login
     * METHOD : GET
     * Route tra ve view dang nhap shipper
     */
    Route::get('login', 'Auth\Shipper\LoginController@login')->name('shipper.auth.login');

    /**
     * URL : authen.com/shipper/login
     * MRTHOD : POST
     * Route xu li qua trinh dang nhap shipper
     */
    Route::post('login', 'Auth\Shipper\LoginController@loginShipper')->name('shipper.auth.loginShipper');


    /**
     * URL : authen.com/shipper/logout
     * METHOD : POST
     * Route dung de dang xuat
     */
    Route::post('logout', 'Auth\Shipper\LoginController@logout')->name('shipper.auth.logout');
});

