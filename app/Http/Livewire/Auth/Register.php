<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use App\Providers\RouteServiceProvider;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.app')->section('content');
    }

    Public function registerUser()
         {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        // Login pengguna
        Auth::login($user);

        // Redirect ke halaman home
        return redirect()->to('/home');
    }
}