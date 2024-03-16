<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('images')->group(function () {
    Route::post('/upload', [\App\Http\Controllers\ImageController::class, 'upload'])->name('upload');
    Route::get('/info', [\App\Http\Controllers\ImageController::class, 'info'])->name('info');
    Route::get('/zip', [\App\Http\Controllers\ImageController::class, 'zip'])->name('zip');
});
