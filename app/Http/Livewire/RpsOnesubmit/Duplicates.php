<?php

namespace App\Http\Livewire\RpsOnesubmit;

use App\Models\Pertemuan;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Duplicates extends Component
{
    public function render()
    {
        $duplicates = Pertemuan::select('topik_id', 'rps_id', 'matakuliahs.nama', 'topiks.topik' ,DB::raw('COUNT(topik_id) as count'))
        ->join('rps', 'rps.id', '=', 'pertemuans.rps_id')
        ->join('matakuliahs', 'matakuliahs.id' , '=', 'rps.matakuliah_id')
        ->join('topiks', 'topiks.id', '=', 'pertemuans.topik_id')
        ->groupBy('topik_id', 'rps_id', 'matakuliahs.nama', 'topiks.topik')
        ->having('count', '>', 1)
        ->get();
        return view('livewire.rps-onesubmit.duplicates', compact('duplicates'))->extends('layouts.main')->section('content');
    }
}
