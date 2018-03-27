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

Route::resource('places', 'PlaceController');
Route::get('places/edit/{place}', 'PlaceController@edit')->name('places.edit');

Route::resource('customers', 'CustomerController');
Route::get('customers/edit/{customer}', 'CustomerController@edit')->name('customers.edit');

Auth::routes();

Route::resource('alarms', 'AlarmController');
Route::get('alarms/edit/{alarm}', 'AlarmController@edit')->name('alarms.edit');

Route::resource('sensors', 'SensorController');
Route::get('sensors/edit/{sensor}', 'SensorController@edit')->name('sensors.edit');

Route::get('/', 'HomeController@index')->name('home');
