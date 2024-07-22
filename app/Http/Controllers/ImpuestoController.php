<?php

namespace App\Http\Controllers;

use App\Models\Impuesto;
use Illuminate\Http\Request;

/**
 * Class ImpuestoController
 * @package App\Http\Controllers
 */
class ImpuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impuestos = Impuesto::paginate();

        return view('impuesto.index', compact('impuestos'))
            ->with('i', (request()->input('page', 1) - 1) * $impuestos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impuesto = new Impuesto();
        return view('impuesto.create', compact('impuesto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Impuesto::$rules);

        $impuesto = Impuesto::create($request->all());

        return redirect()->route('impuestos.index')
            ->with('success', 'Impuesto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $impuesto = Impuesto::find($id);

        return $impuesto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $impuesto = Impuesto::find($id);

        return view('impuesto.edit', compact('impuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Impuesto $impuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Impuesto $impuesto)
    {
        request()->validate(Impuesto::$rules);

        $impuesto->update($request->all());

        return redirect()->route('impuestos.index')
            ->with('success', 'Impuesto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $impuesto = Impuesto::find($id)->delete();

        return redirect()->route('impuestos.index')
            ->with('success', 'Impuesto deleted successfully');
    }
}
