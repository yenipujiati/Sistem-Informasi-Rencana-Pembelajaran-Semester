<?php

namespace App\Http\Livewire\Pertemuan;

use App\Models\Pertemuan;
use App\Models\Topik;
use Livewire\Component;

class Create extends Component
{
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;

    protected $rules = [
        'minggu_ke'=>'required',
        'kemampuan_akhir'=>'required',
        'bahan_kajian'=>'required',
        'metode_pembelajaran'=>'required',
        'waktu'=>'required',
        'pengalaman_belajar'=>'required',
        'bobot_nilai'=>'required',
        'topik_id'=>'required',
    ];

    public function store(){

        $this->validate();

        try{
            Pertemuan::create([
                'minggu_ke'=>$this->minggu_ke,
                'kemampuan_akhir'=>$this->kemampuan_akhir,
                'bahan_kajian'=>$this->bahan_kajian,
                'metode_pembelajaran'=>$this->metode_pembelajaran,
                'waktu'=>$this->waktu,
                'pengalaman_belajar'=>$this->pengalaman_belajar,
                'bobot_nilai'=>$this->bobot_nilai,
                'topik_id'=>$this->topik_id,
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('pertemuanindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('pertemuanindex');
        }
    }

    public function render()
    {
        $topik = Topik::all();
        return view('livewire.pertemuan.create', compact('topik'))->extends('layouts.main')->section('content');
    }
}
