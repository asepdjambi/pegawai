<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KADIS extends Model
{
    use HasFactory;

    protected $table = 'dt_kadis';

    protected $fillable = [
        'pegawai_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id');
    }
}
