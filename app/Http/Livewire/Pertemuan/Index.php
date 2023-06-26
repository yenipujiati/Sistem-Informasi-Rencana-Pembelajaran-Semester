<?php

namespace App\Http\Livewire\Pertemuan;

use App\Models\Pertemuan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $pertemuan;

    protected $listeners = [
        'deletePertemuan'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        $this->pertemuan = Pertemuan::select('id','minggu_ke','kemampuan_akhir','bahan_kajian','metode_pembelajaran','waktu','pengalaman_belajar','bobot_nilai','topik_id')->paginate(5);

        // tampilkan semua data
        // $this->pertemuan = Pertemuan::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->pertemuan = Pertemuan::onlyTrashed()->get();

        return view('livewire.pertemuan.index', [
            'pertemuan' => $this->pertemuan
        ])->extends('layouts.main')->section('content');

        // return view('livewire.pertemuan.index')->extends('layouts.main')->section('content');
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
