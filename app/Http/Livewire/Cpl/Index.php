<?php

namespace App\Http\Livewire\Cpl;

use App\Models\CPL;
use Livewire\Component;

class Index extends Component
{
    public $cpl;

    protected $listeners = [
        'deleteCpl'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->cpl = CPL::select('id','kode','kategori_id','deskripsi')->get();

        // tampilkan semua data
        // $this->cpl = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->cpl = CPL::onlyTrashed()->get();
        
        return view('livewire.cpl.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            CPL::find($id)->delete();
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
