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
    return view('home');
})->middleware('auth');

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//create rider

Route::get('/riders', 'RidersController@index')->name('viewriders');;

Route::get('/riders/create-rider', 'RidersController@createRider')->name('createRider');

Route::post('/riders/create-rider', 'RidersController@postRider')->name('postRider');

Route::post('/riders/upload-riderpic', 'RidersController@postRiderimage')->name('postRiderimage');

Route::post('/riders/remove-riderpic', 'RidersController@removeImage')->name('removeImage');

//create bike
Route::get('/riders/create-bike', 'BikeDetailsController@createBike')->name('createBike');
Route::post('/riders/create-bike', 'BikeDetailsController@postBike')->name('postBike');

Route::post('/riders/back-bike', 'BikeDetailsController@back')->name('backbike');


//create next of kin
Route::get('/riders/create-nextkin', 'NextkinDetailsController@createNextkin')->name('createNextkin');
Route::post('/riders/create-nextkin', 'NextkinDetailsController@postNextkin')->name('postNextkin');
Route::post('/riders/back-nextkin', 'NextkinDetailsController@back')->name('backnext');

//create other details
Route::get('/riders/create-other', 'OtherDetailsController@createOther')->name('createOther');
Route::post('/riders/create-other', 'OtherDetailsController@postOther')->name('postOther');
Route::post('/riders/back-other', 'OtherDetailsController@back')->name('backother');

//create ticket
Route::get('/tickets', 'TicketsController@index')->name('viewtickets');
Route::get('/tickets/create-ticket', 'TicketsController@createTicket')->name('createTicket');
Route::post('/tickets/create-ticket', 'TicketsController@postTicket')->name('postTicket');

//preview

Route::post('/riders/confirmation', 'RiderpreviewController@confirmation')->name('confirmrider');
Route::post('/riders/backconfirmation', 'RiderpreviewController@back')->name('confirmback');
Route::post('/riders/saveconfirmation', 'RiderpreviewController@submit')->name('saverider');

Route::post('/tickets/confirmation', 'TicketsPreviewController@confirmation')->name('confirmticket');
Route::post('/tickets/backconfirmation', 'TicketsPreviewController@back')->name('backticket');
Route::post('/tickets/saveconfirmation', 'TicketsPreviewController@submit')->name('saveticket');