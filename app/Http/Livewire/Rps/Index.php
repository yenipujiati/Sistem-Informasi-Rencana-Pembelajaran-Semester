<?php

namespace App\Http\Livewire\Rps;

use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\Component;

class Index extends Component
{
    public $rps;

    protected $listeners = [
        'deleteRPS'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->rps = RP::select('id','matakuliah_id','pengembang_id','koordinator_id','kaprodi_id','cpl_id','deskripsi_singkat','pustaka_id','mp_software','mp_hardware','pengampu_id','matakuliah_syarat_id','pertemuan_id')->get();

        // tampilkan semua data
        // $this->rps = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->rps = CPL::onlyTrashed()->get();

        return view('livewire.rps.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            RP::find($id)->delete();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Deleted Successfully!!"
            ]);
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Something goes wrong while deleting!!"
            ]);
        }
    }
}
