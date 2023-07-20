<?php

namespace App\Http\Livewire\Cpl;

use App\Models\CPL;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $cpl;

    protected $listeners = [
        'deleteCpl'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->cpl = CPL::select('id','kode','kategori_id','deskripsi')->paginate(5);

        // tampilkan semua datahow 
        // $this->cpl = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->cpl = CPL::onlyTrashed()->get();
        
        return view('livewire.cpl.index', [
            'cpl' => $this->cpl,
        ])->extends('layouts.main')->section('content');
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
