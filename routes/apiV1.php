<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlRequestController;

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

// @todo add Auth middleware
Route::prefix('admin')->group(function() {
    Route::get('/urls', [UrlRequestController::class, 'index'])->name('urls.index');
    Route::post('/urls', [UrlRequestController::class, 'store'])->name('urls.create');
});
