<?php

namespace App\Models;

use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rp extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'matakuliah_id',
        'pengembang_id',
        'koordinator_id',
        'kaprodi_id',
        'cpl_id',
        'deskripsi_singkat',
        'pustaka_id',
        'mp_software',
        'mp_hardware',
        'pengampu_id',
        'matakuliah_syarat_id',
        'pertemuan_id',
        'cpl_ids',
        'istest',
        'cp_mk',
    ];

    // public function pertemuan()
    // {
    //     return $this->hasMany(Pertemuan::class);
    // }

    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }

    public function pengembang()
    {
        return $this->belongsTo(User::class);
    }

    public function koordinator()
    {
        return $this->belongsTo(User::class);
    }

    public function kaprodi()
    {
        return $this->belongsTo(User::class);
    }

    public function pengampu()
    {
        return $this->belongsTo(User::class);
    }

    public function cpl()
    {
        return $this->belongsTo(CPL::class);
    }

    public function pustaka()
    {
        return $this->belongsTo(Pustaka::class);
    }

    public $timestamps = true;
}
