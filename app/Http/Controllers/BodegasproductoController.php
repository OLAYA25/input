<?php

namespace App\Http\Controllers;

use App\Models\Bodegasproducto;
use Illuminate\Http\Request;

/**
 * Class BodegasproductoController
 * @package App\Http\Controllers
 */
class BodegasproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodegasproductos = Bodegasproducto::paginate();

        return view('bodegasproducto.index', compact('bodegasproductos'))
            ->with('i', (request()->input('page', 1) - 1) * $bodegasproductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodegasproducto = new Bodegasproducto();
        return view('bodegasproducto.create', compact('bodegasproducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bodegasproducto::$rules);

        $bodegasproducto = Bodegasproducto::create($request->all());

        return redirect()->route('bodegasproductos.index')
            ->with('success', 'Bodegasproducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bodegasproducto = Bodegasproducto::find($id);

        return view('bodegasproducto.show', compact('bodegasproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bodegasproducto = Bodegasproducto::find($id);

        return view('bodegasproducto.edit', compact('bodegasproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bodegasproducto $bodegasproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bodegasproducto $bodegasproducto)
    {
        request()->validate(Bodegasproducto::$rules);

        $bodegasproducto->update($request->all());

        return redirect()->route('bodegasproductos.index')
            ->with('success', 'Bodegasproducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bodegasproducto = Bodegasproducto::find($id)->delete();

        return redirect()->route('bodegasproductos.index')
            ->with('success', 'Bodegasproducto deleted successfully');
    }
}
