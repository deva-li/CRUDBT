<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/guestbooks', 'GuestbookController@index');
Route::post('/guestbook/store', 'GuestbookController@store');
Route::get('/guestbook/edit/{id}', 'GuestbookController@getguestbook');
Route::get('/guestbook/show/{id}', 'GuestbookController@getguestbook');
Route::put('/guestbook/update/{id}', 'GuestbookController@update');
Route::delete('/guestbook/delete/{id}', 'GuestbookController@delete');