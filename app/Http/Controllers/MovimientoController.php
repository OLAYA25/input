<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\CuentasMovimiento;
use App\Models\Movimientosdatallado;
use App\Models\Bodegasproducto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
/**
 * Class MovimientoController
 * @package App\Http\Controllers
 */
class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
        $movimientos = Movimiento::paginate();

        return view('movimiento.index', compact('movimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $movimientos->perPage());
    }

    public function generarPDF(Request $request, $id)
    {
        $size = $request->input('size', 'carta');
        $movimiento = Movimiento::with(['movimientosdatallados.productos'])->findOrFail($id);

        if ($size === 'tirilla') {
            return view('movimientos.facturas', compact('movimiento', 'size'));
        }

        switch($size) {
            case 'oficio':
                $paper = 'legal';
                break;
            case 'media_carta':
                $paper = [0, 0, 396, 612];
                break;
            case 'carta':
            default:
                $paper = 'letter';
                break;
        }

        $pdf = PDF::loadView('movimientos.facturas', compact('movimiento', 'size'))
                  ->setPaper($paper, 'portrait');

        return $pdf->stream('movimiento_' . $id . '.pdf');
    }

    
    
    public function CrearMovimientosDetalle(Request $request)
        {
         
            // Crea el movimiento
            $movimiento = Movimiento::create($request->all());

            // Guarda el movimiento y devuelve una respuesta JSON
            return response()->json($movimiento);
        }
        
        public function pendientes($idCaja,$movimientos,$users){
            $movimiento=null;
            if ($movimientos ==1) {
                $movimiento = Movimiento::with('usuariobasico')->where('estado','Pendiente')->where('Caja_id',$idCaja)->get();
            }if ($movimientos == 2) {
                $movimiento = Movimiento::with('usuariobasico')->where('estado','Cierre')->where('Caja_id',$idCaja)->get();
            }if ($movimientos == 3) {
                $movimiento = Movimiento::with('usuariobasico')->where('estadoMovimientosCaja','EnEjecucion')->where('Caja_id',$idCaja)->where('users_id',$users)->get();
            }if ($movimientos == 4) {
                $movimiento = Movimiento::with('usuariobasico')->where('estadoMovimientosCaja','EnEjecucion')->where('Caja_id',$idCaja)->get();
            }
           
            // Devuelve los movimientos con los datos del cliente en formato JSON
            return response()->json($movimiento);
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearPendientes( $users ,$caja ,$TipoMovimiento)
    {
        

        return view('movimientos.create', compact('TipoMovimiento','users','caja'));

    }

    public function create()
    {
        $movimiento = new Movimiento();
        return view('movimiento.create', compact('movimiento'));
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Movimiento::$rules);

        $movimiento = Movimiento::create($request->all());

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = Movimiento::find($id);

        return view('movimiento.show', compact('movimiento'));
    }

    public function obtener($id)
    {
        $movimiento = Movimiento::with(['movimientosdatallados.productos'])->findOrFail($id);
        return response()->json($movimiento);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimiento = Movimiento::find($id);

        return view('movimiento.edit', compact('movimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        $request->validate(Movimiento::$rules);
        
        if ($movimiento->estado === 'Finalizado') {
            
            $tiposMovimiento = [
                'Descuento', 'Agregar', 'Alerta', 'Activo', 'Pasivo', 'Patrimonio', 'Ingresos', 'Gastos', 'CostoVenta', 'CostoPO', 'Deudoras', 'Acreedoras'
            ];

            $tipoMovimiento = null; // Inicializar variable $tipoMovimiento

            foreach ($tiposMovimiento as $tipo) {
                if ($movimiento->movimientosbasico->$tipo === 1) {
                    $tipoMovimiento = $tipo; // Asignar el tipo de movimiento a $tipoMovimiento
                    if ($tipo == 'Agregar' || $tipo == 'Descuento') {
                        foreach ($movimiento->movimientosdatallados as $detalle) {
                            $bodegaId = $movimiento->DestinoBodega_id;
                            $totalMovimiento = $detalle->Cantidad_Ingreso;
                            $this->updateBodegaProducto($detalle, $bodegaId, $totalMovimiento);
                        }
                    }
                }
            }
            
             // Verificar si $tipoMovimiento ha sido asignado
                $valorTotal = $movimiento->Total;
                
                $cuentaMovimiento = new CuentasMovimiento();
                $cuentaMovimiento->Movimiento_id = $movimiento->id;
                $cuentaMovimiento->Cuenta = $movimiento->Cuenta_Entrada;
                $cuentaMovimiento->CuentaEgreso = $movimiento->Cuenta_Salida;
                $cuentaMovimiento->TipoMovimiento = $movimiento->TipoMovimiento;
                $cuentaMovimiento->DescripcionMovimiento =   $movimiento->movimientosbasico->Descripcion;
                $cuentaMovimiento->Valor = $valorTotal;
                $cuentaMovimiento->Codigo_id = $movimiento->movimientosbasico->CodigoPredetermidao;
                $cuentaMovimiento->save(); // Cambiado de $cuentaMovimiento = CuentasMovimiento::create($cuentaMovimiento); a $cuentaMovimiento->save();
            
        }
        
        $movimiento->update($request->all());
        return response()->json($movimiento);
    }

private function updateBodegaProducto($detalle, $bodegaId, $totalMovimiento)
{
    // Buscar si existe un registro para la bodega y el producto
    $bodegaProducto = Bodegasproducto::where('Bodega', $bodegaId)
                                      ->where('Producto', $detalle->Producto_id)
                                      ->first();

    if ($bodegaProducto) {
        // Si el producto ya existe en la bodega, actualiza la cantidad
        $bodegaProducto->Cantidad += $totalMovimiento;
    } else {
        // Si no existe, crea un nuevo registro con la cantidad
        $bodegaProducto = new Bodegasproducto([
            'Producto' => $detalle->Producto_id,
            'Cantidad' => $totalMovimiento,
            'Bodega'   => $bodegaId,
            'estado'   => 'Activo',
        ]);
    }

    // Guardar los cambios en la base de datos
    $bodegaProducto->save();
    return $bodegaProducto;
}


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movimiento = Movimiento::find($id)->delete();

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento deleted successfully');
    }
}
