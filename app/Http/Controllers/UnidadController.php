<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index()
    {
        $unidades = Unidad::all();
        return view('unidades.index', compact('unidades'));
    }

    public function create()
    {
        return view('unidades.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'codigo'  => 'required|string|max:50|unique:unidads,codigo',
        'tipo'    => 'required|string|max:100',
        'modelo'  => 'required|string|max:100',
        'estatus' => 'required|string|max:50',
    ]);

    Unidad::create($request->all());

    return redirect()->route('unidades.index')->with('success', 'Unidad registrada correctamente.');
}

public function update(Request $request, Unidad $unidad)
{
    $request->validate([
        'codigo'  => 'required|string|max:50|unique:unidads,codigo,' . $unidad->id,
        'tipo'    => 'required|string|max:100',
        'modelo'  => 'required|string|max:100',
        'estatus' => 'required|string|max:50',
    ]);

    $unidad->update($request->all());

    return redirect()->route('unidades.index')->with('success', 'Unidad actualizada correctamente.');
}

    public function destroy(Unidad $unidad)
    {
        $unidad->delete();

        return redirect()->route('unidades.index')->with('success', 'Unidad eliminada correctamente.');
    }

    public function edit(Unidad $unidad)
{
    return view('unidades.edit', compact('unidad'));
}
}