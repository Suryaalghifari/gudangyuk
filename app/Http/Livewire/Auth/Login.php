<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Login extends Component
{

    public $email, $password;
    public function render()
    {
       return view('livewire.auth.login')->extends('layouts.app')->section('content');
    }
}
