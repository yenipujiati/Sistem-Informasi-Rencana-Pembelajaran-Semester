<?php

namespace App\Http\Livewire\Matakuliah;

use App\Models\Matakuliah;
use App\Models\Rumpun;
use Livewire\Component;

class Create extends Component
{
    public $nama, $kode, $rumpun_id, $bobot, $semester, $tanggal_penyusunan;

    protected $rules = [
        'nama'=>'required',
        'kode'=>'required',
        'rumpun_id'=>'required',
        'bobot'=>'required',
        'semester'=>'required',
        'tanggal_penyusunan'=>'required',
    ];

    public function store(){

        $this->validate();

        try{
            Matakuliah::create([
                'nama'=>$this->nama,
                'kode'=>$this->kode,
                'rumpun_id'=>$this->rumpun_id,
                'bobot'=>$this->bobot,
                'semester'=>$this->semester,
                'tanggal_penyusunan'=>$this->tanggal_penyusunan
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('matakuliahindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('matakuliahindex');
        }
    }

    public function render()
    {
        $rumpun = Rumpun::all();
        return view('livewire.matakuliah.create', compact('rumpun'))->extends('layouts.main')->section('content');
    }
}
