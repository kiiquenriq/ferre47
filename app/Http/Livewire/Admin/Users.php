<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
     public $search;
    public function render()
    {
       

        $users = User::where('name', 'LIKE', '%' .$this->search. '%')->paginate(10);
        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
