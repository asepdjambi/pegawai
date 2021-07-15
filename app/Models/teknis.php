<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\models\Pegawai;

class teknis extends Model
{
    use HasFactory;
    protected $table = 'master_teknis';

    protected $fillable = [
        'pegawai_id',
        'nama_t',
        'lama',
        'tgl_m',
        'tgl_s',
        'no_sertifikat',
        'penyelenggara',
        'arsip',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'tgl_m',
        'tgl_s',
        'created_at',
        'updated_at',
    ];

    public function pegawai()
    {
        return $this->belongsToMany('pegawai', 'master_pegawai');
    }
}
