<?php

namespace App\Http\Livewire\Auth;

use App\Models\Pelanggan;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUser extends Component
{

    
    public $email, $password, $password_confirm;

    public $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'password_confirm' => 'required|same:password',
    ];

    public $nama_lengkap, $alamat, $no_hp;

    public function registerUser()
    {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            // 'password' => Hash::make($this->password),
            'password' => Hash::make($this->password),
            'level' => 'pelanggan',
            'aktif' => 1,
        ]);

        $lastUser = User::orderBy('id', 'desc')->get();

        $pelanggan = Pelanggan::create([
            'nama_lengkap' => $this->nama_lengkap,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'id_user' => $lastUser[0]->id
        ]);
        
        Auth::login($user, true);
        return redirect()->to('/');
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Register Successfully']);
    }

    public function render()
    {
        return view('livewire.auth.register-user')->extends('layouts.app');
    }
}
