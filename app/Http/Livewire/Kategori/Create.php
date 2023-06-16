<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Create extends Component
{
    public $nama, $singkatan;

    protected $rules = [
        'nama'=>'required',
        'singkatan'=>'required',
    ];

    public function store(){

        $this->validate();

        try{
            Kategori::create([
                'nama'=>$this->nama,
                'singkatan'=>$this->singkatan
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('kategoriindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('kategoriindex');
        }
    }

    public function render()
    {
        return view('livewire.kategori.create')->extends('layouts.main')->section('content');
    }
}
