<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisTakHabis extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'status'
    ];

    public function history()
    {
        return $this->hasMany(HistoryInventarisTakHabis::class, 'inventaris_tak_habis_id');
    }
}
