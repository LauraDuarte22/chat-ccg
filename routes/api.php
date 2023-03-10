<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CampaingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/dashboard', [DashboardController::class, 'index']);
  
});
Route::post("/send-message", [TestController::class, "sendMessages"]);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/createCampaing', [CampaingController::class, 'createCampaing']);
Route::get('/getCampaing', [CampaingController::class, 'getCampaing']);



