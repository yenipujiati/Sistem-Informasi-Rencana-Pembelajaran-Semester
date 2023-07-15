<?php

namespace App\Http\Livewire\RpsOnesubmit;

use Livewire\Component;
use App\Models\Matakuliah;
use App\Models\User;
use App\Models\CPL;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Dompdf\Dompdf;
use Dompdf\Options;
use \Exception;
use Illuminate\Support\Facades\DB;

class Detail extends Component
{
    public $resultrps, $result, $resultpustaka;
    public $data, $datas, $kategorijoin;
    public $rpsId;

    public function mount($id)
    {
        $this->rpsId = $id;
    }

    public function render()
    {
        $this->result = Pertemuan::with("rp")->get();
        $this->resultrps = RP::select('*')->get();
        $this->resultpustaka = Pustaka::select('*')->get();

        $resultrps = $this->resultrps->where('id', $this->rpsId)->first();
        if ($resultrps) {
            $matakuliah = Matakuliah::find($resultrps->matakuliah_id);
            $pengembang = User::find($resultrps->pengembang_id);
            $kaprodi = User::find($resultrps->kaprodi_id);
            $koordinator = User::find($resultrps->koordinator_id);
            $matakuliah_syarat = Matakuliah::find($resultrps->matakuliah_syarat_id);
            $pengampu = User::find($resultrps->pengampu_id);
            $pustaka = Pustaka::find($resultrps->pustaka_id);

            $cpls = explode(",", $resultrps->cpl_ids);
            $cplData = [];

            foreach ($cpls as $cpl) {
                $CPL = CPL::find($cpl);
                $cplData[] = $CPL;
            }

            $this->data = [
                'pustaka' => $pustaka,
                'matakuliah' => $matakuliah,
                'pengembang' => $pengembang,
                'koordinator' => $koordinator,
                'kaprodi' => $kaprodi,
                'deskripsi_singkat' => $resultrps->deskripsi_singkat,
                'pustaka_id' => $resultrps->pustaka_id,
                'mp_software' => $resultrps->mp_software,
                'mp_hardware' => $resultrps->mp_hardware,
                'pengampu' => $pengampu,
                'matakuliah_syarat' => $matakuliah_syarat,
                'pertemuan' => Pertemuan::where('rps_id', $resultrps->id)->get(),
                'cpls' => $cplData,
                'cp_mk' => $resultrps->cp_mk,
            ];

            $this->datas = RP::select(
                'rumpuns.nama',
                DB::raw('DATE(rps.created_at) AS created_date')
            )
                ->join('matakuliahs', 'rps.matakuliah_id', '=', 'matakuliahs.id')
                ->join('rumpuns', 'matakuliahs.rumpun_id', '=', 'rumpuns.id')
                ->first();
            
            $this->kategorijoin = RP::select(
                'kategoris.singkatan',
            )
                ->join('c_p_l_s', 'rps.cpl_id', '=', 'c_p_l_s.id')
                ->join('kategoris', 'c_p_l_s.kategori_id', '=', 'kategoris.id')
                ->get();

            return view('livewire.rps-onesubmit.detail')->extends('layouts.main')->section('content2');
        }
    }

    public function printPDF()
    {
        try {
            $datajoin = RP::select(
                'rumpuns.nama',
                DB::raw('DATE(rps.created_at) AS created_date')
            )
                ->join('matakuliahs', 'rps.matakuliah_id', '=', 'matakuliahs.id')
                ->join('rumpuns', 'matakuliahs.rumpun_id', '=', 'rumpuns.id')
                ->where('rps.id', $this->rpsId)
                ->first();
            $options = new Options();
            $options->set('defaultFont', 'Arial');
            $dompdf = new Dompdf($options);
            $html = view('livewire.rps-onesubmit.pdf')
            ->with(
                ['data' => $this->data, 'datajoin' => $datajoin]
            )
            ->render();
            $dompdf->loadHTML($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $pdfOutput = $dompdf->output();
            $pdfFile = 'Downloads';
            file_put_contents($pdfFile, $pdfOutput);
            return response()->download($pdfFile, 'RPS-Informatika.pdf');
        } catch (\Exception $e) {
            // Handle the exception here
            $this->dispatchBrowserEvent('alert',[
                'type'=>'failed',
                'message'=>"Something goes wrong!!"
            ]);
            // dd($e->getMessage());
        }
    }
}
