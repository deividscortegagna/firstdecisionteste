<?php

namespace App\Livewire;

use Livewire\Component;
use App\UserService;

class RegisterUser extends Component
{
    public $name, $email, $password, $password_confirmation;

    protected $rules = [
        'name' => [
            'required',
            'min:3',
            'max:50',
            'regex:/^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/',
        ],
        'email' => [
            'required',
            'email',
            'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'unique:users,email',
        ],
        'password' => 'required|min:6|max:20|confirmed',
    ];
    

    public function register()
    {
        $this->validate();
        
        app(\App\UserService::class)->createUser([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        
        session()->flash('success', 'User registered successfully!');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register-user')->layout('layouts.app');
    }    
}

