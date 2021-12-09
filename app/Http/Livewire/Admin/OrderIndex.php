<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class OrderIndex extends Component
{
    public $search, $data, $sav, $usuarios, $cliente;

  

    protected $listeners = [
        'render',
        'scan-code' => 'render',
        'update' => 'update'
    ];

    public function mount(){
        $this->usuarios  = User::all();
    }

    public function render()
    {
        
        // $codigo= $request;
        //  $user = User::where('id',"=", $codigo)->first();
        //  if ($user){
        //      return redirect('admin/orders/'.$user);
        //  }
        

        $users = User::where('name' , 'like','%'. $this->search . '%')
            ->orWhere('id' , 'like','%'. $this->search . '%')->get();
        return view('livewire.admin.order-index', compact('users'))->layout('layouts.admin');
    }
}
