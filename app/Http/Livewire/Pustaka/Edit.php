<?php

namespace App\Http\Livewire\Pustaka;

use Illuminate\Http\Request; 
use Livewire\Component;
use App\Models\Pustaka;

class Edit extends Component
{
    public $jenis, $sumber, $pustakaId;

    protected $rules = [
        'jenis'=>'required',
        'sumber'=>'required',
    ];

    public function render()
    {
        return view('livewire.pustaka.edit')->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $pustaka = Pustaka::find($id);
        if($pustaka) {
            $this->pustakaId = $pustaka->id;
            $this->jenis = $pustaka->jenis;
            $this->sumber = $pustaka->sumber;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->pustakaId) {
            $pustaka = Pustaka::find($this->pustakaId);
            if($pustaka) {
                $pustaka->update([
                    'jenis' => $this->jenis,
                    'sumber' => $this->sumber
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('pustakaindex');
    }
}
