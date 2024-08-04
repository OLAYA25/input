<?php

namespace App\Http\Controllers;

use App\Models\Movimientosdatallado;
use Illuminate\Http\Request;

/**
 * Class MovimientosdatalladoController
 * @package App\Http\Controllers
 */
class MovimientosdatalladoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientosdatallados = Movimientosdatallado::paginate();

        return view('movimientosdatallado.index', compact('movimientosdatallados'))
            ->with('i', (request()->input('page', 1) - 1) * $movimientosdatallados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimientosdatallado = new Movimientosdatallado();
        return view('movimientosdatallado.create', compact('movimientosdatallado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Movimientosdatallado::$rules);

        $movimientosdatallado = Movimientosdatallado::create($request->all());

        return response()->json($movimientosdatallado);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimientosdatallado = Movimientosdatallado::find($id);

        return view('movimientosdatallado.show', compact('movimientosdatallado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimientosdatallado = Movimientosdatallado::find($id);

        return view('movimientosdatallado.edit', compact('movimientosdatallado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movimientosdatallado $movimientosdatallado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimientosdatallado $movimientosdatallado)
    {
        request()->validate(Movimientosdatallado::$rules);

        $movimientosdatallado->update($request->all());

        return redirect()->route('movimientosdatallados.index')
            ->with('success', 'Movimientosdatallado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movimientosdatallado = Movimientosdatallado::find($id)->delete();

        return redirect()->route('movimientosdatallados.index')
            ->with('success', 'Movimientosdatallado deleted successfully');
    }
}
