<?php

use App\Http\Controllers\StudentsController;
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

Route::get('/student', [StudentsController::class, 'index']);
Route::post('/student', [StudentsController::class, 'store']);
Route::get('/student/{student}', [StudentsController::class, 'show']);
Route::put('/student/{id}', [StudentsController::class, 'update']);
Route::delete('/student/{id}', [StudentsController::class, 'destroy']);