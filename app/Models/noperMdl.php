<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noperMdl extends Model
{
    use HasFactory;
    protected $table = 'nomor_perkiraans';
    protected $primaryKey = 'id';
    protected $fillable = ['kode', 'uraian', 'created_by'];
}