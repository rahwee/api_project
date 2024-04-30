<?php

use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1', 'middleware'=>['auth:jwt', 'role:superadmin']], function(){
    Route::get('room', [RoomController::class, 'index']);
    Route::post('room', [RoomController::class, 'store']);
});

