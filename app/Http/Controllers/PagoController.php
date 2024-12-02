<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::paginate(10);
        return view('pago.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pago.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_pago' => 'required|unique:pagos,id_pago',
            'metodo_pago' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        $pago = new Pago();
        $pago->id_pago = $request->id_pago;
        $pago->metodo_pago = $request->metodo_pago;
        $pago->monto = $request->monto;
        $pago->save();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id_pago)
    {
        $pago = Pago::where('id_pago', $id_pago)->firstOrFail();
        return view('pago.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_pago)
    {
        $pago = Pago::where('id_pago', $id_pago)->firstOrFail();
        return view('pago.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_pago)
    {
        $request->validate([
            'metodo_pago' => 'required|string|max:255',
            'monto' => 'required|numeric',
        ]);

        $pago = Pago::where('id_pago', $id_pago)->firstOrFail();
        $pago->metodo_pago = $request->metodo_pago;
        $pago->monto = $request->monto;
        $pago->save();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_pago)
    {
        $pago = Pago::where('id_pago', $id_pago)->firstOrFail();
        $pago->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}
