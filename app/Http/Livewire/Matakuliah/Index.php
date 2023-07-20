<?php

namespace App\Http\Livewire\Matakuliah;

use App\Models\Matakuliah;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $matakuliah;

    protected $listeners = [
        'deleteMatakuliah'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->matakuliah = Matakuliah::select('id','nama','kode','rumpun_id','bobot','semester','tanggal_penyusunan')->paginate(5);

        // tampilkan semua data
        // $this->cpl = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->cpl = CPL::onlyTrashed()->get();

        return view('livewire.matakuliah.index', [
            'matakuliah' => $this->matakuliah,
        ])->extends('layouts.main')->section('content');
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
