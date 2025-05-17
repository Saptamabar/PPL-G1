<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InventarisTakHabis;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryInventarisTakHabis;

class InventarisTakHabisKaryawanController extends Controller
{
    public function index()
    {
        $inventaristakHabis = InventarisTakHabis::where('jumlah', '>=', 0)->latest()->paginate(10);
        return view('karyawan.Inventaris.tak-habis.index',compact('inventaristakHabis'));
    }

    public function borrowItemForm(InventarisTakHabis $inventarisTakHabis)
    {
        if ($inventarisTakHabis->status !== 'tersedia') {
            return back()->with('error', 'Barang tidak tersedia untuk dipinjam');
        }

        return view('karyawan.inventaris.tak-habis.borrow-item', compact('inventarisTakHabis'));
    }

    public function processBorrow(Request $request, InventarisTakHabis $inventarisTakHabis)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        if ($inventarisTakHabis->status !== 'tersedia') {
            return back()->with('error', 'Barang tidak tersedia untuk dipinjam');
        }

        HistoryInventarisTakHabis::create([
            'inventaris_tak_habis_id' => $inventarisTakHabis->id,
            'user_id' => Auth::id(),
            'waktu_peminjaman' => $request->tanggal_pinjam,
            'waktu_pengembalian' => $request->tanggal_kembali,
            'keterangan' => $request->keterangan,
        ]);

        $inventarisTakHabis->update(['status' => 'tidak tersedia','user_id' => Auth::id()]);

        return redirect()->route('inventariskaryawan-tak-habis.index')
                        ->with('success', 'Peminjaman barang berhasil dicatat');
    }

    public function returnItem(InventarisTakHabis $inventarisTakHabis)
    {
        if ($inventarisTakHabis->status !== 'tidak tersedia') {
            return back()->with('error', 'Barang tidak sedang dipinjam');
        }

        $borrowing = HistoryInventarisTakHabis::where('inventaris_tak_habis_id', $inventarisTakHabis->id)
                        ->whereNull('waktu_pengembalian')
                        ->where('user_id',Auth::id())
                        ->latest()
                        ->first();
        if ($borrowing) {
            $borrowing->update([
                'waktu_pengembalian' => Carbon::now(),
            ]);

            $inventarisTakHabis->update(['status' => 'tersedia','user_id' => null]);

            return redirect()->route('inventariskaryawan-tak-habis.index')
                            ->with('success', 'Pengembalian barang berhasil dicatat');
        }
        return redirect()->route('inventariskaryawan-tak-habis.index')->with('error', 'Data peminjaman tidak ditemukan');
    }

    public function showNonConsumableHistory(InventarisTakHabis $inventarisTakHabis)
    {
        $historyTakHabis = HistoryInventarisTakHabis::where('inventaris_tak_habis_id',$inventarisTakHabis->id)->paginate(10);
        return view('karyawan.inventaris.tak-habis.history', compact('historyTakHabis'));
    }

    public function showNonConsumableHistoryall()
    {
        $historyTakHabis = HistoryInventarisTakHabis::where('user_id',Auth::id())->paginate(10);
        return view('karyawan.Inventaris.tak-habis.history',compact('historyTakHabis'));
    }
}
