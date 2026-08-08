<?php

namespace App\Http\Controllers;

use App\Models\TipoIncidente;
use Illuminate\Http\Request;

class TipoIncidenteController extends Controller
{
    // Mostrar listado de tipos de incidentes
    public function index()
    {
        $tipos = TipoIncidente::latest()->get();
        return view('tipos_incidentes.index', compact('tipos'));
    }

    // Formulario para crear nuevo registro
    public function create()
    {
        return view('tipos_incidentes.create');
    }

    // Guardar nuevo registro en BD
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:80|unique:tipos_incidentes,nombre',
            'descripcion' => 'nullable|string',
            'nivel_riesgo' => 'required|in:Bajo,Medio,Alto,Crítico',
        ]);

        TipoIncidente::create($request->all());

        return redirect()->route('tipos-incidentes.index')
            ->with('success', 'Tipo de incidente registrado con éxito.');
    }

    // Formulario para editar
    public function edit(TipoIncidente $tipos_incidente)
    {
        return view('tipos_incidentes.edit', ['tipo' => $tipos_incidente]);
    }

    // Actualizar registro en BD
    public function update(Request $request, TipoIncidente $tipos_incidente)
    {
        $request->validate([
            'nombre' => 'required|string|max:80|unique:tipos_incidentes,nombre,' . $tipos_incidente->id,
            'descripcion' => 'nullable|string',
            'nivel_riesgo' => 'required|in:Bajo,Medio,Alto,Crítico',
        ]);

        $tipos_incidente->update($request->all());

        return redirect()->route('tipos-incidentes.index')
            ->with('success', 'Tipo de incidente actualizado correctamente.');
    }

    // Eliminar registro
    public function destroy(TipoIncidente $tipos_incidente)
    {
        $tipos_incidente->delete();

        return redirect()->route('tipos-incidentes.index')
            ->with('success', 'Tipo de incidente eliminado.');
    }
}