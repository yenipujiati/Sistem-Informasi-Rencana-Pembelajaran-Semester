<?php

namespace App\Models;

use App\Models\Topik;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pertemuan extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        'minggu_ke',
        'kemampuan_akhir',
        'bahan_kajian',
        'metode_pembelajaran',
        'waktu',
        'pengalaman_belajar',
        'bobot_nilai',
        'topik_id',
        'rps_id',
        'matkul_id',
        'istest'
    ];

    public function topik()
    {
        return $this->belongsTo(Topik::class);
    }

    public function rp()
    {
        return $this->belongsTo(RP::class, 'rps_id', 'id');
    }
    public $timestamps = true;
}
