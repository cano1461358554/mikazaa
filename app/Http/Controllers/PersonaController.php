<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Requests\PersonaRequest;

/**
 * Class PersonaController
 * @package App\Http\Controllers
 */
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::paginate();

        return view('persona.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $persona = new Persona();
        return view('persona.create', compact('persona'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonaRequest $request)
    {
        Persona::create($request->validated());

        return redirect()->route('personas.index')
            ->with('success', 'Persona creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Usa el identificador personalizado para buscar la persona
        $persona = Persona::findOrFail($id);

        return view('persona.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Usa el identificador personalizado para buscar la persona
        $persona = Persona::findOrFail($id);

        return view('persona.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonaRequest $request, $id)
    {
        // Encuentra la persona por su clave primaria y actualiza los datos
        $persona = Persona::findOrFail($id);
        $persona->update($request->validated());

        return redirect()->route('personas.index')
            ->with('success', 'Persona actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Encuentra la persona por su clave primaria y elimínala
        $persona = Persona::findOrFail($id);
        $persona->delete();

        return redirect()->route('personas.index')->with('success', 'Persona eliminada correctamente.');
    }
}
