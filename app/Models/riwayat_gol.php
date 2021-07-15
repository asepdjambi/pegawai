<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class riwayat_gol extends Model
{
    use HasFactory;

    protected $table = 'riwayat_gol';
    protected $fillable = [
        'pegawai_id',
        'master_gol_id',
        'no_sk',
        'tmt',
        'tgl',
        'arsip'
    ];

    protected $dates = [
        'tmt',
        'tgl',
        'created_at',
        'updated_at'
    ];

    public function master_gol()
    {
        return $this->belongsTo('\App\Models\gol', 'master_gol_id');
    }
}
