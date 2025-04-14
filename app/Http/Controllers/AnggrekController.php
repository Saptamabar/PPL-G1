<?php

namespace App\Http\Controllers;

use App\Models\Anggrek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggrekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anggreks = Anggrek::latest()->paginate(10);
        return view('admin.anggrek.index', compact('anggreks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggrek.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_anggrek' => 'required|string|max:255',
            'nama_latin' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_anggrek', 'public');
        }

        Anggrek::create($data);

        return redirect()->route('anggrek.index')
                         ->with('success', 'Anggrek berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Anggrek $anggrek)
    {
        return view('admin.anggrek.show', compact('anggrek'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggrek $anggrek)
    {
        return view('admin.anggrek.edit', compact('anggrek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Anggrek $anggrek)
    {
        $request->validate([
            'nama_anggrek' => 'required|string|max:255',
            'nama_latin' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($anggrek->foto) {
                Storage::disk('public')->delete($anggrek->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_anggrek', 'public');
        }

        $anggrek->update($data);

        return redirect()->route('anggrek.index')
                         ->with('success', 'Anggrek berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anggrek $anggrek)
    {
        if ($anggrek->foto) {
            Storage::disk('public')->delete($anggrek->foto);
        }

        $anggrek->delete();

        return redirect()->route('anggrek.index')
                         ->with('success', 'Anggrek berhasil dihapus');
    }
}
