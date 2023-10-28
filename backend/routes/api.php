<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendeeController;

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

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('attendees_index', [AttendeeController::class, 'index']);
Route::post('attendees_add', [AttendeeController::class,'store']);
    

// Definimos las rutas del CRUD de asistentes bajo el middleware de autenticación
Route::middleware('auth:sanctum')->group(function() {

    Route::post('/logout', [UserController::class, 'logout']);
    Route::apiResource('attendees', AttendeeController::class);
});
