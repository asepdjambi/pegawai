<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Pegawai;

class pendidikan extends Model
{
    use HasFactory;

    protected $table   = 'master_pendidikan';

    protected $fillable = [
        'pegawai_id',
        'tingkat',
        'nama_s',
        'jurusan',
        'tahun',
        'no_ijazah',
        'gelar',
        'ijazah'
    ];

    protected $dates=[
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('pegawai');
    }
}
