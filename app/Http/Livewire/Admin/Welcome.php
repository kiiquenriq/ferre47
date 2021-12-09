<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Welcome extends Component
{
    public function render()
    {
        return view('livewire.admin.welcome')->layout('layouts.admin');
    }
}
