<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all();
        return view('funcionarios.index', compact('funcionarios'));
    }

    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cedula'   => 'required|string|max:20|unique:funcionarios,cedula',
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cargo'    => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'estatus'  => 'required|string|max:50',
        ]);

        Funcionario::create($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario registrado correctamente.');
    }

    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'cedula'   => 'required|string|max:20|unique:funcionarios,cedula,' . $funcionario->id,
            'nombre'   => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'cargo'    => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'estatus'  => 'required|string|max:50',
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario actualizado correctamente.');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionario eliminado correctamente.');
    }
}