<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class sekre extends Model
{
    use HasFactory;

    protected $table = 'dt_sekretaris';

    protected $fillable = [
        'pegawai_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function pegawai()
    {
        return $this->BelongsTo('App\models\pegawai', 'pegawai_id');
    }
}
