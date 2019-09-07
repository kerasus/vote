<?php

use App\Http\Controllers\Api\IndexController;
use App\Http\Controllers\Api\UserVoteOptionContoller;
use App\Http\Controllers\Api\VoteController;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('/' , '\\'.IndexController::class);
    Route::resource('uservoteoption' , '\\'.UserVoteOptionContoller::class);
    Route::resource('vote' , '\\'.VoteController::class);
});
