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

Auth::routes();
Route::get('/', 'HomeController@index')->name('/')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//create rider

Route::get('/riders', 'RidersController@index')->name('viewriders');

Route::get('/riders/create-rider', 'RidersController@createRider')->name('createRider');

Route::post('/riders/create-rider', 'RidersController@postRider')->name('postRider');

Route::post('/riders/upload-riderpic', 'RidersController@postRiderimage')->name('postRiderimage');

Route::post('/riders/remove-riderpic', 'RidersController@removeImage')->name('removeImage');

//create bike
Route::get('/riders/create-bike', 'BikeDetailsController@createBike')->name('createBike');
Route::post('/riders/create-bike', 'BikeDetailsController@postBike')->name('postBike');

Route::get('/riders/back-bike', 'BikeDetailsController@back')->name('backbike');

//create next of kin
Route::get('/riders/create-nextkin', 'NextkinDetailsController@createNextkin')->name('createNextkin');
Route::post('/riders/create-nextkin', 'NextkinDetailsController@postNextkin')->name('postNextkin');
Route::get('/riders/back-nextkin', 'NextkinDetailsController@back')->name('backnext');

//create other details
Route::get('/riders/create-other', 'OtherDetailsController@createOther')->name('createOther');
Route::post('/riders/create-other', 'OtherDetailsController@postOther')->name('postOther');
Route::get('/riders/back-other', 'OtherDetailsController@back')->name('backother');

//create ticket
Route::get('/tickets', 'TicketsController@index')->name('viewtickets');
Route::get('/tickets/create-ticket', 'TicketsController@createTicket')->name('createTicket');
Route::post('/tickets/create-ticket', 'TicketsController@postTicket')->name('postTicket');

//preview

Route::get('/riders/confirmation', 'RiderPreviewController@preview')->name('preview');
Route::get('/riders/backconfirmation', 'RiderPreviewController@back')->name('confirmback');
Route::post('/riders/saveconfirmation', 'RiderPreviewController@submit')->name('saverider');

Route::post('/tickets/confirmation', 'TicketsPreviewController@confirmation')->name('confirmticket');
Route::get('/tickets/backconfirmation', 'TicketsPreviewController@back')->name('backticket');
Route::post('/tickets/saveconfirmation', 'TicketsPreviewController@submit')->name('saveticket');