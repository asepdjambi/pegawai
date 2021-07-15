<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class jabatan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_jab';

    protected $fillable = [
        'pegawai_id',
        'jabatan',
        'master_jabatan_id',
        'tmt',
        'tgl_sk',
        'tmt_lantik',
        'no_sk',
        'unit_k',
        'satuan',
        'arsip'
    ];

    protected $dates = [
        'tmt',
        'tgl_sk',
        'tmt_lantik',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsToMany('\App\Models\Pegawai');
    }

    public function jabeselon()
    {
        return $this->belongsTo('\App\Models\master_jabatan', 'master_jabatan_id');
    }
}
