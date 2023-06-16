<?php

namespace App\Http\Livewire\Cpl;

use App\Models\CPL;
use App\Models\Kategori;
use Livewire\Component;

class Create extends Component
{
    public $kode, $kategori_id, $deskripsi;

    protected $rules = [
        'kode'=>'required',
        'kategori_id'=>'required',
        'deskripsi'=>'required',
    ];

    public function store(){

        $this->validate();

        try{
            CPL::create([
                'kode'=>$this->kode,
                'kategori_id'=>$this->kategori_id,
                'deskripsi'=>$this->deskripsi
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('cplindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('cplindex');
        }
    }

    public function render()
    {
        $categorys = Kategori::all();
        return view('livewire.cpl.create', compact('categorys'))->extends('layouts.main')->section('content');
    }
}
