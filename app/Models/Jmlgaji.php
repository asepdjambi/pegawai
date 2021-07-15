<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jmlgaji extends Model
{
    use HasFactory;
    protected $table = 'master_j_gaji';

    protected $fillable = [
        'gol',
        'tahun',
        'gaji'
    ];
}
