<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';

    protected $fillable = [
        'no_anggota',
        'nama',
        'tgl_lahir'
    ];

    protected $dates = ['tgl_lahir'];
}
