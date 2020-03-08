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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('dashboard','TruckRecordsController@index')->name('secguard.dashboard');
Route::get('add-truck-record','TruckRecordsController@addRecord')->name('secguard.add-record');
Route::get('send-mail','MailSend@mailsend')->name('emails.sendmail');
Route::get('send', 'NotificationController@send');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    // Route::resource('orders','OrdersController');
// Products
Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
Route::resource('products', 'ProductsController');

// Orders
Route::delete('orders/destroy', 'OrdersController@massDestroy')->name('orders.massDestroy');
Route::resource('orders', 'OrdersController');
});

