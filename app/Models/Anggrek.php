<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggrek extends Model
{
    use HasFactory;

    protected $table = 'data_anggrek';

    protected $fillable = [
        'nama_anggrek',
        'foto',
        'nama_latin'
    ];
}
