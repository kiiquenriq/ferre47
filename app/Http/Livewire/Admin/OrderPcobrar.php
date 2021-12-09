<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;

class OrderPcobrar extends Component
{
    public function render(User $users, Order $order)
    {
        
        $users= User::where("id", "=", $order->id)->get();
        $orders = Order::query()->where('user_id', $order->id );
        
    
        if(request('status')) {
            $orders->where('status_paid', request('status') );
        }

        // $orders = $orders->latest()->take(30)->get();


        return view('livewire.admin.order-pcobrar', compact('orders'))->layout('layouts.admin');
    }
}
