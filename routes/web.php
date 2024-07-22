<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('movimientos/index', function () {
    return view('movimientos.app');
});
Route::get('movimientos/index/{caja}/{movimiento}', function ($caja,$movimiento) {
    return view('movimientos.create')->with(compact('caja','movimiento'));
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('codigoalternos',App\Http\Controllers\CodigoalternoController::class);
Route::resource('codigos',App\Http\Controllers\CodigoController::class);
Route::resource('bancos',App\Http\Controllers\BancoController::class);
Route::resource('parametizarcajas',App\Http\Controllers\ParametizarcajaController::class);
Route::resource('cajas',App\Http\Controllers\CajaController::class);
Route::resource('cuentas',App\Http\Controllers\CuentaController::class);
Route::resource('usuariobasicos',App\Http\Controllers\UsuariobasicoController::class);
Route::resource('proveedores',App\Http\Controllers\ProveedoreController::class);
Route::resource('empresas',App\Http\Controllers\EmpresaController::class);
Route::resource('bodegas',App\Http\Controllers\BodegaController::class);
Route::resource('movimientosbasicos',App\Http\Controllers\MovimientosbasicoController::class);
Route::resource('proveedoreusuarios',App\Http\Controllers\ProveedoreusuarioController::class);
Route::resource('productos',App\Http\Controllers\ProductoController::class);
Route::resource('impuestos',App\Http\Controllers\ImpuestoController::class);
Route::resource('actualizarprecios',App\Http\Controllers\ActualizarprecioController::class);
