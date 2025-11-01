<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'tgl_peminjaman',
        'book_id',
        'anggota_id',
        'tgl_pengembalian',
        'status'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
