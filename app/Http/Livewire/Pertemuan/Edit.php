<?php

namespace App\Http\Livewire\Pertemuan;

use App\Models\Pertemuan;
use App\Models\Topik;
use Illuminate\Http\Request;
use Livewire\Component;

class Edit extends Component
{
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id, $pertemuanId;

    protected $rules = [
        'minggu_ke'=>'required',
        'kemampuan_akhir'=>'required',
        'bahan_kajian'=>'required',
        'metode_pembelajaran'=>'required',
        'waktu'=>'required',
        'pengalaman_belajar'=>'required',
        'bobot_nilai'=>'required',
        'topik_id'=>'required',
    ];

    public function render()
    {
        $topik = Topik::all();
        return view('livewire.pertemuan.edit', compact('topik'))->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $pertemuan = Pertemuan::find($id);
        if($pertemuan) {
            $this->pertemuanId = $pertemuan->id;
            $this->minggu_ke = $pertemuan->minggu_ke;
            $this->kemampuan_akhir = $pertemuan->kemampuan_akhir;
            $this->bahan_kajian = $pertemuan->bahan_kajian;
            $this->metode_pembelajaran = $pertemuan->metode_pembelajaran;
            $this->waktu = $pertemuan->waktu;
            $this->pengalaman_belajar = $pertemuan->pengalaman_belajar;
            $this->bobot_nilai = $pertemuan->bobot_nilai;
            $this->topik_id = $pertemuan->topik_id;
        }
    }

    public function update()
    {
        $this->validate();

        if($this->pertemuanId) {
            $pertemuan = Pertemuan::find($this->pertemuanId);
            if($pertemuan) {
                $pertemuan->update([
                    'minggu_ke' => $this->minggu_ke,
                    'kemampuan_akhir' => $this->kemampuan_akhir,
                    'kemampuan_akhir' => $this->kemampuan_akhir,
                    'bahan_kajian' => $this->bahan_kajian,
                    'metode_pembelajaran' => $this->metode_pembelajaran,
                    'waktu' => $this->waktu,
                    'pengalaman_belajar' => $this->pengalaman_belajar,
                    'bobot_nilai' => $this->bobot_nilai,
                    'topik_id'=>$this->topik_id,
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('pertemuanindex');
    }
}
