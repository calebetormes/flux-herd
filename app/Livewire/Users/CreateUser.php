<?php

namespace App\Livewire\Users;

use App\Models\User;
use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $role_id = 3;

    public function salvar()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role_id' => $this->role_id,
        ]);

        $this->reset();
        session()->flash('success', 'Usuário cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.users.create-user');
    }
}
