<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Pegawai;

class keluarga extends Model
{
    use HasFactory;
    protected $table = 'dt_keluarga';

    protected $fillable = [
        'pegawai_id',
        'nama',
        'tgl_l',
        'status',
        'pekerjaan',
        'hub',
        'dt'
    ];

    protected $dates = [
        'tgl_l',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('pegawai', 'pegawai_id');
    }
}
