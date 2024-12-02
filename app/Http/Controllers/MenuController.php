<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate();

        return view('menu.index', compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * $menus->perPage());
    }

    public function create()
    {
        $menu = new Menu();
        return view('menu.create', compact('menu'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_menu' => 'required|unique:menus,id_menu',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        Menu::create($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu creado correctamente.');
    }

    public function show($id_menu)
    {
        $menu = Menu::where('id_menu', $id_menu)->firstOrFail();
        return view('menu.show', compact('menu'));
    }

    public function edit($id_menu)
    {
        $menu = Menu::where('id_menu', $id_menu)->firstOrFail();
        return view('menu.edit', compact('menu'));
    }

    public function update(Request $request, $id_menu)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $menu = Menu::where('id_menu', $id_menu)->firstOrFail();
        $menu->update($validated);

        return redirect()->route('menus.index')
            ->with('success', 'Menu actualizado correctamente.');
    }

    public function destroy($id_menu)
    {
        // Buscar el menú por la clave primaria
        $menu = Menu::where('id_menu', $id_menu)->firstOrFail();
    
        // Eliminar el registro
        $menu->delete();
    
        // Redirigir con un mensaje de éxito
        return redirect()->route('menus.index')->with('success', 'Menu eliminado correctamente.');
    }
}