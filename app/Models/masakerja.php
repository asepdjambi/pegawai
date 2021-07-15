<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masakerja extends Model
{
    use HasFactory;

    protected $table = 'masakerja';

    protected $fillable = [
        'pegawai_id',
        'tahun',
        'bulan'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
