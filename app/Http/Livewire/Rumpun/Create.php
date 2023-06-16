<?php

namespace App\Http\Livewire\Rumpun;

use App\Models\Rumpun;
use Livewire\Component;

class Create extends Component
{
    public $kode, $nama;

    protected $rules = [
        'kode'=>'required',
        'nama'=>'required',
    ];

    public function store(){

        $this->validate();

        try{
            Rumpun::create([
                'kode'=>$this->kode,
                'nama'=>$this->nama
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('rumpunindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('rumpunindex');
        }
    }
    
    public function render()
    {
        return view('livewire.rumpun.create')->extends('layouts.main')->section('content');
    }
}
