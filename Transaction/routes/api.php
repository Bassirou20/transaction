<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\compteController;
use App\Http\Controllers\transfertController;

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
Route::post('/comptes/{id}/depot', [transfertController::class,'depot']);
Route::post('/transferts', [transfertController::class,'transfert']);
Route::post('/comptes/{id}/retrait', [transfertController::class,'retraitXaliss']);
Route::get('/comptes/{id}/transactions', [transfertController::class,'transactionsByCompte']);
Route::apiResource('/transaction',transfertController::class);
Route::apiResource('/clients',ClientController::class);
Route::apiResource('/comptes',compteController::class)->middleware('cors');
Route::get('comptes', function(){

})->middleware('cors');
