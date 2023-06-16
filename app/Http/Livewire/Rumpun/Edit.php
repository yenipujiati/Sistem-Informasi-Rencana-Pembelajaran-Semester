<?php

namespace App\Http\Livewire\Rumpun;

use Illuminate\Http\Request; 
use Livewire\Component;
use App\Models\Rumpun;

class Edit extends Component
{
    public $kode, $nama, $rumpunId;

    protected $rules = [
        'kode'=>'required',
        'nama'=>'required',
    ];

    public function render()
    {
        return view('livewire.rumpun.edit')->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $rumpun = Rumpun::find($id);
        if($rumpun) {
            $this->rumpunId = $rumpun->id;
            $this->kode = $rumpun->kode;
            $this->nama = $rumpun->nama;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->rumpunId) {
            $rumpun = Rumpun::find($this->rumpunId);
            if($rumpun) {
                $rumpun->update([
                    'kode' => $this->kode,
                    'nama' => $this->nama
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('rumpunindex');
    }
}
