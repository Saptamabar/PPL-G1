<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\InventarisHabis;
use Illuminate\Support\Facades\Auth;
use App\Models\HistoryInventarisHabis;

class InventarisHabisKaryawanController extends Controller
{
    public function index()
    {
        $inventarisHabis = InventarisHabis::where('jumlah', '>=', 0)->latest()->paginate(10);
        return view('karyawan.Inventaris.habis.index',compact('inventarisHabis'));
    }

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

        HistoryInventarisHabis::create([
            'inventaris_habis_id' => $inventaris->id,
            'user_id' => Auth::id(),
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
            'tanggal' => Carbon::now(),
        ]);

        $inventaris->decrement('jumlah', $request->jumlah);

        return redirect()->route('inventariskaryawan-habis.index')
                        ->with('success', 'Penggunaan barang berhasil dicatat');
    }


    public function showConsumableHistory(InventarisHabis $inventarisHabis)
    {
        $historyHabis = HistoryInventarisHabis::where('inventaris_habis_id',$inventarisHabis->id)->paginate(10);
        // dd($historyHabis);
        return view('karyawan.inventaris.habis.history', compact( 'historyHabis') );
    }

    public function showConsumableHistoryall()
    {
        $historyHabis = HistoryInventarisHabis::where('user_id',Auth::id())->paginate(10);
        return view('karyawan.Inventaris.habis.history',compact('historyHabis'));
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

        return redirect()->route('inventariskaryawan-habis.index')
                        ->with('success', 'Penggunaan barang berhasil dicatat');
    }
}
