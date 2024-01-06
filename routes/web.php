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
Route::get('/', 'HomeController@home')->name('index');
Route::get('/index', 'HomeController@home')->name('index');

Route::get('/privacy', 'HomeController@privacy')->name('privacy');
Route::get('/index/{branch}/{riderid}/details', 'HomeController@details');
Route::get('/clear', 'HomeController@clearapp')->name('clear');
Auth::routes();
Route::get('/admin', 'HomeController@index')->name('home')->middleware('auth');
//create rider

Route::get('/riders', 'RidersController@index')->name('viewriders');
Route::get('/riders/{id}/details', 'RidersController@show')->name('show');
Route::post('/riders/{id}/delete', 'RidersController@delete')->name('delete');
Route::get('/riders/rider', 'RidersController@createRider')->name('createRider');

Route::post('/riders/rider', 'RidersController@postRider')->name('postRider');
//create bike
Route::get('/riders/bike', 'BikeDetailsController@createBike')->name('createBike');
Route::post('/riders/bike', 'BikeDetailsController@postBike')->name('postBike');

Route::get('/riders/prev_bike', 'BikeDetailsController@back')->name('backbike');

//create next of kin
Route::get('/riders/nextkin', 'NextkinDetailsController@createNextkin')->name('createNextkin');
Route::post('/riders/nextkin', 'NextkinDetailsController@postNextkin')->name('postNextkin');
Route::get('/riders/prev_next', 'NextkinDetailsController@back')->name('backnext');

//create other details
Route::get('/riders/other', 'OtherDetailsController@createOther')->name('createOther');
Route::post('/riders/other', 'OtherDetailsController@postOther')->name('postOther');
Route::get('/riders/prev_other', 'OtherDetailsController@back')->name('backother');

//create ticket

//create ticket
Route::get('/tickets', 'TicketsController@index')->name('viewtickets');
Route::get('/tickets/{id}/show', 'TicketsController@show');
Route::get('/tickets/ticket', 'TicketsController@createTicket')->name('createTicket');
Route::post('/tickets/ticket', 'TicketsController@postTicket')->name('postTicket');

//preview

Route::get('/riders/confirmation', 'RiderPreviewController@preview')->name('preview');
Route::get('/riders/prev_review', 'RiderPreviewController@back')->name('confirmback');
Route::post('/riders/submit', 'RiderPreviewController@submit')->name('saverider');
Route::get('/riders/cancel', 'RiderPreviewController@cancel')->name('cancel');

Route::get('/tickets/confirmation', 'TicketsPreviewController@preview')->name('previewticket');
Route::get('/tickets/prev_ticket', 'TicketsPreviewController@back')->name('backticket');
Route::post('/tickets/submit', 'TicketsPreviewController@store')->name('saveticket');

Route::get('/tickets/cancel', 'RiderPreviewController@cancel')->name('cancelticket');
Route::get('/tickets/exportExcel', 'TicketsController@exportExcel')->name('exportTicket');

//message

Route::post('/index', 'messageController@saveMessage')->name('savemessage');
Route::get('/inbox', 'messageController@viewMessages')->name('viewmessages');

Route::get('/inbox/compose', 'messageController@compose')->name('composemsg');

Route::get('/inbox/getMSg', 'messageController@getUnreadMSG')->name('getUnreadMSG');
Route::get('/inbox/{id}/read', 'messageController@readMSG')->name('readMSG');
Route::post('/inbox/{id}/delete', 'messageController@deleteMSG')->name('deleteMSG');

Route::post('/inbox/message', 'messageController@sendmsg')->name('sendmsg');

Route::get('/branch/all', 'AdminController@getBranches')->name('get.branch');
Route::post('/branch/create', 'AdminController@registerBranch')->name('register.branch');


Route::post('/change/password', 'HomeController@ChangePassword')->name('change.password');