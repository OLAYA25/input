<?php

namespace App\Http\Controllers;

use App\Models\ImpuestosProducto;
use Illuminate\Http\Request;

/**
 * Class ImpuestosProductoController
 * @package App\Http\Controllers
 */
class ImpuestosProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impuestosProductos = ImpuestosProducto::paginate();

        return view('impuestos-producto.index', compact('impuestosProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $impuestosProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impuestosProducto = new ImpuestosProducto();
        return view('impuestos-producto.create', compact('impuestosProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ImpuestosProducto::$rules);

        $impuestosProducto = ImpuestosProducto::create($request->all());

        return $impuestosProducto;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $impuestosProducto = ImpuestosProducto::find($id);

        return view('impuestos-producto.show', compact('impuestosProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $impuestosProducto = ImpuestosProducto::find($id);

        return view('impuestos-producto.edit', compact('impuestosProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ImpuestosProducto $impuestosProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImpuestosProducto $impuestosProducto)
    {
        request()->validate(ImpuestosProducto::$rules);

        $impuestosProducto->update($request->all());

        return redirect()->route('impuestos-productos.index')
            ->with('success', 'ImpuestosProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $impuestosProducto = ImpuestosProducto::find($id)->delete();

        return redirect()->route('impuestos-productos.index')
            ->with('success', 'ImpuestosProducto deleted successfully');
    }
}
