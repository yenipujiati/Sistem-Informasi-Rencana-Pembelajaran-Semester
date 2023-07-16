<?php

namespace App\Http\Livewire\Dosen;

use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use App\Models\Topik;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{
    //rps
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id;
    public $cpl_id = [];
    public $rpsId, $cp_mk;

    //pustaka
    public $jenis, $sumber;
    public $pustakaId;

    //pertemuan
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;
    public $istest;
    public $pertemuan = [];
    public $pertemuanId;
    public $rps_id;

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
            'pertemuan.*.istest'=>'required',
        ]);
        
   
        $this->currentStep = 5;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function removePertemuan($index)
    {
        unset($this->pertemuan[$index]);
        $this->pertemuan = array_values($this->pertemuan);
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
        return view('livewire.dosen.edit', compact('user2','matakuliah','user','cpl','pustaka','pertemuan','topik'))->extends('layouts.main2')->section('content');
    }

    public function mount($id)
    {
        // $pertemuan = Pertemuan::find($id);
        $pustaka = Pustaka::find($id);
        $rps = RP::find($id);
        if($rps) {
            $this->rpsId = $rps->id;
            $this->matakuliah_id = $rps->matakuliah_id;
            $this->pengembang_id = $rps->pengembang_id;
            $this->koordinator_id = $rps->koordinator_id;
            $this->kaprodi_id = $rps->kaprodi_id;
            // $this->cpl_id = $rps->cpl_id;
            $this->deskripsi_singkat = $rps->deskripsi_singkat;
            $this->pustaka_id = $rps->pustaka_id;
            $this->mp_software = $rps->mp_software;
            $this->mp_hardware = $rps->mp_hardware;
            $this->pengampu_id = $rps->pengampu_id;
            $this->matakuliah_syarat_id = $rps->matakuliah_syarat_id;
            $this->cp_mk = $rps->cp_mk;
            $this->pertemuan = Pertemuan::where('rps_id', $id)->get()->toArray();
        }
        if($pustaka) {
            $this->pustakaId = $pustaka->id;
            $this->jenis = $pustaka->jenis;
            $this->sumber = $pustaka->sumber;
        }
        // if($pertemuan) {
        //     $this->rpsId = $id;
        //     $this->pertemuan = Pertemuan::where('rps_id', $id)->get()->toArray();
        //     $this->pertemuanId = $pertemuan->id;
        //     $this->minggu_ke = $pertemuan->minggu_ke;
        //     $this->istest = $pertemuan->istest;
        //     $this->bahan_kajian = $pertemuan->bahan_kajian;
        //     $this->metode_pembelajaran = $pertemuan->metode_pembelajaran;
        //     $this->waktu = $pertemuan->waktu;
        //     $this->pengalaman_belajar = $pertemuan->pengalaman_belajar;
        //     $this->bobot_nilai = $pertemuan->bobot_nilai;
        //     $this->topik_id = $pertemuan->topik_id;
        // }
    }

    public function update()
    {
        // dd($this->pertemuan);
        $validatedData = $this->validate([
            'pertemuan.*.minggu_ke'=>'required',
            'pertemuan.*.istest'=>'required',
            'jenis'=>'required',
            'sumber'=>'required',
            'cpl_id'=>'required|array',
            'matakuliah_id'=>'required',
            'pengembang_id'=>'required',
            'koordinator_id'=>'required',
            'kaprodi_id'=>'required',
            'deskripsi_singkat'=>'required',
            'mp_software'=>'required',
            'mp_hardware'=>'required',
            'pengampu_id'=>'required',
        ]);

        if($this->rpsId) {
            $rps = RP::find($this->rpsId);
            $pertemuan = Pertemuan::find($this->pertemuanId);
            $pustaka = Pustaka::find($this->pustakaId);
            $string = implode(',',$this->cpl_id);
            if($rps) {
                $rps->update([
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
                    'cp_mk' => $this->cp_mk,
                    'cpl_ids' => $string,
                ]);
            }
            foreach ($this->pertemuan as $item) {
                if (isset($item['id'])) {
                    $pertemuan = Pertemuan::find($item['id']);
                    if ($pertemuan) {
                        $pertemuan->update([
                            'minggu_ke' => $item['minggu_ke'],
                            'istest' => $item['istest'],
                            'kemampuan_akhir' => $item['kemampuan_akhir'],
                            'bahan_kajian' => $item['bahan_kajian'],
                            'metode_pembelajaran' => $item['metode_pembelajaran'],
                            'waktu' => $item['waktu'],
                            'pengalaman_belajar' => $item['pengalaman_belajar'],
                            'bobot_nilai' => $item['bobot_nilai'],
                            'topik_id' => $item['topik_id'],
                        ]);
                    }
                } else {
                    // Create a new pertemuan
                    Pertemuan::create([
                        'matkul_id' => $this->matakuliah_id,
                        'minggu_ke' => $item['minggu_ke'],
                        'kemampuan_akhir' => $item['kemampuan_akhir'],
                        'rps_id' => $rps['id'],
                        'bahan_kajian' => $item['bahan_kajian'],
                        'metode_pembelajaran' => $item['metode_pembelajaran'],
                        'waktu' => $item['waktu'],
                        'pengalaman_belajar' => $item['pengalaman_belajar'],
                        'bobot_nilai' => $item['bobot_nilai'],
                        'topik_id' => $item['topik_id'],
                        'istest' => $item['istest'],
                    ]);
                }
            }
            if($this->pustakaId) {
                $pustaka = Pustaka::find($this->pustakaId);
                if($pustaka) {
                    $pustaka->update([
                        'jenis' => $this->jenis,
                        'sumber' => $this->sumber
                    ]);
                }
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('dosenmyrps');
    }
}
