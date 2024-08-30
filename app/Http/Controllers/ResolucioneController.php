<?php

namespace App\Http\Controllers;

use App\Models\Resolucione;
use Illuminate\Http\Request;

/**
 * Class ResolucioneController
 * @package App\Http\Controllers
 */
class ResolucioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resoluciones = Resolucione::paginate();

        return view('resolucione.index', compact('resoluciones'))
            ->with('i', (request()->input('page', 1) - 1) * $resoluciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resolucione = new Resolucione();
        return view('resolucione.create', compact('resolucione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Resolucione::$rules);

        // Crear la nueva resolución
        $resolucione = Resolucione::create($request->all());

        // Buscar todas las resoluciones con el mismo Movimientos_id y cambiar su estado a Inactivo, excepto la recién creada
        Resolucione::where('Movimientos_id', $resolucione->Movimientos_id)
            ->where('id', '!=', $resolucione->id)
            ->update(['estado' => 'Inactivo']);

        return redirect()->back()
            ->with('success', 'Resolución creada exitosamente y resoluciones anteriores desactivadas.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resolucione = Resolucione::find($id);

        return view('resolucione.show', compact('resolucione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resolucione = Resolucione::find($id);

        return view('resolucione.edit', compact('resolucione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Resolucione $resolucione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resolucione $resolucione)
    {
        request()->validate(Resolucione::$rules);

        $resolucione->update($request->all());

        // Si el estado se está cambiando a Activo
        if ($resolucione->estado == 'Activo') {
            // Buscar todas las resoluciones con el mismo Movimientos_id y cambiar su estado a Inactivo, excepto la que se está actualizando
            Resolucione::where('Movimientos_id', $resolucione->Movimientos_id)
                ->where('id', '!=', $resolucione->id)
                ->update(['estado' => 'Inactivo']);
        }

        return redirect()->route('movimientosbasicos.edit', $resolucione->Movimientos_id)
            ->with('success', 'Resolución actualizada exitosamente y otras resoluciones desactivadas si corresponde.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $resolucione = Resolucione::find($id)->delete();

        return redirect()->route('resoluciones.index')
            ->with('success', 'Resolucione deleted successfully');
    }
}
