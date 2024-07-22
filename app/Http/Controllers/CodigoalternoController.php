<?php

namespace App\Http\Controllers;

use App\Models\Codigoalterno;
use Illuminate\Http\Request;

/**
 * Class CodigoalternoController
 * @package App\Http\Controllers
 */
class CodigoalternoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codigoalternos = Codigoalterno::paginate();

        return view('codigoalterno.index', compact('codigoalternos'))
            ->with('i', (request()->input('page', 1) - 1) * $codigoalternos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $codigoalterno = new Codigoalterno();
        return view('codigoalterno.create', compact('codigoalterno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Codigoalterno::$rules);

        $codigoalterno = Codigoalterno::create($request->all());

        return $codigoalterno;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $codigoalterno = Codigoalterno::find($id);

        return view('codigoalterno.show', compact('codigoalterno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $codigoalterno = Codigoalterno::find($id);

        return view('codigoalterno.edit', compact('codigoalterno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Codigoalterno $codigoalterno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Codigoalterno $codigoalterno)
    {
        request()->validate(Codigoalterno::$rules);

        $codigoalterno->update($request->all());

        return redirect()->route('codigoalternos.index')
            ->with('success', 'Codigoalterno updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $codigoalterno = Codigoalterno::find($id)->delete();

        return redirect()->route('codigoalternos.index')
            ->with('success', 'Codigoalterno deleted successfully');
    }
}
