<?php

namespace App\Http\Controllers;

use App\Models\Proveedoreusuario;
use Illuminate\Http\Request;

/**
 * Class ProveedoreusuarioController
 * @package App\Http\Controllers
 */
class ProveedoreusuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedoreusuarios = Proveedoreusuario::paginate();

        return view('proveedoreusuario.index', compact('proveedoreusuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedoreusuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedoreusuario = new Proveedoreusuario();
        return view('proveedoreusuario.create', compact('proveedoreusuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedoreusuario::$rules);

        $proveedoreusuario = Proveedoreusuario::create($request->all());

        return $proveedoreusuario ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedoreusuario = Proveedoreusuario::find($id);

        return view('proveedoreusuario.show', compact('proveedoreusuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedoreusuario = Proveedoreusuario::find($id);

        return view('proveedoreusuario.edit', compact('proveedoreusuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedoreusuario $proveedoreusuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedoreusuario $proveedoreusuario)
    {
        request()->validate(Proveedoreusuario::$rules);

        $proveedoreusuario->update($request->all());

        return redirect()->route('proveedoreusuarios.index')
            ->with('success', 'Proveedoreusuario updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedoreusuario = Proveedoreusuario::find($id)->delete();

        return redirect()->route('proveedoreusuarios.index')
            ->with('success', 'Proveedoreusuario deleted successfully');
    }
}
