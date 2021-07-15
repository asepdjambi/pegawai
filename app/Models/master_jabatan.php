<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class master_jabatan extends Model
{
    use HasFactory;
    protected $table = 'master_jabatan';

    protected $fillable = [
        'nama_jab',
        'eselon'
    ];

    public function pegawai()
    {
        return $this->hasMany('\App\Models\Pegawai');
    }

    public function riwjab()
    {
        return $this->hasMany('\App\Models\jabatan');
    }
}
