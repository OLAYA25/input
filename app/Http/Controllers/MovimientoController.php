<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
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
        // Determinar el tamaño de papel según la opción seleccionada
        $size = $request->input('size', 'carta'); // 'carta' es el valor por defecto

        switch($size) {
            case 'oficio':
                $paper = 'legal'; // Tamaño oficio (216mm x 356mm)
                break;
            case 'tirilla':
                $paper = [0, 0, 226.772, 841.89]; // Tamaño tirilla (80mm x 297mm) en puntos
                break;
            case 'media_carta':
                $paper = [0, 0, 396, 612]; // Tamaño media carta (5.5" x 8.5")
                break;
            case 'carta':
            default:
                $paper = 'letter'; // Tamaño carta (216mm x 279mm)
                break;
        }

        $movimiento = Movimiento::with(['movimientosdatallados.productos'])->findOrFail($id);
        
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
                $movimiento = Movimiento::where('estado','Pendiente')->where('Caja_id',$idCaja)->get();
            }if ($movimientos == 2) {
                $movimiento = Movimiento::where('estado','Cierre')->where('Caja_id',$idCaja)->get();
            }if ($movimientos == 3) {
                $movimiento = Movimiento::where('estadoMovimientosCaja','EnEjecucion')->where('Caja_id',$idCaja)->where('users_id',$users)->get();
            }if ($movimientos == 4) {
                $movimiento = Movimiento::where('estadoMovimientosCaja','EnEjecucion')->where('Caja_id',$idCaja)->get();
            }
           
            // Guarda el movimiento y devuelve una respuesta JSON
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
