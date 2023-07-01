<?php

namespace App\Http\Livewire\RpsOnesubmit;

use App\Models\Topik;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\Component;

class Create extends Component
{
    //rps
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id;
    public $cpl_id = [];
    public $pertemuan_id = [];

    //pustaka
    public $jenis, $sumber;

    //pertemuan
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;
    public $pertemuan = [];

    public $currentStep = 1;

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'matakuliah_id'=>'required',
            'pengembang_id'=>'required',
            'koordinator_id'=>'required',
            'kaprodi_id'=>'required',
            'deskripsi_singkat'=>'required',
            'mp_software'=>'required',
            'mp_hardware'=>'required',
            'pengampu_id'=>'required',
            'matakuliah_syarat_id'=>'required',
        ]);
  
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'cpl_id'=>'required|array',
        ]);
   
        $this->currentStep = 3;
    }

    public function thirdthStepSubmit()
    {
        $validatedData = $this->validate([
            'jenis'=>'required',
            'sumber'=>'required',
        ]);
   
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'pertemuan.*.minggu_ke'=>'required',
            'pertemuan.*.kemampuan_akhir'=>'required',
            'pertemuan.*.bahan_kajian'=>'required',
            'pertemuan.*.metode_pembelajaran'=>'required',
            'pertemuan.*.waktu'=>'required',
            'pertemuan.*.pengalaman_belajar'=>'required',
            'pertemuan.*.bobot_nilai'=>'required',
            'pertemuan.*.topik_id'=>'required',
        ]);
   
        $this->currentStep = 5;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

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
    }

    public function removePertemuan($index)
    {
        unset($this->pertemuan[$index]);
        $this->pertemuan = array_values($this->pertemuan);
    }

    public function store(){
        
        try{
            //pustaka
            $idPustaka = Pustaka::create([
                'jenis'=>$this->jenis,
                'sumber'=>$this->sumber
            ]);

            //pertemuan
            $pertemuanIds = [];
            foreach ($this->pertemuan as $data) {
                $pertemuans = Pertemuan::create($data);
                $pertemuanIds[] = $pertemuans->id;
            }

            //rps
            $d = [];
            foreach ($this->cpl_id as $cpl) {
                $this->pustaka_id = $idPustaka->id;
                $rps = RP::create([
                    'matakuliah_id' => $this->matakuliah_id,
                    'pengembang_id' => $this->pengembang_id,
                    'koordinator_id' => $this->koordinator_id,
                    'kaprodi_id' => $this->kaprodi_id,
                    'cpl_id' => $cpl,
                    'deskripsi_singkat' => $this->deskripsi_singkat,
                    'pustaka_id' => $this->pustaka_id,
                    'mp_software' => $this->mp_software,
                    'mp_hardware'=>$this->mp_hardware,
                    'pengampu_id' => $this->pengampu_id,
                    'matakuliah_syarat_id' => $this->matakuliah_syarat_id,
                    // 'pertemuan_id' => implode(',', $pertemuanIds),
                ]);
                if (!empty($pertemuanIds)) {
                    $rps->pertemuan_id = array_shift($pertemuanIds);
                    $rps->save();
                }
                $d[] = $rps;
                // $this->pertemuan = $pertemuanIds;
                // $pertemuanId = $this->pertemuan[0]['id'];
                // $rps->pertemuan_id = $pertemuanId;
                // $rps->save();
                // $d[] = $rps;
            }

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('rpsonesubmitindex');
        }catch(\Exception $e){
            dd($e);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('rpsonesubmitindex');
        }
        $this->currentStep = 1;
    }

    public function render()
    {
        $matakuliah = Matakuliah::all();
        $user = User::all();
        $cpl = CPL::all();
        $pustaka = Pustaka::all();
        $pertemuan = Pertemuan::all();
        $topik = Topik::all();
        return view('livewire.rps-onesubmit.create', compact('matakuliah','user','cpl','pustaka','pertemuan','topik'))->extends('layouts.main')->section('content');
    }
}
