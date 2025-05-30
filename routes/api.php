<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/artisan/key-generate', [ViewController::class, 'generateKey']);
Route::get('/artisan/cache', [ViewController::class, 'clearCache']);
Route::get('/artisan/storage-link', [ViewController::class, 'storageLink']);
Route::get('/artisan/migrate', [ViewController::class, 'migrate']);
