<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginUser extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6|max:20',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            session()->flash('success', 'Login realizado com sucesso!');
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Credenciais inválidas.');
    }

    public function render()
    {
        return view('livewire.login-user')->layout('layouts.app');
    }
}
