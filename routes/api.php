<?php

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

Route::get('/all',[\App\Http\Controllers\ApiController::class, 'getAll'])->name('apiAll');
Route::get('/name/{name}',[\App\Http\Controllers\ApiController::class, 'getName'])->name('apiName');
Route::get('/id/{id}',[\App\Http\Controllers\ApiController::class, 'getId'])->name('apiIg');


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
