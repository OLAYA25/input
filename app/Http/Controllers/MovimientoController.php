<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Illuminate\Http\Request;

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
        request()->validate(Movimiento::$rules);

        $movimiento->update($request->all());

        return response()->json($movimiento);
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
