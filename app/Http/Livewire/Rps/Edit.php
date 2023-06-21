<?php

namespace App\Http\Livewire\Rps;

use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\Component;

class Edit extends Component
{
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $cpl_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id, $pertemuan_id, $rpsId;

    protected $rules = [
        'matakuliah_id'=>'required',
        'pengembang_id'=>'required',
        'koordinator_id'=>'required',
        'kaprodi_id'=>'required',
        'cpl_id'=>'required',
        'deskripsi_singkat'=>'required',
        'pustaka_id'=>'required',
        'mp_software'=>'required',
        'mp_hardware'=>'required',
        'pengampu_id'=>'required',
        'pertemuan_id'=>'required',
    ];

    public function render()
    {
        $matakuliah = Matakuliah::all();
        $user = User::all();
        $cpl = CPL::all();
        $pustaka = Pustaka::all();
        $pertemuan = Pertemuan::all();
        return view('livewire.rps.edit', compact('matakuliah','user','cpl','pustaka','pertemuan'))->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $rps = RP::find($id);
        if($rps) {
            $this->rpsId = $rps->id;
            $this->matakuliah_id = $rps->matakuliah_id;
            $this->pengembang_id = $rps->pengembang_id;
            $this->koordinator_id = $rps->koordinator_id;
            $this->kaprodi_id = $rps->kaprodi_id;
            $this->cpl_id = $rps->cpl_id;
            $this->deskripsi_singkat = $rps->deskripsi_singkat;
            $this->pustaka_id = $rps->pustaka_id;
            $this->mp_software = $rps->mp_software;
            $this->mp_hardware = $rps->mp_hardware;
            $this->pengampu_id = $rps->pengampu_id;
            $this->pertemuan_id = $rps->pertemuan_id;
        }
    }

    public function update()
    {
        $this->validate();

        if($this->rpsId) {
            $rps = RP::find($this->rpsId);
            if($rps) {
                $rps->update([
                    'matakuliah_id' => $this->matakuliah_id,
                    'pengembang_id' => $this->pengembang_id,
                    'koordinator_id' => $this->koordinator_id,
                    'kaprodi_id' => $this->kaprodi_id,
                    'cpl_id' => $this->cpl_id,
                    'deskripsi_singkat' => $this->deskripsi_singkat,
                    'pustaka_id' => $this->pustaka_id,
                    'mp_software' => $this->mp_software,
                    'mp_hardware'=>$this->mp_hardware,
                    'pengampu_id' => $this->pengampu_id,
                    'pertemuan_id' => $this->pertemuan_id,
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('rpsindex');
    }
}
