<?php

namespace App\Http\Controllers;

use App\Models\Proveedore;
use Illuminate\Http\Request;

/**
 * Class ProveedoreController
 * @package App\Http\Controllers
 */
class ProveedoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedore::paginate();

        return view('proveedore.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedore = new Proveedore();
        return view('proveedore.create', compact('proveedore'));
    }

    public function BuscarProveedor(Request $request)
    {
        $term = $request->input('term');
        
        $query = Proveedore::query();
    
        if (strlen($term) > 0) {
            if ($term[0] === '@') {
                // Buscar por nombre de producto
                $productName = substr($term, 1);
                $query->where('RazonSocial', 'LIKE', "%$productName%");
            } elseif ($term[0] === '#') {
                // Buscar por ID
                $id = substr($term, 1);
                $query->where('NumeroDocumento', $id);
            } else {
                // Búsqueda general en múltiples campos
                $query->where(function ($q) use ($term) {
                    $q->where('RazonSocial', 'LIKE', "%$term%")
                      ->orWhere('NumeroDocumento', 'LIKE', "%$term%");
                    
                });
            }
        }
    
        $productos = $query->get();
        
        return response()->json($productos);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedore::$rules);

        $proveedore = Proveedore::create($request->all());

        return $proveedore;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedore::find($id);

        return view('proveedore.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedore $proveedore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedore $proveedore)
    {
        request()->validate(Proveedore::$rules);

        $proveedore->update($request->all());

        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedore = Proveedore::find($id)->delete();

        return back()->with('success', 'Proveedor Eliminado');
    }
}
