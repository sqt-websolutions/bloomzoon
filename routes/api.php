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


Route::group(['prefix' =>'/v1', 'middleware' => ['jwt.verify']], static function (){
});

Route::group(['prefix' =>'/v1'], static function(){

    /** crud endpoints */
    Route::post('crud/{entity}', 'CrudResourceController@store');
    Route::get('crud/{entity}', 'CrudResourceController@index');
    Route::get('crud/{entity}/{id}', 'CrudResourceController@show');
    Route::put('crud/{entity}/{id}', 'CrudResourceController@update');
    Route::delete('crud/{entity}/{id}', 'CrudResourceController@delete');

    /** auth */
    Route::post('auth/login', 'AuthenticationAPIController@authenticate');
    Route::post('auth/user', 'AuthenticationAPIController@getAuthenticatedUser');

    /** notifications */
    Route::post('/notifications/email/send', 'EmailNotificationController@handle');

    /** generic user meta queries */
    Route::get('/query/user_meta/{id}', 'GenericUserMetaController@handle');

    /** generic model queries  */
    Route::get('/query/generic/{entity}', 'GenericQueryController@handle');

    Route::get('/cart/{action}/{product_id?}/{quantity?}', 'CartController@handle');

});


