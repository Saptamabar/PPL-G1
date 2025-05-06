<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history_inventaris_habis extends Model
{
    use HasFactory;

    protected $table = 'history_inventaris_habis';

    protected $fillable = [
        'waktu penggunaan',
        'jumlah',
        'inventaris habis',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function inventarisHabis()
    {
        return $this->belongsTo(InventarisHabis::class);
    }
}
