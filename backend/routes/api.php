<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Authentication routes
Route::post('login', 'UserController@login');
Route::post('register', 'UserController@register');
Route::post('sendPasswordResetLink', 'ResetPasswordController@sendEmail');
Route::post('resetPassword', 'ChangePasswordController@process');

// Post routes
Route::get('posts', 'PostController@index');
Route::get('posts/{id}', 'PostController@show');
Route::post('newUser/', 'UserController@newUser');


// RecordInvoices routes
Route::get('recordInvoices', 'RecordInvoiceController@index');
Route::get('recordInvoices/{id}', 'RecordInvoiceController@show');
Route::post('recordInvoices', 'RecordInvoiceController@store');
Route::put('recordInvoices/{id}', 'RecordInvoiceController@update');
Route::delete('recordInvoices/{id}', 'RecordInvoiceController@destroy');


//CampaignHistory routes
Route::get('campaignHistories', 'CampaignHistoryController@index');
Route::get('campaignHistories/{id}', 'CampaignHistoryController@show');
Route::post('campaignHistories', 'CampaignHistoryController@store');
Route::put('campaignHistories/{id}', 'CampaignHistoryController@update');
Route::delete('campaignHistories/{id}', 'CampaignHistoryController@destroy');

// Lead routes
Route::get('leads', 'LeadController@index');
Route::get('leads/{id}', 'LeadController@show');
Route::post('leads', 'LeadController@store');
Route::put('leads/{id}', 'LeadController@update');
Route::delete('leads/{id}', 'LeadController@destroy');

Route::group(['middleware' => 'auth.jwt'], function () {
    // Authentication routes
    Route::get('logout', 'UserController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('user', 'UserController@getAuthUser');

    // User routes
    Route::get('users', 'UserController@index');
    Route::get('users/{id}', 'UserController@show');
    Route::post('users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::delete('users/{id}', 'UserController@destroy');

    // Invoice routes
    Route::get('invoices', 'InvoiceController@index');
    Route::get('invoices/{id}', 'InvoiceController@show');
    Route::get('submit/{id}', 'InvoiceController@submit');
    Route::post('invoices', 'InvoiceController@store');
    Route::put('invoices/{id}', 'InvoiceController@update');
    Route::delete('invoices/{id}', 'InvoiceController@destroy');
    Route::post('uploadFile', 'InvoiceController@uploadFile');

    // Chain routes
    Route::get('chains', 'ChainController@index');
    Route::get('chains/{id}', 'ChainController@show');
    Route::post('chains', 'ChainController@store');
    Route::put('chains/{id}', 'ChainController@update');
    Route::delete('chains/{id}', 'ChainController@destroy');



    // Post routes
    Route::post('posts', 'PostController@store');
    Route::put('posts/{id}', 'PostController@update');
    Route::delete('posts/{id}', 'PostController@destroy');


});
