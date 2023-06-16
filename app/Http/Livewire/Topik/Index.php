<?php

namespace App\Http\Livewire\Topik;

use Livewire\Component;
use App\Models\Topik;

class Index extends Component
{
    public $topik;

    protected $listeners = [
        'deleteTopik'=>'destroy'
    ];

    public function render()
    {
        $this->topik = Topik::select('id','topik')->get();

        // tampilkan semua data
        // $this->topik = Topik::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->topik = Topik::onlyTrashed()->get();

        return view('livewire.topik.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Topik::find($id)->delete();
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
