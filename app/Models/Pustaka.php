<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pustaka extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'jenis',
        'sumber',
    ];

    public $timestamps = true;
}
