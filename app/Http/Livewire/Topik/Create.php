<?php

namespace App\Http\Livewire\Topik;

use Livewire\Component;
use App\Models\Topik;

class Create extends Component
{
    public $topik;

    protected $rules = [
        'topik'=>'required',
    ];

    public function store(){

        // dd('Store Method is called');
        $this->validate();

        try{
            Topik::create([
                'topik'=>$this->topik
            ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('topikindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('topikindex');
        }
    }

    public function render()
    {
        return view('livewire.topik.create')->extends('layouts.main')->section('content');
    }
}
