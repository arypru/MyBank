<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CuentaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AccesosController;
use App\Http\Controllers\Api\TransferenciasController;
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

Route::post('/verificar-dni/{dni}', [PersonaController::class, 'verificar_dni']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function ()
{
    Route::get('/ver-cuentas-usuarios/{id}', [CuentaController::class, 'verTodasLasCuentasUsuario']);
    Route::get('/ver-detalle-cuenta/{nrocuenta}', [CuentaController::class, 'verDetalleCuenta']);
    Route::post('/nueva-cuenta', [CuentaController::class, 'store']);
    Route::post('/dar-baja-cuenta/{idCuenta}', [CuentaController::class, 'darDeBaja']);
    Route::post('/modificar-alias', [CuentaController::class, 'modificarAlias']);
    Route::post('/modificar-descrip', [CuentaController::class, 'modificarDescripcion']);

    Route::apiResource('personas', PersonaController::class);
    Route::apiResource('user', UserController::class);

    Route::apiResource('accesos', AccesosController::class);
    Route::get('accesoActivo/{id}', [AccesosController::class, 'accesoActivo']);

    Route::get('/ver-cuentas-mybank/{userId}', [TransferenciasController::class, 'verCuentasMyBank']);
    Route::get('/ver-cuentas-propias/{userId}', [TransferenciasController::class, 'verCuentasPropias']);
    Route::post('/transf-propias', [TransferenciasController::class, 'transferenciaPropias']);
    Route::post('/transf-terceros', [TransferenciasController::class, 'transferenciaTerceros']);
    Route::get('/beneficiario-alias/{alias}', [TransferenciasController::class, 'buscarBeneficiarioAlias']);
    Route::get('/ver-transferencias/{userId}', [TransferenciasController::class, 'verTransferencias']);
    Route::post('/ver-movimientos', [TransferenciasController::class, 'verMovimientos']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

