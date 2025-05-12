<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryInventarisHabis;
use App\Models\HistoryInventarisTakHabis;

class InventarisController extends Controller
{
    public function index()
    {
        $inventarisHabis = InventarisHabis::latest()->paginate(10);
        $inventarisTakHabis = InventarisTakHabis::latest()->paginate(10);

        return view('admin.inventaris.index', compact('inventarisHabis', 'inventarisTakHabis'));
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

    public function indexkaryawan()
    {
        $inventarisHabis = InventarisHabis::where('jumlah', '>=', 0)->latest()->paginate(10);
        $inventarisTakHabis = InventarisTakHabis::latest()->paginate(10);
        return view('karyawan.inventaris.index', compact('inventarisHabis', 'inventarisTakHabis'));
    }

    // Consumable Items Usage Methods
    public function showUsageForm()
    {
        $inventarisHabis = InventarisHabis::where('jumlah', '>', 0)->get();
        return view('karyawan.inventaris.habis.usage', compact('inventarisHabis'));
    }

    public function processUsage(Request $request)
    {
        $request->validate([
            'inventaris_habis_id' => 'required|exists:inventaris_habis,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:255',
        ]);

        $inventaris = InventarisHabis::findOrFail($request->inventaris_habis_id);

        if ($inventaris->jumlah < $request->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        // Record the usage
        HistoryInventarisHabis::create([
            'inventaris_habis_id' => $inventaris->id,
            'user_id' => Auth::id(),
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => Carbon::now(),
        ]);

        // Update stock
        $inventaris->decrement('jumlah', $request->jumlah);

        return redirect()->route('inventariskaryawan.index')
                        ->with('success', 'Penggunaan barang berhasil dicatat');
    }

    // Non-Consumable Items Borrow Methods
    public function showBorrowForm()
    {
        $inventarisTakHabis = InventarisTakHabis::where('status', 'tersedia')->get();
        return view('karyawan.inventaris.tak-habis.borrow', compact('inventarisTakHabis'));
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
        // dd($inventarisTakHabis);
        $request->validate([
            'tanggal_pinjam' => 'required|date',
            'keterangan' => 'required|string|max:255',
        ]);

        if ($inventarisTakHabis->status !== 'tersedia') {
            return back()->with('error', 'Barang tidak tersedia untuk dipinjam');
        }

        // Record the borrowing
        HistoryInventarisTakHabis::create([
            'inventaris_tak_habis_id' => $inventarisTakHabis->id,
            'user_id' => Auth::id(),
            'waktu_peminjaman' => $request->tanggal_pinjam,
            'waktu_pengembalian' => $request->tanggal_kembali,
            'keterangan' => $request->keterangan,
        ]);

        // Update item status
        $inventarisTakHabis->update(['status' => 'tidak tersedia']);

        return redirect()->route('inventariskaryawan.index')
                        ->with('success', 'Peminjaman barang berhasil dicatat');
    }

    // History Methods
    public function showConsumableHistory(InventarisHabis $inventarisHabi)
    {
        $history = $inventarisHabi->history()->with('user')->latest()->paginate(10);
        return view('karyawan.inventaris.habis.history', compact('inventarisHabi', 'history'));
    }

    public function showNonConsumableHistory(InventarisTakHabis $inventarisTakHabi)
    {
        $history = $inventarisTakHabi->history()->with('user')->latest()->paginate(10);
        return view('karyawan.inventaris.tak-habis.history', compact('inventarisTakHabi', 'history'));
    }

    public function showQuickUsageForm(Request $request)
    {
        $inventarisHabis = InventarisHabis::findOrFail($request->id);
        return view('karyawan.inventaris.habis.quick-usage', compact('inventarisHabis'));
    }

    public function processQuickUsage(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1|max:'.$request->jumlah,
            'keterangan' => 'required|string|max:255',
        ]);
        HistoryInventarisHabis::create([
            'inventaris_habis_id' => $request->id,
            'user_id' => Auth::id(),
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'waktu_penggunaan' => Carbon::now(),
        ]);

        $inventarisHabis = InventarisHabis::findOrFail($request->id);

        $inventarisHabis->decrement('jumlah', $request->jumlah);

        return redirect()->route('inventariskaryawan.index')
                        ->with('success', 'Penggunaan barang berhasil dicatat');
    }

    // Return for non-consumable items
    public function returnItem(InventarisTakHabis $inventarisTakHabis)
    {
        if ($inventarisTakHabis->status !== 'tidak tersedia') {
            return back()->with('error', 'Barang tidak sedang dipinjam');
        }

        // Find the active borrowing record
        $borrowing = HistoryInventarisTakHabis::where('inventaris_tak_habis_id', $inventarisTakHabis->id)
                        ->whereNull('waktu_pengembalian')
                        ->where('user_id',Auth::id())
                        ->latest()
                        ->first();
        if ($borrowing) {
            $borrowing->update([
                'waktu_pengembalian' => Carbon::now(),
            ]);

            $inventarisTakHabis->update(['status' => 'tersedia']);

            return redirect()->route('inventariskaryawan.index')
                            ->with('success', 'Pengembalian barang berhasil dicatat');
        }
        return redirect()->route('inventariskaryawan.index')->with('error', 'Data peminjaman tidak ditemukan');
    }

}
