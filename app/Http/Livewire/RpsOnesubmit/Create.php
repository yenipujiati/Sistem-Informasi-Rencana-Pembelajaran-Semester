<?php

namespace App\Http\Livewire\RpsOnesubmit;

use App\Models\Topik;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Dompdf\Dompdf;
use Dompdf\Options;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    //rps
    public $matakuliah_id, $pengembang_id, $koordinator_id, $kaprodi_id, $deskripsi_singkat, $pustaka_id, $mp_software, $mp_hardware, $pengampu_id, $matakuliah_syarat_id;
    public $cpl_id = [];

    //pustaka
    public $jenis, $sumber;

    //pertemuan
    public $minggu_ke, $kemampuan_akhir, $bahan_kajian, $metode_pembelajaran, $waktu, $pengalaman_belajar, $bobot_nilai, $topik_id;
    public $pertemuan = [];

    public $currentStep = 1;

    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'matakuliah_id'=>'required',
            'pengembang_id'=>'required',
            'koordinator_id'=>'required',
            'kaprodi_id'=>'required',
            'deskripsi_singkat'=>'required',
            'mp_software'=>'required',
            'mp_hardware'=>'required',
            'pengampu_id'=>'required',
            'matakuliah_syarat_id'=>'required',
        ]);
  
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'cpl_id'=>'required|array',
        ]);
   
        $this->currentStep = 3;
    }

    public function thirdthStepSubmit()
    {
        $validatedData = $this->validate([
            'jenis'=>'required',
            'sumber'=>'required',
        ]);
   
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        $validatedData = $this->validate([
            'pertemuan.*.minggu_ke'=>'required',
            'pertemuan.*.kemampuan_akhir'=>'required',
            'pertemuan.*.bahan_kajian'=>'required',
            'pertemuan.*.metode_pembelajaran'=>'required',
            'pertemuan.*.waktu'=>'required',
            'pertemuan.*.pengalaman_belajar'=>'required',
            'pertemuan.*.bobot_nilai'=>'required',
            'pertemuan.*.topik_id'=>'required',
        ]);
   
        $this->currentStep = 5;
    }

    public function back($step)
    {
        $this->currentStep = $step;    
    }

    public function addPertemuan()
    {
        $this->pertemuan[] = [
            'minggu_ke' => $this->minggu_ke,
            'kemampuan_akhir' => $this->kemampuan_akhir,
            'bahan_kajian' => $this->bahan_kajian,
            'metode_pembelajaran' => $this->metode_pembelajaran,
            'waktu' => $this->waktu,
            'pengalaman_belajar' => $this->pengalaman_belajar,
            'bobot_nilai' => $this->bobot_nilai,
            'topik_id' => $this->topik_id,
        ];
    }

    public function removePertemuan($index)
    {
        unset($this->pertemuan[$index]);
        $this->pertemuan = array_values($this->pertemuan);
    }

    public function store(){
        
        try{
            // dd($this->cpl_id);
            // $string = "";
            // foreach($this->cpl_id as $id){
            //     // $string = $string . $id;
            //     $string .= $id . ",";
            // }
            $string = implode(',', $this->cpl_id);
            
            //pustaka
            $idPustaka = Pustaka::create([
                'jenis'=>$this->jenis,
                'sumber'=>$this->sumber
            ]);

            $this->pustaka_id = $idPustaka->id;
                $rps = RP::create([
                    'matakuliah_id' => $this->matakuliah_id,
                    'pengembang_id' => $this->pengembang_id,
                    'koordinator_id' => $this->koordinator_id,
                    'kaprodi_id' => $this->kaprodi_id,
                    'cpl_id' => $this->cpl_id[0],
                    'deskripsi_singkat' => $this->deskripsi_singkat,
                    'pustaka_id' => $this->pustaka_id,
                    'mp_software' => $this->mp_software,
                    'mp_hardware'=>$this->mp_hardware,
                    'pengampu_id' => $this->pengampu_id,
                    'matakuliah_syarat_id' => $this->matakuliah_syarat_id,
                    'cpl_ids' => $string,
                ]);

            $pertemuan = [];
            foreach($this->pertemuan as $data){
                $pertemuans = Pertemuan::create([
                    'matkul_id' => $this->matakuliah_id,
                    "minggu_ke" => $data['minggu_ke'],
                    "kemampuan_akhir" => $data['kemampuan_akhir'],
                    "bahan_kajian" => $data['bahan_kajian'],
                    "metode_pembelajaran" => $data['metode_pembelajaran'],
                    "waktu" =>  $data['waktu'],
                    "pengalaman_belajar" => $data['pengalaman_belajar'],
                    "bobot_nilai" => $data['bobot_nilai'],
                    "topik_id" => $data['topik_id'],
                    "rps_id" => $rps['id']
                ]);
                $pertemuan[] = $pertemuans;
            }
            $matakuliah = Matakuliah::where('id', $rps->matakuliah_id)->first();
            $pengembang = User::where('id', $rps->pengembang_id)->first();
            $kaprodi = User::where('id', $rps->kaprodi_id)->first();
            $koordinator = User::where('id', $rps->kaprodi_id)->first();
            $matakuliah_syarat = Matakuliah::where('id', $rps->matakuliah_syarat_id)->first();
            $pengampu = User::where('id', $rps->pengampu_id)->first();
            // dd($matakuliah->nama);
            $cpls = explode(",", $rps->cpl_ids);
            $cplData = []; 

            foreach($cpls as $cpl){
                $CPL = CPL::where('id', $cpl)->first();
                $cplData[] = $CPL; 
            }

            $data = [
                'jenis' => $idPustaka->jenis,
                'sumber' => $idPustaka->sumber,
                'matakuliah' => $matakuliah,
                'pengembang' => $pengembang,
                'koordinator' => $koordinator,
                'kaprodi' => $kaprodi,
                'deskripsi_singkat' => $rps->deskripsi_singkat,
                'pustaka_id' => $rps->pustaka_id,
                'mp_software' => $rps->mp_software,
                'mp_hardware' => $rps->mp_hardware,
                'pengampu' => $pengampu,
                'matakuliah_syarat' => $matakuliah_syarat,
                'pertemuan' => $this->pertemuan,
                'cpls' => $cplData,
            ];

            $datas = RP::select(
                'rumpuns.nama',
                DB::raw('DATE(rps.created_at) AS created_date'),
                )
            ->join('matakuliahs', 'rps.matakuliah_id', '=', 'matakuliahs.id')
            ->join('rumpuns', 'matakuliahs.rumpun_id' , '=', 'rumpuns.id')
            ->first();

            // $cplData = DB::table('c_p_l_s')
            // ->select('c_p_l_s.kode', 'c_p_l_s.deskripsi')
            // ->whereExists(function ($query) {
            //     $query->select(DB::raw(1))
            //         ->from('rps')
            //         ->whereRaw('rps.cpl_id = c_p_l_s.id');
            // })
            // ->get();

            // dd($datas);
            
            $options = new Options();
            $options->set('defaultFont', 'Arial');
            $dompdf = new Dompdf($options);
            $html = view('livewire.rps-onesubmit.cetakpdf')->with(
                ['data' => $data, 
                'datas' => $datas, 
                // 'cplData' => $cplData
                ]
                )->render();
            $dompdf->loadHTML($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $pdfOutput = $dompdf->output();
            $pdfFile = 'Downloads';
            file_put_contents($pdfFile, $pdfOutput);
            return response()->download($pdfFile, 'RPS-Informatika.pdf');
        }catch(\Exception $e){
            dd($e);
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something goes wrong while creating!!"
            ]);
            return redirect()->route('rpsonesubmitindex');
        }
        $this->currentStep = 1;
    }

    public function render()
    {
        $matakuliah = Matakuliah::all();
        $user = User::all();
        $cpl = CPL::all();
        $pustaka = Pustaka::all();
        $pertemuan = Pertemuan::all();
        $topik = Topik::all();
        return view('livewire.rps-onesubmit.create', compact('matakuliah','user','cpl','pustaka','pertemuan','topik'))->extends('layouts.main')->section('content');
    }
}
