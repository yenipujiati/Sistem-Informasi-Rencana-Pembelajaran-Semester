<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\RP;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CPL extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'kode',
        'kategori_id',
        'deskripsi',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function rps()
    {
        return $this->belongsToMany(RP::class, 'c_p_l_rp');
    }

    public $timestamps = true;
}
