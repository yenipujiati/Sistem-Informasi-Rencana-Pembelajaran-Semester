<?php

namespace App\Http\Livewire\Pertemuan;

use App\Models\Pertemuan;
use App\Models\Topik;
use Livewire\Component;

class Create extends Component
{
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;
    public $pertemuan = [];

    protected $rules = [
        'pertemuan.*.minggu_ke'=>'required',
        'pertemuan.*.kemampuan_akhir'=>'required',
        'pertemuan.*.bahan_kajian'=>'required',
        'pertemuan.*.metode_pembelajaran'=>'required',
        'pertemuan.*.waktu'=>'required',
        'pertemuan.*.pengalaman_belajar'=>'required',
        'pertemuan.*.bobot_nilai'=>'required',
        'pertemuan.*.topik_id'=>'required',
    ];

    public function addPertemuan()
    {
        $this->pertemuan[] = [
            'minggu_ke' => $this->minggu_ke,
            'kemampuan_akhir' => $this->kemampuan_akhir,
            'bahan_kajian' => $this->bahan_kajian,
            'metode_pembelajaran' => $this->metode_pembelajaran,
            'waktu' => $this->waktu,
            'pengalaman_belajar' => $this->pengalaman_belajar,
            'bobot_nilai' => $this->bobot_nilai,
            'topik_id' => $this->topik_id,
        ];

        // Reset nilai input setelah ditambahkan ke $pertemuan
        // $this->reset([
        //     'minggu_ke', 'kemampuan_akhir', 'bahan_kajian', 'metode_pembelajaran', 'waktu',
        //     'pengalaman_belajar', 'bobot_nilai', 'topik_id'
        // ]);
    }

    public function removePertemuan($index)
    {
        unset($this->pertemuan[$index]);
        $this->pertemuan = array_values($this->pertemuan);
    }

    public function store(){

        $this->validate();

        try{
            foreach ($this->pertemuan as $data) {
                Pertemuan::create($data);
            }
            // Pertemuan::create([
            //     'minggu_ke'=>$this->minggu_ke,
            //     'kemampuan_akhir'=>$this->kemampuan_akhir,
            //     'bahan_kajian'=>$this->bahan_kajian,
            //     'metode_pembelajaran'=>$this->metode_pembelajaran,
            //     'waktu'=>$this->waktu,
            //     'pengalaman_belajar'=>$this->pengalaman_belajar,
            //     'bobot_nilai'=>$this->bobot_nilai,
            //     'topik_id'=>$this->topik_id,
            // ]);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('pertemuanindex');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('pertemuanindex');
        }
    }

    public function render()
    {
        $topik = Topik::all();
        return view('livewire.pertemuan.create', compact('topik'))->extends('layouts.main')->section('content');
    }
}
