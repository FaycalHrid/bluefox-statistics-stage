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

Route::get('invoice/index', 'InvoiceController@index');
Route::resource('invoice', 'InvoiceController');

Route::get('getAll', 'UserBehaviorController@getAll');
Route::get('test/hello', 'TestController@hello');

Route::get('UserBehavior/create','UserBehaviorController@create');
Route::get('User/createFreshLead','UserController@createFreshLead');

Route::get('LeadAffiliatePlatformController/newLeadAffiliatePlatfromViaApi','LeadAffiliatePlatformController@newLeadAffiliatePlatfromViaApi');

