<?php

namespace App\Http\Livewire\Pustaka;

use App\Models\Pustaka;
use Livewire\Component;

class Index extends Component
{
    public $pustaka;

    protected $listeners = [
        'deletePustaka'=>'destroy'
    ];

    public function render()
    {
        $this->pustaka = Pustaka::select('id','jenis','sumber')->get();

        // tampilkan semua data
        // $this->pustaka = Pustaka::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->pustaka = Pustaka::onlyTrashed()->get();

        return view('livewire.pustaka.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Pustaka::find($id)->delete();
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
