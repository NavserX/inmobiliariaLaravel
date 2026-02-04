<?php

use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\PerfilController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PropietarioController;
use \App\Http\Controllers\UserController;

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/

Route::get('/propietario', [PropietarioController::class, 'index']);
Route::get('/propietario/{propietario}', [PropietarioController::class, 'show']);
Route::delete('/propietario/{propietario}', [PropietarioController::class, 'destroy']);
Route::post('/propietario', [PropietarioController::class, 'store']);
Route::put('/propietario/{propietario}', [PropietarioController::class, 'update']);

Route::apiResource('perfil', PerfilController::class);

Route::post('/user',[UserController::class,'store']);
Route::post('/user/login/',[UserController::class,'verify']);


Route::middleware('auth:sanctum')->group(function () {
    //Rutas de usuario
    Route::get('/user/logout',[UserController::class, 'logout']);
    Route::get('/user/{user}',[UserController::class, 'show']);
    //Rutas de inmueble
    Route::get('/inmueble', [InmuebleController::class, 'index']);
});
