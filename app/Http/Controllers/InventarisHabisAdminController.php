<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventarisHabis;

class InventarisHabisAdminController extends Controller
{
     public function index()
    {
        $inventarisHabis = InventarisHabis::latest()->paginate(10);
        return(view('admin.Inventaris.habis.index',compact('inventarisHabis')));
    }

     public function createHabis()
    {
        return view('admin.inventaris.habis.create');
    }

    public function storeHabis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        InventarisHabis::create($request->all());

        return redirect()->route('inventaris.habis')
                        ->with('success', 'Inventaris Habis created successfully.');
    }

    public function showHabis(InventarisHabis $inventarisHabis)
    {
        return view('admin.inventaris.habis.show', compact('inventarisHabis'));
    }

    public function editHabis(InventarisHabis $inventarisHabis)
    {
        return view('admin.inventaris.habis.edit', compact('inventarisHabis'));
    }

    public function updateHabis(Request $request, InventarisHabis $inventarisHabis)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        $inventarisHabis->update($request->all());

        return redirect()->route('inventaris.habis')
                        ->with('success', 'Inventaris Habis updated successfully');
    }

    public function destroyHabis(InventarisHabis $inventarisHabis)
    {
        $inventarisHabis->delete();

        return redirect()->route('inventaris.habis')
                        ->with('success', 'Inventaris Habis deleted successfully');
    }
}
