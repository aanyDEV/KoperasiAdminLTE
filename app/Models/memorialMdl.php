<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class memorialMdl extends Model
{
    use HasFactory;
    protected $table = 'memorials';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal',
        'nomor_bukti',
        'nomor_perkiraan',
        'deskripsi',
        'ubl',
        'jumlah_uang',
        'jenis',
        'created_by',
    ];
}
