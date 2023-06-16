<?php

namespace App\Http\Livewire\Rumpun;

use App\Models\Rumpun;
use Livewire\Component;

class Index extends Component
{
    public $rumpun;

    protected $listeners = [
        'deleteRumpun'=>'destroy'
    ];
    
    public function render()
    {
        $this->rumpun = Rumpun::select('id','kode','nama')->get();

        // tampilkan semua data
        // $this->rumpun = Rumpun::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->rumpun = Rumpun::onlyTrashed()->get();
        

        return view('livewire.rumpun.index')->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            Rumpun::find($id)->delete();
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
