<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gol extends Model
{
    use HasFactory;
    protected $table = 'master_gol';
    protected $fillable = [
        'gol',
        'pangkat'
    ];

    public function pegawai()
    {
        return $this->hasMany('App\Models\Pegawai');
    }

    public function riwayat_gol()
    {
        return $this->hasMany('\App\Models\riwayat_gol');
    }

    public function gajiberkala()
    {
        return $this->hasMany('\App\Models\gajiberkala');
    }

    public function pangkatberkala()
    {
        return $this->hasMany('\App\Models\pangkatberkala');
    }

    public function pns()
    {
        return $this->hasMany('\App\Models\pns');
    }
}
