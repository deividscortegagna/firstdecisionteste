<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    public $showConfirmationModal = false;
    public $showEditModal = false;
    public $editForm = [
        'name' => '',
        'email' => '',
        'current_password' => '',
        'new_password' => '',
    ];

    public function openConfirmationModal()
    {
        $this->showConfirmationModal = true;
    }

    public function closeConfirmationModal()
    {
        $this->showConfirmationModal = false;
    }

    public function confirmDeletion()
    {
        $user = Auth::user();
        $user->delete();
        Auth::logout();
        session()->flash('success', 'Conta excluída com sucesso.');
        return redirect()->route('login');
    }

    public function openEditModal()
    {
        $user = Auth::user();
        $this->editForm['name'] = $user->name;
        $this->editForm['email'] = $user->email;
        $this->showEditModal = true;
    }

    public function closeEditModal()
    {
        $this->reset('editForm');
        $this->showEditModal = false;
    }

    public function updateAccount()
    {
        $this->validate([
            'editForm.name' => 'required|min:3|max:50',
            'editForm.email' => 'required|email|unique:users,email,' . Auth::id(),
            'editForm.current_password' => 'required',
            'editForm.new_password' => 'nullable|min:6|max:20',
        ]);

        $user = Auth::user();

        if (!Hash::check($this->editForm['current_password'], $user->password)) {
            $this->addError('editForm.current_password', 'A senha atual está incorreta.');
            return;
        }

        $user->update([
            'name' => $this->editForm['name'],
            'email' => $this->editForm['email'],
            'password' => $this->editForm['new_password'] ? bcrypt($this->editForm['new_password']) : $user->password,
        ]);

        session()->flash('success', 'Dados atualizados com sucesso.');
        $this->closeEditModal();
    }

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.user-list', [
            'users' => $users,
        ])->layout('layouts.dashboard');
    }
}
