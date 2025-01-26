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
    
        $user = \App\Models\User::where('email', $this->email)->first();
        dd([
            'attempt' => Auth::attempt(['email' => $this->email, 'password' => $this->password]),
            'user' => $user,
            'password_check' => $user ? \Illuminate\Support\Facades\Hash::check($this->password, $user->password) : null,
        ]);
    
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            session()->flash('success', 'Login successful!');
            return redirect()->route('dashboard');
        }
    
        session()->flash('error', 'Invalid credentials.');
    }      

    public function render()
    {
        return view('livewire.login-user')->layout('layouts.app');
    }  
}
