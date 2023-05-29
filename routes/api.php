<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsuarioController;

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

Route::get('/usuarios',[UsuarioController::class,'index']);
Route::get('/usuario/{id}',[UsuarioController::class,'show']);
Route::post('/usuario',[UsuarioController::class,'store']);
Route::put('/usuario/{id}',[UsuarioController::class,'update']);
Route::delete('/usuario/{id}',[UsuarioController::class,'remove']);
