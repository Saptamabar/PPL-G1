<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_inventaris_tak_habis extends Model
{
    use HasFactory;

    protected $table = 'history_inventaris_tak_habis';

    protected $fillable = [
        'waktu peminjaman',
        'waktu pengembalian',
        'inventaris_tak_habis',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventaristakHabis()
    {
        return $this->belongsTo(InventaristakHabis::class);
    }
}
