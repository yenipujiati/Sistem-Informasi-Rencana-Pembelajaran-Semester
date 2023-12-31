<?php

namespace App\Http\Livewire\Rps;

use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\Component;

class Create extends Component
{
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id, $pertemuan_id;
    public $cpl_id = [];
    protected $rules = [
        'matakuliah_id'=>'required',
        'pengembang_id'=>'required',
        'koordinator_id'=>'required',
        'kaprodi_id'=>'required',
        'cpl_id'=>'required|array',
        'deskripsi_singkat'=>'required',
        'pustaka_id'=>'required',
        'mp_software'=>'required',
        'mp_hardware'=>'required',
        'pengampu_id'=>'required',
        'matakuliah_syarat_id'=>'required',
        'pertemuan_id'=>'required',
    ];

    public function store(){

        $t = $this->cpl_id;
        // dd($t);
        $this->validate();
        // 'cpl_id' => json_encode($this->cpl_id),

        try{
            $d = [];
            foreach ($t as $cpl) {
               $d[] = RP::create([
                    'matakuliah_id' => $this->matakuliah_id,
                    'pengembang_id' => $this->pengembang_id,
                    'koordinator_id' => $this->koordinator_id,
                    'kaprodi_id' => $this->kaprodi_id,
                    'cpl_id' => $cpl,

                    // 'cpl_id' => implode(',', $this->cpl_id),
                    'deskripsi_singkat' => $this->deskripsi_singkat,
                    'pustaka_id' => $this->pustaka_id,
                    'mp_software' => $this->mp_software,
                    'mp_hardware'=>$this->mp_hardware,
                    'pengampu_id' => $this->pengampu_id,
                    'matakuliah_syarat_id' => $this->matakuliah_syarat_id,
                    'pertemuan_id' => $this->pertemuan_id,
                ]);
            }
            // dd($d);

            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Created Successfully!!"
            ]);
            return redirect()->route('rpsindex');
        }catch(\Exception $e){
            dd($e);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('rpsindex');
        }
    }

    public function render()
    {
        $matakuliah = Matakuliah::all();
        $user = User::all();
        $cpl = CPL::all();
        $pustaka = Pustaka::all();
        $pertemuan = Pertemuan::all();
        return view('livewire.rps.create', compact('matakuliah','user','cpl','pustaka','pertemuan'))->extends('layouts.main')->section('content');
    }
}
