<?php

use App\Http\Controllers\LikeController;
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


Route::apiResource('/question','QuestionController');
Route::apiResource('/category','CategoryController');
Route::apiResource('question/{question}/reply','ReplyController');
Route::post('{reply}/like','LikeController@like');
Route::delete('{reply}/like','LikeController@dislike');

Route::get('notification','NotificationController@index');
Route::get('notification/{id}','NotificationController@readQuestion');


Route::group([

    //'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signUp', 'AuthController@signUp');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});
