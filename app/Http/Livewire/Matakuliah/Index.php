<?php

namespace App\Http\Livewire\Matakuliah;

use App\Models\Matakuliah;
use Livewire\Component;

class Index extends Component
{
    public $matakuliah;

    protected $listeners = [
        'deleteMatakuliah'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->matakuliah = Matakuliah::select('id','nama','kode','rumpun_id','bobot','semester','tanggal_penyusunan')->get();

        // tampilkan semua data
        // $this->cpl = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->cpl = CPL::onlyTrashed()->get();

        return view('livewire.matakuliah.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Matakuliah::find($id)->delete();
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
