<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AsistentesController;
use App\Http\Controllers\SecurityAuthController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    // Rutas para Asistentes
    Route::apiResource('/asistentes', AsistentesController::class);
    Route::post('/logout',[SecurityAuthController::class,'logout']);
});


// Rutas para Asistentes
Route::post('/asistentes', [AsistentesController::class, 'store']); // Crear un asistente
Route::get('/asistentes', [AsistentesController::class, 'index']);  // Listar todos los asistentes
Route::get('/asistentes/{id}', [AsistentesController::class, 'show']); // Ver un asistente específico por ID
Route::put('/asistentes/{id}', [AsistentesController::class, 'update']); // Actualizar un asistente por ID
Route::delete('/asistentes/{id}', [AsistentesController::class, 'destroy']); // Eliminar un asistente por ID

// Ruta para registrar un nuevo usuario
//Route::post('/register', [RegisterController::class, 'register'])->name('register');
//Route::post('/register', [RegisterController::class, 'register']);

//Route::post('login',[SecurityAuthController::class,'registro'])->name('login');

