<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderShow extends Component
{

    public $users , $orders;
    public function mount(User $order) {
            // dd($order);
            // $search = "";
            $this->users= User::where("id", "=", $order->id)->first();

            $this->orders = Order::where('user_id', $this->users->id)->get();
            
            
            // dd($orders);
        
            // if(request('status')) {
            //     $orders->where('status_paid', request('status') );
            // }
    
            // $orders = $orders->latest()->take(30)->get();
    
    }
    public function render()
    {  
        return view('admin.orders.show')->layout('layouts.admin');
    }
}
