<?php

namespace App\Http\Controllers;

use App\Models\Usuariobasico;

use Illuminate\Http\Request;

/**
 * Class UsuariobasicoController
 * @package App\Http\Controllers
 */
class UsuariobasicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuariobasicos = Usuariobasico::paginate();

        return view('usuariobasico.index', compact('usuariobasicos'))
            ->with('i', (request()->input('page', 1) - 1) * $usuariobasicos->perPage());
    }

    public function buscar(Request $request)
    {
        $termino = $request->input('term');
        $clientes = Usuariobasico::where('Nombre1', 'LIKE', "%$termino%")
                           ->orWhere('NDocumento', 'LIKE', "%$termino%")
                           ->get();
        return response()->json($clientes);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuariobasico = new Usuariobasico();
        return view('usuariobasico.create', compact('usuariobasico'));
    }
    public function stores(Request $request)
    {
        request()->validate(Usuariobasico::$rules);

        $usuariobasico = Usuariobasico::create($request->all());

        return response()->json($usuariobasico);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Usuariobasico::$rules);

        $usuariobasico = Usuariobasico::create($request->all());

        return redirect()->route('usuariobasicos.edit', $usuariobasico->id)
            ->with('success', 'Usuario Creado Sactifactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuariobasico = Usuariobasico::find($id);

        return view('usuariobasico.show', compact('usuariobasico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuariobasico = Usuariobasico::find($id);

        return view('usuariobasico.edit', compact('usuariobasico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Usuariobasico $usuariobasico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuariobasico $usuariobasico)
    {
        request()->validate(Usuariobasico::$rules);

        $usuariobasico->update($request->all());

        return back()->with('success', 'Usuario actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $usuariobasico = Usuariobasico::find($id)->delete();

        return redirect()->route('usuariobasicos.index')
            ->with('success', 'Usuariobasico deleted successfully');
    }
}
