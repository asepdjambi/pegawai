<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meninggal extends Model
{
    use HasFactory;

    protected $table = 'meninggal';

    protected $fillable = [
        'pegawai_id',
        'tgl',
        'lokasi',
        'arsip'
    ];

    protected $dates = [
        'tgl',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }
}
