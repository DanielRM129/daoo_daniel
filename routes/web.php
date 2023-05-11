<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AreaController;




use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola', [HomeController::class,'index']);
Route::get('/produtos', [ProdutoController::class,'index']);
Route::get('/produto/{id}', [ProdutoController::class,'show']);

Route::get('/usuarios', [UsuarioController::class,'index']);
Route::get('/usuario/{id}', [UsuarioController::class,'show']);
Route::get('/usuario', [UsuarioController::class,'create']);
Route::post('/usuario', [UsuarioController::class,'store']);
Route::get('/usuario/{id}/edit', [UsuarioController::class,'edit'])->name('edit');
Route::post('/usuario/{id}/update', [UsuarioController::class,'update'])->name('update');
Route::get('/usuario/{id}/delete', [UsuarioController::class,'delete'])->name('delete');

Route::get('/categorias', [CategoriaController::class,'index']);
Route::get('/categoria/{id}', [CategoriaController::class,'show']);
Route::get('/categoria', [CategoriaController::class,'create']);
Route::post('/categoria', [CategoriaController::class,'store']);

Route::get('/itens', [ItemController::class,'index']);
Route::get('/item/{id}', [ItemController::class,'show']);
Route::get('/item', [ItemController::class,'create']);
Route::post('/item', [ItemController::class,'store']);

Route::get('/areas', [AreaController::class,'index']);
Route::get('/area/{id}', [AreaController::class,'show']);
Route::get('/area', [AreaController::class,'create']);
Route::post('/area', [AreaController::class,'store']);

Route::get('/dia', function () {
    echo 'Bom Dia Mundo!!';
});
