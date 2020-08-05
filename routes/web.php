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


Route::get('/', 'Customer@index');

/* Route login facebook gg */
// nhan vao provider de xac dinh la gg hay facebook
Route::get('auth/{provider}','Signin@redirectToProvider');
//
Route::get('auth/{provider}/callback','Signin@handleProviderCallback');

//

Route::post('customer/signup', 'Customer@signup');
Route::get('customer/update/{email}', 'Customer@update');
// route nhận dữ liuệ từ form login lên
Route::post('customer/login', 'Customer@login');

Route::get('customer/logout', 'Customer@logout');


Route::post('customer/resetpassword', 'Customer@sendMailForgotPass');
Route::post('customer/reset-password', 'Customer@reset');






