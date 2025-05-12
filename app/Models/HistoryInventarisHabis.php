<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryInventarisHabis extends Model
{
    use HasFactory;

    protected $table = 'history_inventaris_habis';

    protected $casts = [
    'waktu_penggunaan' => 'datetime',
    ];

    protected $fillable = [
        'waktu_penggunaan',
        'jumlah',
        'inventaris_habis_id',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventarisHabis()
    {
        return $this->belongsTo(InventarisHabis::class, 'inventaris_habis_id');
        // Ditambahkan parameter foreign key eksplisit
    }
}
