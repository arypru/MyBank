<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CuentaController;
use App\Http\Controllers\Api\AuthController;
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

//Persona
Route::apiResource('personas', PersonaController::class);
Route::apiResource('users', UserController::class);
Route::post('/verificar-dni/{dni}', [PersonaController::class, 'verificar_dni']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function ()
{
    Route::get('/ver-cuentas-usuarios/{id}', [CuentaController::class, 'verTodasLasCuentasUsuario']);
    Route::get('/ver-detalle-cuenta/{nrocuenta}', [CuentaController::class, 'verDetalleCuenta']);
    Route::post('/nueva-cuenta', [CuentaController::class, 'store']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

