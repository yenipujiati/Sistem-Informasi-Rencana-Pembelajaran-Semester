<?php

namespace App\Http\Livewire\Pertemuan;

use App\Models\Pertemuan;
use Livewire\Component;

class Index extends Component
{
    public $pertemuan;

    protected $listeners = [
        'deletePertemuan'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->pertemuan = Pertemuan::select('id','minggu_ke','kemampuan_akhir','bahan_kajian','metode_pembelajaran','waktu','pengalaman_belajar','bobot_nilai','topik_id')->get();

        // tampilkan semua data
        // $this->cpl = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->cpl = CPL::onlyTrashed()->get();

        return view('livewire.pertemuan.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Pertemuan::find($id)->delete();
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
