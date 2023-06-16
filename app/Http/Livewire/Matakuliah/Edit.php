<?php

namespace App\Http\Livewire\Matakuliah;

use App\Models\Matakuliah;
use App\Models\Rumpun;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public $nama, $kode, $rumpun_id, $bobot, $semester, $tanggal_penyusunan, $matakuliahId;

    protected $rules = [
        'nama'=>'required',
        'kode'=>'required',
        'rumpun_id'=>'required',
        'bobot'=>'required',
        'semester'=>'required',
        'tanggal_penyusunan'=>'required',
    ];


    public function render()
    {
        $rumpun = Rumpun::all();
        return view('livewire.matakuliah.edit', compact('rumpun'))->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $matakuliah = Matakuliah::find($id);
        if($matakuliah) {
            $this->matakuliahId = $matakuliah->id;
            $this->nama = $matakuliah->nama;
            $this->kode = $matakuliah->kode;
            $this->rumpun_id = $matakuliah->rumpun_id;
            $this->bobot = $matakuliah->bobot;
            $this->semester = $matakuliah->semester;
            $this->tanggal_penyusunan = $matakuliah->tanggal_penyusunan;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->matakuliahId) {
            $matakuliah = Matakuliah::find($this->matakuliahId);
            if($matakuliah) {
                $matakuliah->update([
                    'nama' => $this->nama,
                    'kode' => $this->kode,
                    'rumpun_id' => $this->rumpun_id,
                    'bobot' => $this->bobot,
                    'semester' => $this->semester,
                    'tanggal_penyusunan' => $this->tanggal_penyusunan,
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('matakuliahindex');
    }
}
