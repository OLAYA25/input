<?php

namespace App\Http\Controllers;

use App\Models\Parametizarcaja;
use Illuminate\Http\Request;

/**
 * Class ParametizarcajaController
 * @package App\Http\Controllers
 */
class ParametizarcajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametizarcajas = Parametizarcaja::paginate();

        return view('parametizarcaja.index', compact('parametizarcajas'))
            ->with('i', (request()->input('page', 1) - 1) * $parametizarcajas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parametizarcaja = new Parametizarcaja();
        return view('parametizarcaja.create', compact('parametizarcaja'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Parametizarcaja::$rules);

        $parametizarcaja = Parametizarcaja::create($request->all());

        return redirect()->back()->with('success', 'Parametizarcaja created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parametizarcaja = Parametizarcaja::find($id);

        return view('parametizarcaja.show', compact('parametizarcaja'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parametizarcaja = Parametizarcaja::find($id);

        return view('parametizarcaja.edit', compact('parametizarcaja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Parametizarcaja $parametizarcaja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametizarcaja $parametizarcaja)
    {
        request()->validate(Parametizarcaja::$rules);

        $parametizarcaja->update($request->all());

        return redirect()->back()->with('success', 'Parametizarcaja created successfully.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $parametizarcaja = Parametizarcaja::find($id)->delete();

        return redirect()->route('parametizarcajas.index')
            ->with('success', 'Parametizarcaja deleted successfully');
    }
}
