<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public function deleteAccount()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        session()->flash('success', 'Conta excluída com sucesso.');
        return redirect()->route('login');
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-list', [
            'users' => $users,
        ])->layout('layouts.dashboard');
    }    
}
