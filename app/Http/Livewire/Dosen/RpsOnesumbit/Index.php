<?php

namespace App\Http\Livewire\Dosen\RpsOnesumbit;

use Livewire\Component;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;

class Index extends Component
{
    public $resultrps, $result, $resultpustaka;

    public function render()
    {
        $this->result = Pertemuan::with("rp")->get();
        $this->resultrps = RP::select('*')->get();
        $this->resultpustaka = Pustaka::select('*')->get();
        return view('livewire.dosen.rps-onesumbit.index')->extends('layouts.main2')->section('content');
    }
}
