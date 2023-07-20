<?php

namespace App\Http\Livewire\RpsOnesubmit;

use Livewire\Component;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Myrps extends Component
{
    use WithPagination;

    protected $resultrps;
    public $result, $resultpustaka, $userlogin, $pengembangIds;
    // public $data, $datas;
    
    public function render()
    {
        $this->result = Pertemuan::with("rp")->get();
        $this->resultrps = RP::select('*')->paginate(5);
        $this->resultpustaka = Pustaka::select('*')->get();
        $this->userlogin = Auth::id();
        $this->pengembangIds = $this->resultrps->pluck('pengembang_id')->all();
        // dd($this->pengembangIds);
        return view('livewire.rps-onesubmit.myrps', [
            'resultrps' => $this->resultrps,
        ])->extends('layouts.main')->section('content');
    }
}
