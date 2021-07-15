<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sekda extends Model
{
    use HasFactory;

    protected $table = 'dt_sekda';

    protected $fillable = [
        'nip',
        'nama'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
