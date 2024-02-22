<?php

use App\Http\Controllers\PersonalesController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/personales', [PersonalesController::class, 'index']);
Route::get('/personales/{id}', [PersonalesController::class, 'show']);
Route::post('/personales', [PersonalesController::class, 'store']);
Route::put('/personales/{id}', [PersonalesController::class, 'update']);
Route::delete('/personales/{id}', [PersonalesController::class, 'delete']);

