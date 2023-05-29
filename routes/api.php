<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\ItemController;

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

Route::get('/categorias',[CategoriaController::class,'index']);
Route::get('/categoria/{id}',[CategoriaController::class,'show']);
Route::post('/categoria',[CategoriaController::class,'store']);
Route::put('/categoria/{id}',[CategoriaController::class,'update']);
Route::delete('/categoria/{id}',[CategoriaController::class,'remove']);

Route::get('/areas',[AreaController::class,'index']);
Route::get('/area/{id}',[AreaController::class,'show']);
Route::post('/area',[AreaController::class,'store']);
Route::put('/area/{id}',[AreaController::class,'update']);
Route::delete('/area/{id}',[AreaController::class,'remove']);

Route::get('/itens',[ItemController::class,'index']);
Route::get('/item/{id}',[ItemController::class,'show']);
Route::post('/item',[ItemController::class,'store']);
Route::put('/item/{id}',[ItemController::class,'update']);
Route::delete('/item/{id}',[ItemController::class,'remove']);
