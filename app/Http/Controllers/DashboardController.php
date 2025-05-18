<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggrek;
use App\Models\Article;
use App\Models\InventarisHabis;
use App\Models\InventarisTakHabis;
use App\Models\HistoryInventarisHabis;
use App\Models\HistoryInventarisTakHabis;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            return $this->adminDashboard();
        } else {
            return $this->karyawanDashboard();
        }
    }

    protected function adminDashboard()
    {
        $data = [
            'totalKaryawan' => User::where('role', 'karyawan')->count(),
            'totalAnggrek' => Anggrek::count(),
            'totalInventaris' => InventarisHabis::count() + InventarisTakHabis::count(),
            'recentInventaris' => InventarisHabis::latest()->take(5)->get()
                ->merge(InventarisTakHabis::latest()->take(5)->get()),
            'recentPenggunaan' => HistoryInventarisHabis::with('inventarisHabis')->latest()->take(5)->get()
                ->merge(HistoryInventarisTakHabis::with('inventarisTakHabis')->latest()->take(5)->get()),
        ];

        return view('admin.dashboard', $data);
    }

    protected function karyawanDashboard()
    {
        $userId = auth()->id();

        $barang_sedang_dipinjam = HistoryInventarisTakHabis::where('user_id', $userId)
                ->whereNull('waktu_pengembalian')
                ->count();
        $barang_pernah_digunakan = HistoryInventarisHabis::where('user_id',$userId)
            ->sum('jumlah');
        $inventaris_habis_riwayat = HistoryInventarisHabis::where('user_id', $userId)
                ->latest()
                ->take(5)
                ->get();
        $inventaris_takhabis_riwayat = HistoryInventarisTakHabis::where('user_id', $userId)
                        ->latest()
                        ->take(5)
                        ->get();

        return view('karyawan.dashboard', compact('barang_sedang_dipinjam','barang_pernah_digunakan','inventaris_habis_riwayat','inventaris_takhabis_riwayat'));
    }
}
