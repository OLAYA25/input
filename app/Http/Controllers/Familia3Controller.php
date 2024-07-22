<?php

namespace App\Http\Controllers;

use App\Models\Familia3;
use Illuminate\Http\Request;

/**
 * Class Familia3Controller
 * @package App\Http\Controllers
 */
class Familia3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familia3s = Familia3::paginate();

        return view('familia3.index', compact('familia3s'))
            ->with('i', (request()->input('page', 1) - 1) * $familia3s->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia3 = new Familia3();
        return view('familia3.create', compact('familia3'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Familia3::$rules);

        $familia3 = Familia3::create($request->all());

        return redirect()->route('familia3s.index')
            ->with('success', 'Familia3 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familia3 = Familia3::find($id);

        return view('familia3.show', compact('familia3'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia3 = Familia3::find($id);

        return view('familia3.edit', compact('familia3'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Familia3 $familia3
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia3 $familia3)
    {
        request()->validate(Familia3::$rules);

        $familia3->update($request->all());

        return redirect()->route('familia3s.index')
            ->with('success', 'Familia3 updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $familia3 = Familia3::find($id)->delete();

        return redirect()->route('familia3s.index')
            ->with('success', 'Familia3 deleted successfully');
    }
}
