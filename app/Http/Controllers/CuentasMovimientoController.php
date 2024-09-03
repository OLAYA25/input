<?php

namespace App\Http\Controllers;

use App\Models\CuentasMovimiento;
use Illuminate\Http\Request;

/**
 * Class CuentasMovimientoController
 * @package App\Http\Controllers
 */
class CuentasMovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentasMovimientos = CuentasMovimiento::paginate();

        return view('cuentas-movimiento.index', compact('cuentasMovimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $cuentasMovimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentasMovimiento = new CuentasMovimiento();
        return view('cuentas-movimiento.create', compact('cuentasMovimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CuentasMovimiento::$rules);

        $cuentasMovimiento = CuentasMovimiento::create($request->all());

        return redirect()->route('cuentas-movimientos.index')
            ->with('success', 'CuentasMovimiento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuentasMovimiento = CuentasMovimiento::find($id);

        return view('cuentas-movimiento.show', compact('cuentasMovimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuentasMovimiento = CuentasMovimiento::find($id);

        return view('cuentas-movimiento.edit', compact('cuentasMovimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CuentasMovimiento $cuentasMovimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CuentasMovimiento $cuentasMovimiento)
    {
        request()->validate(CuentasMovimiento::$rules);

        $cuentasMovimiento->update($request->all());

        return redirect()->route('cuentas-movimientos.index')
            ->with('success', 'CuentasMovimiento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $cuentasMovimiento = CuentasMovimiento::find($id)->delete();

        return redirect()->route('cuentas-movimientos.index')
            ->with('success', 'CuentasMovimiento deleted successfully');
    }
}
