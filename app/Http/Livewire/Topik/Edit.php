<?php

namespace App\Http\Livewire\Topik;

use Illuminate\Http\Request; 
use Livewire\Component;
use App\Models\Topik;

class Edit extends Component
{
    public $topik, $topikId;
    public $updateTopik = false;

    protected $rules = [
        'topik'=>'required',
    ];

    public function render()
    {
        return view('livewire.topik.edit')->extends('layouts.main')->section('content');
    }

    public function mount($id)
    {
        $topic = Topik::find($id);
        if($topic) {
            $this->topikId = $topic->id;
            $this->topik = $topic->topik;
        }
    }

    public function update()
    {
        // dd("Method update is called!");
        $this->validate();

        if($this->topikId) {
            $topic = Topik::find($this->topikId);
            if($topic) {
                $topic->update([
                    'topik' => $this->topik
                ]);
            }
        }
        session()->flash('message', 'Updated Successfully!!');
        return redirect()->route('topikindex');
    }
}
