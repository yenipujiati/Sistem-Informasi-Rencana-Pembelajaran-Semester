<?php

namespace App\Http\Livewire\Kategori;

use Illuminate\Http\Request; 
use Livewire\Component;
use App\Models\Kategori;

class Edit extends Component
{
    public $singkatan, $nama, $kategoriId;

    protected $rules = [
        'nama'=>'required',
        'singkatan'=>'required',
    ];

    public function render()
    {
        return view('livewire.kategori.edit')->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $kategori = Kategori::find($id);
        if($kategori) {
            $this->kategoriId = $kategori->id;
            $this->nama = $kategori->nama;
            $this->singkatan = $kategori->singkatan;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->kategoriId) {
            $kategori = Kategori::find($this->kategoriId);
            if($kategori) {
                $kategori->update([
                    'nama' => $this->nama,
                    'singkatan' => $this->singkatan
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('kategoriindex');
    }
}
