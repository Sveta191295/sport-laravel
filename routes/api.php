<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenClothingController;
use App\Http\Controllers\WomenClothingController;
use App\Http\Controllers\WomenShoesController;
use App\Http\Controllers\MenShoesController;

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



Route::resource('men-clothing', MenClothingController::class);

Route::resource('women-clothing', WomenClothingController::class);

Route::resource('women-shoes', WomenShoesController::class);

Route::resource('men-shoes', MenShoesController::class);