<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\PageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/login', [LoginController::class, 'redirectLoginHome'])->name('redirect');
Route::post('/user/login', [LoginController::class, 'login']);
Route::post('/user/logout', [LoginController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user/auth', [LoginController::class, 'auth']);
    // Route::get('/home', [PageController::class, 'index']);
});
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/news', [PageController::class, 'getNews']);
//     Route::get('/home', [PageController::class, 'index']);
//     Route::post('/price', [PageController::class, 'getPrice']);
//     Route::post('/data', [PageController::class, 'getMonthPhoneData']);
// });

Route::post('/user/make', [HelloController::class, 'make']);
Route::get('/news', [PageController::class, 'getNews']);
Route::get('/user', [PageController::class, 'getUser']);
Route::get('/home', [PageController::class, 'index']);
Route::post('/price', [PageController::class, 'getPrice']);
Route::post('/data', [PageController::class, 'getMonthPhoneData']);
