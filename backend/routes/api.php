<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\UserController;

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
Route::post('/verificar-dni/{dni}', [PersonaController::class, 'verificar_dni']);

Route::apiResource('users', UserController::class);

/**Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});**/
