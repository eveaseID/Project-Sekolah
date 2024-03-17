<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginUser extends Component
{
    public $email, $password;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function loginUser()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            if (Auth::user()->level != 'pelanggan') {
                redirect()->to('dashboard');
            } else {
                redirect()->to('/');
            }
            $this->dispatchBrowserEvent('showSuccess', ['title' => 'Login Successfully']);
        } else {
            // $this->addError('email',__('auth.failed'));
            $this->dispatchBrowserEvent('showError', ['title' => 'Login Failed', 'type' => 'error']);
            $this->password = null;

        }
    }

    public function render()
    {
        return view('livewire.auth.login-user')->extends('layouts.app');
    }
}
