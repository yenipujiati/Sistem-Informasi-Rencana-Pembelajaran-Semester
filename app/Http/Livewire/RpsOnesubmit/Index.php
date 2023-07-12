<?php

namespace App\Http\Livewire\RpsOnesubmit;

use Livewire\Component;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Illuminate\Support\Facades\DB;


class Index extends Component
{
    public $resultrps, $result, $resultpustaka;
    // public $data, $datas;

    protected $listeners = [
        'deleteRpsOnesubmit'=>'destroy'
    ];

    public function render()
    {
        // menampilkan data deleted_at=null
        // $this->rps = RP::select('id','matakuliah_id','pengembang_id','koordinator_id','kaprodi_id','cpl_id','deskripsi_singkat','pustaka_id','mp_software','mp_hardware','pengampu_id','matakuliah_syarat_id','pertemuan_id')->get();
        
        // tampilkan semua data
        // $this->rps = CPL::withTrashed()->get();

        // tampilkan data yg dihapus
        // $this->rps = CPL::onlyTrashed()->get();
            $this->result = Pertemuan::with("rp")->get();
            $this->resultrps = RP::select('*')->get();
            $this->resultpustaka = Pustaka::select('*')->get();
           
            // $matakuliah = Matakuliah::where('id', $this->resultrps->first()->matakuliah_id)->get();
            // $pengembang = User::where('id', $this->resultrps->first()->pengembang_id)->get();
            // $kaprodi = User::where('id', $this->resultrps->first()->kaprodi_id)->get();
            // $koordinator = User::where('id', $this->resultrps->first()->koordinator_id)->get();
            // $matakuliah_syarat = Matakuliah::where('id', $this->resultrps->first()->matakuliah_syarat_id)->get();
            // $pengampu = User::where('id',$this->resultrps->first()->pengampu_id)->get();
            // // dd($matakuliah);
            // $cpls = explode(",", $this->resultrps->first()->cpl_ids);
            // $cplData = []; 

            // foreach($cpls as $cpl){
            //     $CPL = CPL::where('id', $cpl)->get();
            //     $cplData[] = $CPL; 
            // }

            // $this->data = [
            //     // 'jenis' => $this->resultpustaka->jenis,
            //     // 'sumber' => $this->resultpustaka->sumber,
            //     'matakuliah' => $matakuliah,
            //     'pengembang' => $pengembang,
            //     'koordinator' => $koordinator,
            //     'kaprodi' => $kaprodi,
            //     'deskripsi_singkat' => $this->resultrps->first()->deskripsi_singkat,
            //     'pustaka_id' => $this->resultrps->first()->pustaka_id,
            //     'mp_software' => $this->resultrps->first()->mp_software,
            //     'mp_hardware' => $this->resultrps->first()->mp_hardware,
            //     'pengampu' => $pengampu,
            //     'matakuliah_syarat' => $matakuliah_syarat,
            //     'pertemuan' => $this->result,
            //     'cpls' => $cplData,
            // ];

            // $this->datas = RP::select(
            //     'rumpuns.nama',
            //     DB::raw('DATE(rps.created_at) AS created_date'),
            //     )
            // ->join('matakuliahs', 'rps.matakuliah_id', '=', 'matakuliahs.id')
            // ->join('rumpuns', 'matakuliahs.rumpun_id' , '=', 'rumpuns.id')
            // ->first();
        

        
        
        return view('livewire.rps-onesubmit.index', 
        // compact('data','datas')
        // )->with(
            // ['data' => $this->data, 
            // 'datas' => $this->datas, 
        //     // 'cplData' => $cplData
            // ]
            )
        ->extends('layouts.main')->section('content');
    }

    public function destroy($id){
        try{
            RP::find($id)->delete();
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
