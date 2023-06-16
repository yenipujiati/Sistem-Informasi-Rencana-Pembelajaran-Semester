<?php

namespace App\Http\Livewire\Cpl;

use App\Models\CPL;
use App\Models\Kategori;
use Illuminate\Http\Request; 
use Livewire\Component;

class Edit extends Component
{
    public $kode, $kategori_id, $deskripsi, $cplId;

    protected $rules = [
        'kode'=>'required',
        'kategori_id'=>'required',
        'deskripsi'=>'required',
    ];

    public function render()
    {
        $categorys = Kategori::all();
        return view('livewire.cpl.edit', compact('categorys'))->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $cpl = CPL::find($id);
        if($cpl) {
            $this->cplId = $cpl->id;
            $this->kode = $cpl->kode;
            $this->kategori_id = $cpl->kategori_id;
            $this->deskripsi = $cpl->deskripsi;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->cplId) {
            $cpl = CPL::find($this->cplId);
            if($cpl) {
                $cpl->update([
                    'kode' => $this->kode,
                    'kategori_id' => $this->kategori_id,
                    'deskripsi' => $this->deskripsi
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('cplindex');
    }
}
