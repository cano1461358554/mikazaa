<?php

namespace App\Http\Controllers;

use App\Models\Administrativo;
use Illuminate\Http\Request;

class AdministrativoController extends Controller
{
    public function index()
    {
        $administrativos = Administrativo::paginate();

        return view('administrativo.index', compact('administrativos'))
            ->with('i', (request()->input('page', 1) - 1) * $administrativos->perPage());
    }

    public function create()
    {
        $administrativo = new Administrativo();
        return view('administrativo.create', compact('administrativo'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_administrativo' => 'required|unique:administrativos,id_administrativo',
            'departamento' => 'required|string|max:255',
        ]);

        Administrativo::create($validated);

        return redirect()->route('administrativos.index')
            ->with('success', 'Administrativo creado correctamente.');
    }

    public function show($id_administrativo)
    {
        $administrativo = Administrativo::where('id_administrativo', $id_administrativo)->firstOrFail();
        return view('administrativo.show', compact('administrativo'));
    }

    public function edit($id_administrativo)
    {
        $administrativo = Administrativo::where('id_administrativo', $id_administrativo)->firstOrFail();
        return view('administrativo.edit', compact('administrativo'));
    }

    public function update(Request $request, $id_administrativo)
    {
        $validated = $request->validate([
            'departamento' => 'required|string|max:255',
        ]);

        $administrativo = Administrativo::where('id_administrativo', $id_administrativo)->firstOrFail();
        $administrativo->update($validated);

        return redirect()->route('administrativos.index')
            ->with('success', 'Administrativo actualizado correctamente.');
    }

    public function destroy($id_administrativo)
    {
        $administrativo = Administrativo::where('id_administrativo', $id_administrativo)->firstOrFail();
        $administrativo->delete();

        return redirect()->route('administrativos.index')
            ->with('success', 'Administrativo eliminado correctamente.');
    }
}

