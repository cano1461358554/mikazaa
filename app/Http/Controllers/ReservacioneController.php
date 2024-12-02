<?php

namespace App\Http\Controllers;

use App\Models\Reservacion;
use Illuminate\Http\Request;

class ReservacionController extends Controller
{
    // Mostrar lista de reservaciones
    public function index()
    {
        $reservaciones = Reservacion::paginate(10);
        return view('reservaciones.index', compact('reservaciones'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    // Mostrar el formulario para crear una nueva reservación
    public function create()
    {
        return view('reservaciones.create');
    }

    // Guardar una nueva reservación
    public function store(Request $request)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'cantidad_personas' => 'required|integer',
        ]);

        Reservacion::create($request->all());

        return redirect()->route('reservaciones.index')
            ->with('success', 'Reservación creada correctamente.');
    }

    // Mostrar los detalles de una reservación específica
    public function show($id)
    {
        $reservacione = Reservacion::findOrFail($id);
        return view('reservaciones.show', compact('reservacione'));
    }

    // Mostrar el formulario para editar una reservación
    public function edit($id)
    {
        $reservacione = Reservacion::findOrFail($id);
        return view('reservaciones.edit', compact('reservacione'));
    }

    // Actualizar la reservación en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'cantidad_personas' => 'required|integer',
        ]);

        $reservacione = Reservacion::findOrFail($id);
        $reservacione->update($request->all());

        return redirect()->route('reservaciones.index')
            ->with('success', 'Reservación actualizada correctamente.');
    }

    // Eliminar una reservación
    public function destroy($id)
    {
        $reservacione = Reservacion::findOrFail($id);
        $reservacione->delete();

        return redirect()->route('reservaciones.index')
            ->with('success', 'Reservación eliminada correctamente.');
    }
}
