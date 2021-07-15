<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class struktural extends Model
{
    use HasFactory;
    protected $table = 'diklat_struktural';

    protected $fillable = [
        'pegawai_id',
        'nama',
        'no_sttpl',
        'lama',
        'tgl_m',
        'tgl_s',
        'penyelenggara',
        'arsip'
    ];

    protected $dates = [
        'tgl_m',
        'tgl_s',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsToMany('pegawai', 'pegawai_id');
    }
}
