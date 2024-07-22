<?php

namespace App\Http\Controllers;

use App\Models\Familia1;
use Illuminate\Http\Request;

/**
 * Class Familia1Controller
 * @package App\Http\Controllers
 */
class Familia1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familia1s = Familia1::paginate();

        return view('familia1.index', compact('familia1s'))
            ->with('i', (request()->input('page', 1) - 1) * $familia1s->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia1 = new Familia1();
        return view('familia1.create', compact('familia1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Familia1::$rules);

        $familia1 = Familia1::create($request->all());

        return redirect()->route('familia1s.index')
            ->with('success', 'Familia1 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familia1 = Familia1::find($id);

        return view('familia1.show', compact('familia1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia1 = Familia1::find($id);

        return view('familia1.edit', compact('familia1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Familia1 $familia1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia1 $familia1)
    {
        request()->validate(Familia1::$rules);

        $familia1->update($request->all());

        return redirect()->route('familia1s.index')
            ->with('success', 'Familia1 updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $familia1 = Familia1::find($id)->delete();

        return redirect()->route('familia1s.index')
            ->with('success', 'Familia1 deleted successfully');
    }
}
