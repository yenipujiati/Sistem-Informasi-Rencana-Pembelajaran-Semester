<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\RateLimiter;

class Login extends Component
{
    public $nidn, $password, $remember;

    public function render()
    {
        return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }

    public function login()
    {
        $this->validate([
            'nidn'     => 'required',
            'password'  => 'required'
        ]);
        
        if(Auth::attempt(['nidn' => $this->nidn, 'password'=> $this->password])) {
            $user = Auth::user();
            if($user->roles === 'dosen') {
                return redirect()->to(RouteServiceProvider::DOSENHOME);
            }else{
                return redirect()->to(RouteServiceProvider::HOME);
            }
        } else {
            session()->flash('error', 'NIDN atau kata sandi yang anda inputkan salah!');
            return redirect()->route('login');
        }
    }
}
