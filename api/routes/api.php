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

/**
 * Route to login an existing user.
 */
Route::post(
    '/login',
    [App\Http\Controllers\AuthController::class, 'authenticate']
);

/**
 * Route to register/create a new user.
 */
Route::post(
    '/register',
    [App\Http\Controllers\AuthController::class, 'register']
);

/**
 * Authenticated user routes.
 */
Route::group(['middleware' => 'auth'], function () {
    
    /**
     * Route to get recipients for current user.
     */
    Route::get(
        '/auth/user/recipients',
        [App\Http\Controllers\UserController::class, 'recipients']
    );

    /**
     * Route to send a new message from user to user.
     */
    Route::post(
        '/auth/user/messages',
        [App\Http\Controllers\UserController::class, 'sendMessage']
    );

    /**
     * Route to get the received messages for current user.
     */
    Route::get(
        '/auth/user/messages/received',
        [App\Http\Controllers\UserController::class, 'receivedMessages']
    );

    /**
     * Route to get the send messages for current user.
     */
    Route::get(
        '/auth/user/messages/send',
        [App\Http\Controllers\UserController::class, 'sendMessages']
    );
});