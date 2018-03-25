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

/*
|--------------------------------------------------------------------------
| Dashboard Route
|--------------------------------------------------------------------------
*/

Route::get('/admin', 'LoginController@index')->name('login');

Route::post('/loginProcess', 'LoginController@login')->name('loginProcess');

Route::group(['middleware' => 'checkuser'], function() {
    Route::get('/admin/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/admin/restaurant', 'RestaurantDashboardController@index')->name('dashboard-restaurant');

    Route::get('/admin/restaurant/top', 'TopRestaurantDashboardController@index')->name('dashboard-top-restaurant');

    Route::get('/admin/restaurant/review', 'ReviewDashboardController@index')->name('dashboard-review');

    Route::get('/admin/restaurant/review/{restaurant_id}', 'ReviewDashboardController@getRestaurantById')->name('dashboard-review-spec');

    Route::get('/admin/restaurant/voucher', 'VoucherDashboardController@index')->name('dashboard-voucher');

    Route::get('/admin/restaurant/voucher/{restaurant_id}', 'VoucherDashboardController@getRestaurantById')->name('dashboard-voucher-spec');

    Route::get('/admin/member', 'UserDashboardController@index')->name('dashboard-member');

    Route::get('/admin/member/voucher/', 'UserGetVoucherDashboardController@index')->name('dashboard-member-voucher');

    Route::get('/admin/member/voucher/{restaurant}', 'UserGetVoucherDashboardController@getRestaurantById')->name('dashboard-member-voucher-spec');;

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

/*
|--------------------------------------------------------------------------
| Client Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('home');
});

Route::get('/home/{order?}', 'HomeController@index')->name('client-index');

Route::get('/about', 'AboutController@index')->name('client-about');

Route::get('/review/{restaurant_id}', 'ReviewClientController@index')->name('client-review');

Route::get('/search/{keyword}', 'SearchController@index')->name('client-search');

Route::get('/member', 'MemberController@index')->name('client-member');

Route::get('/partnership', 'PartnershipController@index')->name('client-partnership');

Route::get('/promo', 'PromoController@index')->name('client-promo');

/*
|--------------------------------------------------------------------------
| Tables Route
|--------------------------------------------------------------------------
*/

Route::get('/getListMember', 'UserDashboardController@getListMember');

Route::get('/getListRestaurant', 'RestaurantDashboardController@getListRestaurant');

Route::get('/getListTopRestaurant', 'TopRestaurantDashboardController@getAllTopRestaurant');

Route::get('/getListVoucher/{restaurant_id}', 'VoucherDashboardController@getAllVoucherByRestaurant');

Route::get('/getListReview/{restaurant_id}', 'ReviewDashboardController@getAllReviewByRestaurant');

Route::get('/getListMemberVoucher/{restaurant_id}', 'UserGetVoucherDashboardController@getAllUserByRestaurant');

/*
|--------------------------------------------------------------------------
| Insert Data Route
|--------------------------------------------------------------------------
*/
Route::post('/insertMember', 'MemberController@store');

Route::post('/insertRestaurant', 'RestaurantDashboardController@store');

Route::post('/insertTopRestaurant', 'TopRestaurantDashboardController@store');

Route::post('/insertVoucher', 'VoucherDashboardController@store');

Route::post('/insertReview', 'ReviewClientController@store');

Route::post('/insertMemberVoucher', 'PromoController@store');

/*
|--------------------------------------------------------------------------
| Delete Data Route
|--------------------------------------------------------------------------
*/
Route::post('/deleteMember', 'UserDashboardController@destroy');

Route::post('/deleteRestaurant', 'RestaurantDashboardController@destroy');

Route::post('/deleteTopRestaurant', 'TopRestaurantDashboardController@destroy');

Route::post('/deleteVoucher', 'VoucherDashboardController@destroy');

Route::post('/deleteReview', 'ReviewDashboardController@destroy');

Route::post('/deleteMemberVoucher', 'UserGetVoucherDashboardController@destroy');

/*
|--------------------------------------------------------------------------
| update Data Route
|--------------------------------------------------------------------------
*/
Route::post('/updateMember', 'UserDashboardController@update');

Route::post('/updateRestaurant', 'RestaurantDashboardController@update');

Route::post('/updateTopRestaurant', 'TopRestaurantDashboardController@update');

Route::post('/updateVoucher', 'VoucherDashboardController@update');

Route::post('/updateReview', 'ReviewDashboardController@update');

Route::post('/updateMemberVoucher', 'UserGetVoucherDashboardController@update');

/*
|--------------------------------------------------------------------------
| others Data Route
|--------------------------------------------------------------------------
*/

Route::get('/home/ajax/loaddata','HomeController@loadDataAjax' );

Route::post('/updateAbout', 'DashboardController@updateAbout')->name('update-about');

Route::post('/updateTitle', 'DashboardController@updateHomeTitle')->name('update-title');

Route::post('/updateContact', 'DashboardController@updateContact')->name('update-contact');

Route::post('/updateMemberInformation', 'DashboardController@updateMemberInformation')->name('update-info');

Route::get('/sendemail', 'EmailController@getCode');

Route::get('/checkIfExist/{email}','PromoController@checkAttribute');

Route::get('/checkIfGetPromo/{email}/{code}','PromoController@checkIsGetPromo');