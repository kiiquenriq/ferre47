<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{

    public $name, $email, $password, $telefono, $address, $state, $city, $colonia, $cp , $references;
    public function update() {
        

        $user = new User();
       
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->telefono = $this->telefono;
            $user->address = $this->address;
            $user->state = $this->state;
            $user->city = $this->city;
            $user->colonia = $this->colonia;
            $user->cp = $this->cp;
            $user->references = $this->references;

        $user->save();

      


        return redirect()->route('admin.index');
    }
    public function render()
    {
        return view('livewire.admin.user-create')->layout('layouts.admin');
    }
}
