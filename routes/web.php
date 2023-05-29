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
Route::get('/usuario/{id}/edit', [UsuarioController::class,'edit'])->name('editUser');
Route::post('/usuario/{id}/update', [UsuarioController::class,'update'])->name('updateUser');
Route::get('/usuario/{id}/delete', [UsuarioController::class,'delete'])->name('deleteUser');
Route::post('/usuario/{id}/delete', [UsuarioController::class,'remove'])->name('removeUser');

Route::get('/categorias', [CategoriaController::class,'index']);
Route::get('/categoria/{id}', [CategoriaController::class,'show']);
Route::get('/categoria', [CategoriaController::class,'create']);
Route::post('/categoria', [CategoriaController::class,'store']);
Route::get('/categoria/{id}/edit', [CategoriaController::class,'edit'])->name('editCat');
Route::post('/categoria/{id}/update', [CategoriaController::class,'update'])->name('updateCat');
Route::get('/categoria/{id}/delete', [CategoriaController::class,'delete'])->name('deleteCat');
Route::post('/categoria/{id}/delete', [CategoriaController::class,'remove'])->name('removeCat');

Route::get('/itens', [ItemController::class,'index']);
Route::get('/item/{id}', [ItemController::class,'show']);
Route::get('/item', [ItemController::class,'create']);
Route::post('/item', [ItemController::class,'store']);
Route::get('/item/{id}/edit', [ItemController::class,'edit'])->name('editItem');
Route::post('/item/{id}/update', [ItemController::class,'update'])->name('updateItem');
Route::get('/item/{id}/delete', [ItemController::class,'delete'])->name('deleteItem');
Route::post('/item/{id}/delete', [ItemController::class,'remove'])->name('removeItem');

Route::get('/areas', [AreaController::class,'index']);
Route::get('/area/{id}', [AreaController::class,'show']);
Route::get('/area', [AreaController::class,'create']);
Route::post('/area', [AreaController::class,'store']);
Route::get('/area/{id}/edit', [AreaController::class,'edit'])->name('editArea');
Route::post('/area/{id}/update', [AreaController::class,'update'])->name('updateArea');
Route::get('/area/{id}/delete', [AreaController::class,'delete'])->name('deleteArea');
Route::post('/area/{id}/delete', [AreaController::class,'remove'])->name('removeArea');



Route::get('/dia', function () {
    echo 'Bom Dia Mundo!!';
});
