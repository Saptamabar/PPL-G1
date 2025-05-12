<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryInventarisTakHabis extends Model
{
    use HasFactory;

    protected $table = 'history_inventaris_tak_habis';

    protected $casts = [
    'waktu_peminjaman' => 'datetime',
    'waktu_pengembalian'=> 'datetime',

    ];

    protected $fillable = [
        'waktu_peminjaman',
        'waktu_pengembalian',
        'inventaris_tak_habis_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventarisTakHabis()
    {
        return $this->belongsTo(InventarisTakHabis::class, 'inventaris_tak_habis_id');
    }
}
