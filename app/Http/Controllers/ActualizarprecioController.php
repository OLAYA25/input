<?php

namespace App\Http\Controllers;

use App\Models\Actualizarprecio;
use Illuminate\Http\Request;

/**
 * Class ActualizarprecioController
 * @package App\Http\Controllers
 */
class ActualizarprecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actualizarprecios = Actualizarprecio::paginate();

        return view('actualizarprecio.index', compact('actualizarprecios'))
            ->with('i', (request()->input('page', 1) - 1) * $actualizarprecios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actualizarprecio = new Actualizarprecio();
        return view('actualizarprecio.create', compact('actualizarprecio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Actualizarprecio::$rules);

        // Actualizar todos los registros existentes con el mismo Producto_id a Principal = false
        Actualizarprecio::where('Producto_id', $request->Producto_id)
            ->update(['Principal' => false]);

        // Crear el nuevo registro con Principal = true
        $nuevoActualizarprecio = new Actualizarprecio($request->all());
        $nuevoActualizarprecio->Principal = true;
        $nuevoActualizarprecio->save();

        return $nuevoActualizarprecio;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actualizarprecio = Actualizarprecio::find($id);

        return view('actualizarprecio.show', compact('actualizarprecio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actualizarprecio = Actualizarprecio::find($id);

        return view('actualizarprecio.edit', compact('actualizarprecio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Actualizarprecio $actualizarprecio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actualizarprecio $actualizarprecio)
    {
        request()->validate(Actualizarprecio::$rules);

        $actualizarprecio->update($request->all());

        return redirect()->route('actualizarprecios.index')
            ->with('success', 'Actualizarprecio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $actualizarprecio = Actualizarprecio::find($id)->delete();

        return redirect()->route('actualizarprecios.index')
            ->with('success', 'Actualizarprecio deleted successfully');
    }
}
