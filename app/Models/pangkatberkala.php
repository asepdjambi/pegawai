<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pangkatberkala extends Model
{
    use HasFactory;
    protected $table = 'tbl_gaji_berkala';

    protected $fillable = [
        'No',
        'pegawai_id',
        'tgl',
        'pangkat_lama',
        'pangkat_baru',
        'pejabat',
        'tgl_berlaku_L',
        'masa_L_tahun',
        'masa_L_bulan',
        'tgl_no_L',
        'tgl_berlaku_B',
        'masa_kerja_tahun_B',
        'masa_kerja_bulan_B',
        'master_gol_id',
        'tgl_berlaku_S',
        'arsip'
    ];

    protected $dates = [
        'tgl',
        'tgl_berlaku_L',
        'tgl_berlaku_B',
        'tgl_berlaku_S',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('\App\Models\pegawai', 'pegawai_id');
    }

    public function golongan()
    {
        return $this->belongsTo('\App\Models\gol', 'master_gol_id');
    }
}
