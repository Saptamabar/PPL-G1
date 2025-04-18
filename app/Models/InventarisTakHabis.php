<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisTakHabis extends Model
{
    /** @use HasFactory<\Database\Factories\InventarisTakHabisFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
    ];
}
