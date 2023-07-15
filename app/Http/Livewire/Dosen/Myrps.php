<?php

namespace App\Http\Livewire\Dosen;

use Livewire\Component;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Illuminate\Support\Facades\Auth;

class Myrps extends Component
{
    public $resultrps, $result, $resultpustaka, $userlogin, $pengembangIds;

    public function render()
    {
        $this->result = Pertemuan::with("rp")->get();
        $this->resultrps = RP::select('*')->get();
        $this->resultpustaka = Pustaka::select('*')->get();
        $this->userlogin = Auth::id();
        $this->pengembangIds = $this->resultrps->pluck('pengembang_id')->all();
        return view('livewire.dosen.myrps')->extends('layouts.main2')->section('content');
    }
}
