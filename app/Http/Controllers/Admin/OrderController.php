<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    // public function updatingSearch(){
    //     $this->resetPage();
    // }
    public function index(){
         $search="";

        $users = User::where('name' , 'like','%'. $search . '%')->paginate(10);
        return view('admin.orders.index', compact('users')); 
    }
    
    public function show(User $users, Order $order){
        dd($users);
        $search = "";
        $users= User::where("id", "=", $order->id)->get();
        $orders = Order::where('user_id', $order->id );
        
    
        if(request('status')) {
            $orders->where('status_paid', request('status') );
        }

        $orders = $orders->latest()->take(30)->get();


        return view('admin.orders.show', compact('users', 'orders', 'order')); 
    }
}
