<?php

use Illuminate\Http\Request;
use App\Services\RabbitMQService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('verify-email', [AuthController::class, 'verify']);
});

Route::prefix('v1')->group(function (){
    Route::group(['middleware' => ['auth:jwt']], function (){
        Route::get('me', [AuthController::class, 'meInfo']);
        Route::get('users', [UserController::class, 'index']);
        Route::patch('users', [UserController::class, 'updateMe']);
        Route::delete('users/{id}', [UserController::class, 'destroy']);
    });
});






