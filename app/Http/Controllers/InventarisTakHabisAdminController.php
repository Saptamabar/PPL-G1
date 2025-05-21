<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisTakHabis;

class InventarisTakHabisAdminController extends Controller
{
    public function index()
    {
        $inventarisTakHabis = InventarisTakHabis::latest()->paginate(10);
        return(view('admin.Inventaris.tak-habis.index',compact('inventarisTakHabis')));
    }

    public function createTakHabis()
    {
        return view('admin.Inventaris.tak-habis.create');
    }

    public function storeTakHabis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:inventaris_tak_habis',
        ]);

        InventarisTakHabis::create($request->all());

        return redirect()->route('inventaris.takhabis')
                        ->with('success', 'Inventaris Tak Habis created successfully.');
    }

    public function showTakHabis(InventarisTakHabis $inventarisTakHabis)
    {
        return view('admin.Inventaris.tak-habis.show', compact('inventarisTakHabis'));
    }

    public function editTakHabis(InventarisTakHabis $inventarisTakHabis)
    {
        return view('admin.Inventaris.tak-habis.edit', compact('inventarisTakHabis'));
    }

    public function updateTakHabis(Request $request, InventarisTakHabis $inventarisTakHabis)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:inventaris_tak_habis,kode,'.$inventarisTakHabis->id,
        ]);

        $inventarisTakHabis->update($request->all());

        return redirect()->route('inventaris.takhabis')
                        ->with('success', 'Inventaris Tak Habis updated successfully');
    }

    public function destroyTakHabis(InventarisTakHabis $inventarisTakHabis)
    {
        $inventarisTakHabis->delete();

        return redirect()->route('inventaris.takhabis')
                        ->with('success', 'Inventaris Tak Habis deleted successfully');
    }
}
