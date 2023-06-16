<?php

namespace App\Http\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Index extends Component
{
    public $kategori;

    protected $listeners = [
        'deleteKategori'=>'destroy'
    ];

    public function render()
    {
        $this->kategori = Kategori::select('id','nama','singkatan')->get();

        // tampilkan semua data
        // $this->kategori = Kategori::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->kategori = Kategori::onlyTrashed()->get();
        
        return view('livewire.kategori.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Kategori::find($id)->delete();
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
