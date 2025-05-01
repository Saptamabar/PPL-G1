<?php

namespace App\Http\Controllers;

use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index()
    {
        $inventarisHabis = InventarisHabis::latest()->paginate(10);
        $inventarisTakHabis = InventarisTakHabis::latest()->paginate(10);

        return view('admin.inventaris.index', compact('inventarisHabis', 'inventarisTakHabis'));
    }

    public function indexkaryawan()
    {
        $inventarisHabis = InventarisHabis::latest()->paginate(10);
        $inventarisTakHabis = InventarisTakHabis::latest()->paginate(10);

        return view('karyawan.inventaris.index', compact('inventarisHabis', 'inventarisTakHabis'));
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

        return redirect()->route('inventaris-habis.index')
                        ->with('success', 'Inventaris Habis created successfully.');
    }

    public function showHabis(InventarisHabis $inventarisHabi)
    {
        return view('admin.inventaris.habis.show', compact('inventarisHabi'));
    }

    public function editHabis(InventarisHabis $inventarisHabi)
    {
        return view('admin.inventaris.habis.edit', compact('inventarisHabi'));
    }

    public function updateHabis(Request $request, InventarisHabis $inventarisHabi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|string|max:255',
            'jumlah' => 'required|integer',
        ]);

        $inventarisHabi->update($request->all());

        return redirect()->route('inventaris-habis.index')
                        ->with('success', 'Inventaris Habis updated successfully');
    }

    public function destroyHabis(InventarisHabis $inventarisHabi)
    {
        $inventarisHabi->delete();

        return redirect()->route('inventaris-habis.index')
                        ->with('success', 'Inventaris Habis deleted successfully');
    }


    public function createTakHabis()
    {
        return view('admin.inventaris.tak-habis.create');
    }

    public function storeTakHabis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:inventaris_tak_habis',
        ]);

        InventarisTakHabis::create($request->all());

        return redirect()->route('inventaris-tak-habis.index')
                        ->with('success', 'Inventaris Tak Habis created successfully.');
    }

    public function showTakHabis(InventarisTakHabis $inventarisTakHabi)
    {
        return view('admin.inventaris.tak-habis.show', compact('inventarisTakHabi'));
    }

    public function editTakHabis(InventarisTakHabis $inventarisTakHabi)
    {
        return view('admin.inventaris.tak-habis.edit', compact('inventarisTakHabi'));
    }

    public function updateTakHabis(Request $request, InventarisTakHabis $inventarisTakHabi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:255|unique:inventaris_tak_habis,kode,'.$inventarisTakHabi->id,
        ]);

        $inventarisTakHabi->update($request->all());

        return redirect()->route('inventaris-tak-habis.index')
                        ->with('success', 'Inventaris Tak Habis updated successfully');
    }

    public function destroyTakHabis(InventarisTakHabis $inventarisTakHabi)
    {
        $inventarisTakHabi->delete();

        return redirect()->route('inventaris-tak-habis.index')
                        ->with('success', 'Inventaris Tak Habis deleted successfully');
    }
}
