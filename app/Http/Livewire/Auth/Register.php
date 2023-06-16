<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\User;

class Register extends Component
{

    public $name, $email, $nidn, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }

    public function rules() 
    {
        return [
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'nidn' => ['required','unique:users'],
            'password' => ['required','confirmed'],
        ];
    }

    public function registerDosen() 
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'nidn' => $this->nidn,
            'password' => bcrypt($this->password),
        ]);
        Auth::login($user, true);
        return redirect()->to(RouteServiceProvider::HOME);
    }
}
