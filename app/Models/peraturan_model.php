<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peraturan_model extends Model
{
    use HasFactory;
    protected $table = 'master_peraturan';

    protected $fillable = [
        'no',
        'tahun',
        'tgl'
    ];

    protected $dates = [
        'tgl'
    ];
}
