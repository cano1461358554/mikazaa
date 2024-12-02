<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * $clientes->perPage());
    }

    public function create()
    {
        $cliente = new Cliente();
        return view('cliente.create', compact('cliente'));
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente creado exitosamente.');
    }

    public function show($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente);

        return view('cliente.show', compact('cliente'));
    }

    public function edit($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente);

        return view('cliente.edit', compact('cliente'));
    }

    public function update(Request $request, $id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy($id_cliente)
    {
        $cliente = Cliente::findOrFail($id_cliente);
        $cliente->delete();

        return redirect()->route('clientes.index')
            ->with('success', 'Cliente eliminado exitosamente.');
    }
}
