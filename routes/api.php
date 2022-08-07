<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\CustomerController;
use App\http\Controllers\AuthController;
use App\http\Controllers\RegionController;
use App\http\Controllers\CommuneController;


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

Route::post('register', [AuthController::class, 'register'])->middleware('user.validation');
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);
    //regions routes
    Route::get('regions', [RegionController::class, 'index']);
    Route::post('region', [RegionController::class, 'store'])->middleware('region.validation');
    Route::delete('/region/{id}', [RegionController::class, 'destroy']);
    //communes routes
    Route::get('communes', [CommuneController::class, 'index']);
    Route::post('commune', [CommuneController::class, 'store'])->middleware('commune.validation');
    Route::delete('/commune/{id}', [CommuneController::class, 'destroy']);
    //customers routes
    Route::get('customers', [CustomerController::class, 'index']);
    Route::get('/customer/{id}', [CustomerController::class, 'show']);
    Route::post('customer', [CustomerController::class, 'store'])->middleware('customer.validation');
    Route::delete('/customer/{id}', [CustomerController::class, 'destroy']);
});

