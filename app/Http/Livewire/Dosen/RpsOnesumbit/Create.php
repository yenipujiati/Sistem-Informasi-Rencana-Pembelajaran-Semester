<?php

namespace App\Http\Livewire\Dosen\RpsOnesumbit;

use App\Models\Topik;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    //rps
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id;
    public $cpl_id = [];

    //pustaka
    public $jenis, $sumber;

    //pertemuan
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;
    public $istest;
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
            // 'matakuliah_syarat_id'=>'required',
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
            // 'pertemuan.*.kemampuan_akhir'=>'required',
            // 'pertemuan.*.bahan_kajian'=>'required',
            // 'pertemuan.*.metode_pembelajaran'=>'required',
            // 'pertemuan.*.waktu'=>'required',
            // 'pertemuan.*.pengalaman_belajar'=>'required',
            // 'pertemuan.*.bobot_nilai'=>'required',
            // 'pertemuan.*.topik_id'=>'required',
            'pertemuan.*.istest'=>'required',
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
            'istest' => $this->istest,
        ];
    }

    public function removePertemuan($index)
    {
        unset($this->pertemuan[$index]);
        $this->pertemuan = array_values($this->pertemuan);
    }

    public function store(){
        
        try{
            $string = implode(',', $this->cpl_id);
            
            //pustaka
            $idPustaka = Pustaka::create([
                'jenis'=>$this->jenis,
                'sumber'=>$this->sumber
            ]);

            $this->pustaka_id = $idPustaka->id;
                $rps = RP::create([
                    'matakuliah_id' => $this->matakuliah_id,
                    'pengembang_id' => $this->pengembang_id,
                    'koordinator_id' => $this->koordinator_id,
                    'kaprodi_id' => $this->kaprodi_id,
                    'cpl_id' => $this->cpl_id[0],
                    'deskripsi_singkat' => $this->deskripsi_singkat,
                    'pustaka_id' => $this->pustaka_id,
                    'mp_software' => $this->mp_software,
                    'mp_hardware'=>$this->mp_hardware,
                    'pengampu_id' => $this->pengampu_id,
                    'matakuliah_syarat_id' => $this->matakuliah_syarat_id,
                    'cpl_ids' => $string,
                ]);

            $pertemuan = [];
            foreach($this->pertemuan as $data){
                $pertemuans = Pertemuan::create([
                    'matkul_id' => $this->matakuliah_id,
                    "minggu_ke" => $data['minggu_ke'],
                    "kemampuan_akhir" => $data['kemampuan_akhir'],
                    "bahan_kajian" => $data['bahan_kajian'],
                    "metode_pembelajaran" => $data['metode_pembelajaran'],
                    "waktu" =>  $data['waktu'],
                    "pengalaman_belajar" => $data['pengalaman_belajar'],
                    "bobot_nilai" => $data['bobot_nilai'],
                    "topik_id" => $data['topik_id'],
                    "rps_id" => $rps['id'],
                    "istest" => $data['istest'],
                ]);
                $pertemuan[] = $pertemuans;
            }
            return redirect()->route('dosen.rpsonesubmitindex');
        }catch(\Exception $e){
            dd($e);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('dosen.rpsonesubmitindex');
        }
        $this->currentStep = 1;
    }

    public function render()
    {
        $this->pengembang_id = Auth::id();
        $user2 = Auth::user();
        $matakuliah = Matakuliah::all();
        $user = User::all();
        $cpl = CPL::all();
        $pustaka = Pustaka::all();
        $pertemuan = Pertemuan::all();
        $topik = Topik::all();
        return view('livewire.dosen.rps-onesumbit.create', compact('user2','matakuliah','user','cpl','pustaka','pertemuan','topik'))->extends('layouts.main2')->section('content');
    }
}
