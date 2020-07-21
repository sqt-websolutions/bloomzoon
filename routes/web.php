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

Route::get('/{category?}/{page_name?}', 'PagesController@get_page_view');
Route::get('/login', 'PagesController@get_page_view')->name('login');
Route::group(['middleware'=>'web'], static function(){ Route::post('auth/login/{client?}', 'AuthenticationAPIController@authenticate');});

