<?php

namespace App\Http\Livewire\Dosen\RpsOnesumbit;

use Livewire\Component;
use App\Models\Pustaka;
use App\Models\Pertemuan;
use App\Models\RP;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // public $resultrps, $result, $resultpustaka;
    protected $resultrps;
    public $result;
    public $resultpustaka;

    public function render()
    {
        $this->result = Pertemuan::with("rp")->get();
        $this->resultrps = RP::select('*')->paginate(5);
        $this->resultpustaka = Pustaka::select('*')->get();
        return view('livewire.dosen.rps-onesumbit.index', [
            'resultrps' => $this->resultrps,
        ])->extends('layouts.main2')->section('content');
    }
}
