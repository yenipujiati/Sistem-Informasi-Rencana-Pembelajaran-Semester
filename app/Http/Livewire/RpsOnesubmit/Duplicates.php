<?php

namespace App\Http\Livewire\RpsOnesubmit;

use App\Models\Pertemuan;
use App\Models\Topik;
use App\Models\RP;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Duplicates extends Component
{
    public function render()

    {   

            // DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
            // $duplicates = Pertemuan::select('topik_id',  'matakuliahs.nama', 'topiks.topik' ,DB::raw('COUNT(topik_id) as count')) 
            // ->join('matakuliahs', 'matakuliahs.id' , '=', 'pertemuans.matkul_id') 
            // ->join('topiks', 'topiks.id', '=', 'pertemuans.topik_id') 
            // ->groupBy('topik_id') 
            // ->having('count', '>', 1) 
            // ->get();
            
            // $duplicates = Pertemuan::select("*", )
            // ->get();
            // $test1 = Topik::select("*")
            // ->join("pertemuans", 'pertemuans.topik_id', '=', 'topiks.id')
            // ->where("pertemuans.metode_pembelajaran", '=', "Pembelajaran Berbasis Masalah")->get();
            
            // $test2 = Topik::select("*")
            // ->join('pertemuans', 'pertemuans.topik_id', '=', 'topiks.id')
            // ->get();
            // dd($test2 );

            // $coba = Topik::with('pertemuans')->get();
            // dd($coba);
            

            // $duplicateTopics = Topik::select('topiks.topik',DB::raw('COUNT(topiks.id) as count'))
            // ->join('pertemuans', 'pertemuans.topik_id', '=', 'topiks.id')
            // ->groupBy('topiks.id')
            // ->having('count', '>', 1)
            // ->get();

            // // dd($duplicateTopics);
        
            //  $test = Topik::select("*")->whereIn(DB::raw("(SELECT COUNT(topiks.id) as count FROM pertemuans JOIN topiks ON pertemuans.topik_id = topiks.id where topiks.id = pertemuans.id GROUP BY topiks.id)"), '>', 2)
            // ->get();
        

//             //select * from topiks where(select count(topiks.id) )

// $results = DB::table('topiks')
//     ->join('pertemuans', 'pertemuans.topik_id', '=', 'topiks.id')
//     ->groupBy('pertemuans.topik_id')
//     ->havingRaw('COUNT(pertemuans.topik_id) > 1')
//     ->select('pertemuans.*', 'topiks.*')
//     ->get();

    $duplicates = Pertemuan::select('topik_id', 'topiks.topik' ,DB::raw('group_concat(matakuliahs.nama) as matkul_name')) 
    ->join('matakuliahs', 'matakuliahs.id' , '=', 'pertemuans.matkul_id') 
    ->join('topiks', 'topiks.id', '=', 'pertemuans.topik_id') 
    ->groupBy('topik_id', 'topiks.topik') 
    ->havingRaw(DB::raw('count(topik_id) > 1'))
    ->get();

    // $string = $duplicates->pluck('matkul_name')->implode(',');
    // dd($duplicates);

    return view('livewire.rps-onesubmit.duplicates', compact('duplicates'))->extends('layouts.main')->section('content');
    }
}
