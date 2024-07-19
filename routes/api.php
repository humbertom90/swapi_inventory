<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipController;
use App\Http\Controllers\VehicleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and assigned to the "api"
| middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('starships', [ShipController::class, 'index']);
Route::post('starships/{id}/increment', [ShipController::class, 'incrementCount']);
Route::post('starships/{id}/decrement', [ShipController::class, 'decrementCount']);
Route::post('starships/{id}/set', [ShipController::class, 'setCount']);

// Rutas similares para los vehículos
Route::get('vehicles', [VehicleController::class, 'index']);
Route::post('vehicles/{id}/increment', [VehicleController::class, 'incrementCount']);
Route::post('vehicles/{id}/decrement', [VehicleController::class, 'decrementCount']);
Route::post('vehicles/{id}/set', [VehicleController::class, 'setCount']);