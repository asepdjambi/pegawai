<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pns extends Model
{
    use HasFactory;

    protected $table = 'master_pns';

    protected $fillable = [
        'pegawai_id',
        'no_capeg',
        'master_gol_id',
        'tmt_capeg',
        'scan_capeg',
        'no_skumptk',
        'tmt_skumptk',
        'scan_skumptk',
        'no_pns',
        'tmt_pns',
        'scan_pns'
    ];

    protected $dates = [
        'tmt_capeg',
        'tmt_skumptk',
        'tmt_pns',
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }

    public function golongan()
    {
        return $this->belongsTo('App\Models\gol', 'master_gol_id');
    }
}
