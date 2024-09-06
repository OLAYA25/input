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

Route::get('/movimientos/{id}/pdf', [App\Http\Controllers\MovimientoController::class, 'generarPDF'])->name('movimientos.pdf');
Route::get('/proveedores/BuscarProveedor', [App\Http\Controllers\ProveedoreController::class, 'BuscarProveedor'])->name('proveedor.BuscarProveedor');
Route::get('/buscar-cliente', [App\Http\Controllers\UsuariobasicoController::class, 'buscar'])->name('cliente.buscar');
Route::get('/buscar-producto', [App\Http\Controllers\ProductoController::class, 'buscar'])->name('producto.buscar');
Route::get('/buscar-cuenta', [App\Http\Controllers\CuentaController::class, 'buscar'])->name('cuenta.buscar');
Route::post('usuarios/crears', [App\Http\Controllers\UsuariobasicoController::class, 'stores'])->name('usuariobasicos.stores');
Route::get('/buscar-movimientos-pendiente/{caja}/{movimiento}/{users}', [App\Http\Controllers\MovimientoController::class, 'pendientes'])->name('movimientos.pendientes');

Route::PATCH('/updatemovimientosbasicos/{id}', [App\Http\Controllers\MovimientosbasicoController::class, 'updates'])->name('movimientosbasicos.updates');

Route::post('MovimientosDetallados/crearPendientes', [App\Http\Controllers\MovimientoController::class, 'CrearMovimientosDetalle'])->name('movimientos.CrearMovimientosDetalle');
// En routes/web.php o routes/api.php
Route::get('/movimientos/{id}', [App\Http\Controllers\MovimientoController::class, 'obtener'])->name('movimientos.obtener');
Route::get('/movimientosdatallados/mostrars/{id}', [App\Http\Controllers\MovimientosdatalladoController::class, 'mostrars'])->name('movimientos.mostrars');
Route::get('/codigos/mostrar/{id}', [App\Http\Controllers\CodigoController::class, 'mostarcodigos'])->name('codigos.mostarcodigos');


Route::get('movimientos/crearPendientes/{users}/{caja}/{TipoMovimiento}', [App\Http\Controllers\MovimientoController::class, 'crearPendientes'])->name('movimientos.crearPendientes');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('resoluciones',App\Http\Controllers\ResolucioneController::class);
Route::resource('familia3s',App\Http\Controllers\Familia3Controller::class);
Route::resource('familia2s',App\Http\Controllers\Familia2Controller::class);
Route::resource('familia1s',App\Http\Controllers\Familia1Controller::class);
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
Route::resource('movimientos',App\Http\Controllers\MovimientoController::class);
Route::resource('movimientosbasicos',App\Http\Controllers\MovimientosbasicoController::class);
Route::resource('proveedoreusuarios',App\Http\Controllers\ProveedoreusuarioController::class);
Route::resource('productos',App\Http\Controllers\ProductoController::class);
Route::resource('impuestos',App\Http\Controllers\ImpuestoController::class);
Route::resource('movimientosdatallados',App\Http\Controllers\MovimientosdatalladoController::class);
Route::resource('actualizarprecios',App\Http\Controllers\ActualizarprecioController::class);
Route::resource('impuestos-productos',App\Http\Controllers\ImpuestosProductoController::class);