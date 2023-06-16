<?php

namespace App\Http\Livewire\Pustaka;

use App\Models\Pustaka;
use Livewire\Component;

class Create extends Component
{
    public $jenis, $sumber;

    protected $rules = [
        'jenis'=>'required',
        'sumber'=>'required',
    ];

    public function store(){
        // dd($this->jenis, $this->sumber);

        $this->validate();

        try{
            Pustaka::create([
                'jenis'=>$this->jenis,
                'sumber'=>$this->sumber
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('pustakaindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('pustakaindex');
        }
    }

    public function render()
    {
        return view('livewire.pustaka.create')->extends('layouts.main')->section('content');
    }
}
