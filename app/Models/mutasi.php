<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mutasi extends Model
{
    use HasFactory;

    protected $table = 'mutasi';

    protected $fillable = [
        'pegawai_id',
        'tgl_sk',
        'ke',
        'arsip'
    ];

    protected $dates = [
        'tgl_sk',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\pegawai', 'pegawai_id');
    }
}
