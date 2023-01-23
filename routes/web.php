<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/send-message", [TestController::class, "sendMessages"]);
Route::get("/weebhook", [TestController::class, "verifyToken"]);
Route::post("/weebhook", [TestController::class, "processWebhook"]);
Route::get("/get-template", [TestController::class, "getTemplates"]);

Route::post('/register', [AuthController::class, 'register']);