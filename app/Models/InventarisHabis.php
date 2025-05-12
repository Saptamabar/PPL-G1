<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventarisHabis extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'jumlah',
    ];

    public function history()
    {
        return $this->hasMany(HistoryInventarisHabis::class, 'inventaris_habis_id');
    }
}
