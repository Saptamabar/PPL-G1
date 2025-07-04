<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryInventarisHabis;
use App\Models\HistoryInventarisTakHabis;

class HistoryInventarisController extends Controller
{
    public function indexHabis()
    {
        $historyHabis = HistoryInventarisHabis::with(['user', 'inventarisHabis'])
                            ->latest()
                            ->paginate(10);

        return view('admin.Inventaris.habis.history', compact('historyHabis'));
    }

    public function indexKaryawanHabis()
    {
        $historyHabis = HistoryInventarisHabis::with(['user', 'inventarisHabis'])
                            ->where('user_id', auth()->id)
                            ->latest()
                            ->paginate(10);

        return view('karyawan.Inventaris.habis.history', compact('historyHabis'));
    }

    public function indexTakHabis()
    {
        $historyTakHabis = HistoryInventarisTakHabis::with(['user', 'inventarisTakHabis'])
                                ->latest()
                                ->paginate(10);


        return view('admin.Inventaris.tak-habis.history', compact('historyTakHabis'));
    }

    public function indexKaryawanTakHabis()
    {
        $historyTakHabis = HistoryInventarisTakHabis::with(['user', 'inventarisTakHabis'])
                                ->where('user_id', auth()->id)
                                ->latest()
                                ->paginate(10);

        return view('karyawan.Inventaris.tak-habis.history', compact('historyTakHabis'));
    }
}
