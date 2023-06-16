<?php

namespace App\Models;

use App\Models\Rumpun;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Matakuliah extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'nama',
        'kode',
        'rumpun_id',
        'bobot',
        'semester',
        'tanggal_penyusunan',
    ];

    public function rumpun()
    {
        return $this->belongsTo(Rumpun::class);
    }

    public $timestamps = true;
}
