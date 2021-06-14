<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/',[HomeController::class, 'index']);
//Route::get('/usuarios', [UserController::class, 'index']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Unauthorized', [App\Http\Controllers\HomeController::class, 'permissionsOrRoles'])->name('negar');

Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('indexUser')->middleware(['auth', 'role:Admin']);
Route::get('usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios.create')->middleware(['auth', 'role:Admin']);
Route::post('usuarios', [App\Http\Controllers\UserController::class, 'store'])->name('usuarios.store')->middleware(['auth', 'role:Admin']);
Route::get('usuarios/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('usuarios.edit')->middleware(['auth', 'role:Admin']);
Route::put('usuarios/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('usuarios.update')->middleware(['auth', 'role:Admin']);
Route::get('usuarios/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('usuarios.show')->middleware(['auth', 'role:Admin']);
Route::put('usuarios/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('usuarios.destroy')->middleware(['auth', 'role:Admin']);


Route::get('proveedor', [App\Http\Controllers\ProveedorController::class, 'index'])->name('indexProveedor')->middleware(['auth', 'role:Admin|Proveedor']);
Route::get('proveedor/create', [App\Http\Controllers\ProveedorController::class, 'create'])->name('porveedor.create')->middleware(['auth', 'role:Admin']);
Route::post('proveedor', [App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedor.store')->middleware(['auth', 'role:Admin']);
Route::get('proveedor/{id}/edit', [App\Http\Controllers\ProveedorController::class, 'edit'])->name('proveedor.edit')->middleware(['auth', 'role:Admin']);
Route::put('proveedor/{id}', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedor.update')->middleware(['auth', 'role:Admin']);
Route::get('proveedor/{id}', [App\Http\Controllers\ProveedorController::class, 'show'])->name('proveedor.show')->middleware(['auth', 'role:Admin|Proveedor']);
Route::put('proveedor/delete/{id}', [App\Http\Controllers\ProveedorController::class, 'destroy'])->name('proveedor.destroy')->middleware(['auth', 'role:Admin']);


Route::get('clientes', [App\Http\Controllers\ClientesController::class, 'index'])->name('indexCliente')->middleware(['auth', 'role:Admin|Cliente']);
Route::get('clientes/create', [App\Http\Controllers\ClientesController::class, 'create'])->name('cliente.create')->middleware(['auth', 'role:Admin']);
Route::post('clientes', [App\Http\Controllers\ClientesController::class, 'store'])->name('cliente.store')->middleware(['auth', 'role:Admin']);
Route::get('clientes/{id}/edit', [App\Http\Controllers\ClientesController::class, 'edit'])->name('cliente.edit')->middleware(['auth', 'role:Admin']);
Route::put('clientes/{id}', [App\Http\Controllers\ClientesController::class, 'update'])->name('cliente.update')->middleware(['auth', 'role:Admin']);
Route::get('clientes/{id}', [App\Http\Controllers\ClientesController::class, 'show'])->name('cliente.show')->middleware(['auth', 'role:Admin|Cliente']);
Route::put('clientes/delete/{id}', [App\Http\Controllers\ClientesController::class, 'destroy'])->name('cliente.destroy')->middleware(['auth', 'role:Admin']);


Route::get('productos', [App\Http\Controllers\ProductosController::class, 'index'])->name('indexProductos')->middleware(['auth', 'role:Admin|Cliente|Proveedor']);
Route::get('productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create')->middleware(['auth', 'role:Admin']);
Route::post('productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store')->middleware(['auth', 'role:Admin']);
Route::get('productos/{id}/edit', [App\Http\Controllers\ProductosController::class, 'edit'])->name('productos.edit')->middleware(['auth', 'role:Admin']);
Route::put('productos/{id}', [App\Http\Controllers\ProductosController::class, 'update'])->name('productos.update')->middleware(['auth', 'role:Admin']);
Route::get('productos/{id}', [App\Http\Controllers\ProductosController::class, 'show'])->name('productos.show')->middleware(['auth', 'role:Admin']);
Route::put('productos/delete/{id}', [App\Http\Controllers\ProductosController::class, 'destroy'])->name('productos.destroy')->middleware(['auth', 'role:Admin']);


Route::get('ventas', [App\Http\Controllers\VentasController::class, 'index'])->name('indexVentas')->middleware(['auth', 'role:Admin']);
Route::get('ventas/create', [App\Http\Controllers\VentasController::class, 'create'])->name('ventas.create')->middleware(['auth', 'role:Admin']);
Route::post('ventas', [App\Http\Controllers\VentasController::class, 'store'])->name('ventas.store')->middleware(['auth', 'role:Admin']);
Route::get('ventas/{id}/edit', [App\Http\Controllers\VentasController::class, 'edit'])->name('ventas.edit')->middleware(['auth', 'role:Admin']);
Route::put('ventas/{id}', [App\Http\Controllers\VentasController::class, 'update'])->name('ventas.update')->middleware(['auth', 'role:Admin']);
Route::get('ventas/{id}', [App\Http\Controllers\VentasController::class, 'show'])->name('ventas.show')->middleware(['auth', 'role:Admin|Proveedor']);
Route::put('ventas/delete/{id}', [App\Http\Controllers\VentasController::class, 'destroy'])->name('ventas.destroy')->middleware(['auth', 'role:Admin']);

