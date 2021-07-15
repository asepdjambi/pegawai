<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\keluarga;
use \App\Models\pendidikan;
use \app\Models\struktural;
use \app\Models\pns;



class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'NIP',
        'NIP_lama',
        'Nama',
        'NIK',
        'KK',
        'tempat_L',
        'tgl_L',
        'JK',
        'Alamat',
        'hp',
        'email',
        'agama',
        'status',
        'master_jabatan_id',
        'jab',
        'master_gol_id',
        'gapok',
        'NPWP',
        'karpeg',
        'BPJS',
        'masa_kerja_t',
        'masa_kerja_b',
        'asal_ins',
        'aktif',
        'foto'
    ];

    protected $dates = [
        'tgl_L',
        'created_at',
        'updated_at'
    ];

    public function keluarga()
    {
        return $this->hasMany('keluarga');
    }

    public function pendidikan()
    {
        return $this->hasMany('pendidikan');
    }

    public function golongan()
    {
        return $this->belongsTo('App\models\gol', 'master_gol_id');
    }

    public function jabatan()
    {
        return $this->belongsTo('App\models\master_jabatan', 'master_jabatan_id');
    }

    public function struktral()
    {
        return $this->hasMany('struktural');
    }

    public function gajiberkala()
    {
        return $this->hasOne('App\Models\gajiberkala');
    }

    public function pangkatberkala()
    {
        return $this->hasOne('App\Models\pangkatberkala');
    }

    public function pns()
    {
        return $this->hasOne('App\Models\pns');
    }

    public function KADIS()
    {
        return $this->hasOne('App\Models\KADIS');
    }

    public function sekre()
    {
        return $this->hasOne('App\models\sekre');
    }

    public function meninggal()
    {
        return $this->hasOne('App\Models\meninggal');
    }

    public function mutasi()
    {
        return $this->hasOne('App\Models\mutasi');
    }

    public function pensiun()
    {
        return $this->hasOne('App\Models\pensiun');
    }
}
