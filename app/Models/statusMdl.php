<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class statusMdl extends Model
{
    use HasFactory;
    protected $fillable=[
        "nomor_perkiraan",
        "status",
        'selisih'
    ];
}
