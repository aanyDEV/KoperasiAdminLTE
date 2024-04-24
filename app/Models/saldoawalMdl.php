<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldoawalMdl extends Model
{
    use HasFactory;
    protected $table = 'saldo_awals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nomor_perkiraan',
        'nama_perkiraan',
        'jenis',
        'saldo_awal',
        'created_by',
    ];
}
