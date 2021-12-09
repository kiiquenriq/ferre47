<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class UsersEdit extends Component
{
    public $user;
    public $name, $email, $password, $telefono, $address, $state, $city, $colonia, $cp , $references;

    public function mount(User $user){
        $this->user = $user;
        
    }
    public function assignRole(User $user, $value){
        if($value == '1' ){
            $user->assignRole('admin');
        } else {
            $user->removeRole('admin');
        }
    }
    public function update() {
        

       
       
            $this->user->name = $this->name;
           
            
            $this->user->telefono = $this->telefono;
            $this->user->address = $this->address;
            $this->user->state = $this->state;
            $this->user->city = $this->city;
            $this->user->colonia = $this->colonia;
            $this->user->cp = $this->cp;
            $this->user->references = $this->references;

        $this->user->save();

      


        return redirect()->route('admin.users');
    }
    
    public function render()
    {
       
        return view('livewire.admin.users-edit')->layout('layouts.admin');
    }
}
