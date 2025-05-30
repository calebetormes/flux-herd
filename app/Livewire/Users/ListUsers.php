<?php

namespace App\Livewire\Users;

use Livewire\Component;

use App\Models\User;

class ListUsers extends Component
{
    public $users;
    
    public function mount()
    {
        $this->users = User::with('role')->get();
    }

    public function render()
    {
        return view('livewire.users.list-users');
    }
}
