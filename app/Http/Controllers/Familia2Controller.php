<?php

namespace App\Http\Controllers;

use App\Models\Familia2;
use Illuminate\Http\Request;

/**
 * Class Familia2Controller
 * @package App\Http\Controllers
 */
class Familia2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $familia2s = Familia2::paginate();

        return view('familia2.index', compact('familia2s'))
            ->with('i', (request()->input('page', 1) - 1) * $familia2s->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $familia2 = new Familia2();
        return view('familia2.create', compact('familia2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Familia2::$rules);

        $familia2 = Familia2::create($request->all());

        return redirect()->route('familia2s.index')
            ->with('success', 'Familia2 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familia2 = Familia2::find($id);

        return view('familia2.show', compact('familia2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familia2 = Familia2::find($id);

        return view('familia2.edit', compact('familia2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Familia2 $familia2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Familia2 $familia2)
    {
        request()->validate(Familia2::$rules);

        $familia2->update($request->all());

        return redirect()->route('familia2s.index')
            ->with('success', 'Familia2 updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $familia2 = Familia2::find($id)->delete();

        return redirect()->route('familia2s.index')
            ->with('success', 'Familia2 deleted successfully');
    }
}
