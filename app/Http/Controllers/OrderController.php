<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   
    public function payment(Order $order){
        $this->authorize('author', $order);
        $this->authorize('payment', $order);
        $items = json_decode($order->content);
        return view('orders.payment', compact('order', 'items'));
    }


    public function show( Order $order) {

        $this->authorize('author', $order);
       
        $items = json_decode($order->content);
        return view('orders.show', compact('order', 'items'));
    }

    public function index(){
        $cobrar = Order::where('status_paid', 8)->where('user_id', auth()->user()->id )->count();
        $pagado = Order::where('status_paid', 7)->where('user_id', auth()->user()->id )->count();
        $cancelado = Order::where('status_paid', 6)->where('user_id', auth()->user()->id )->count();
        $procesando = Order::where('status_paid', 5)->where('user_id', auth()->user()->id )->count();
        $total = Order::where('status_paid', 8)->where('user_id', auth()->user()->id )->sum('total');

        $orders = Order::query()->where('user_id', auth()->user()->id );
        
    
        if(request('status')) {
            $orders->where('status_paid', request('status') );
        }

        $orders = $orders->latest()->take(30)->get();

        


        return view('orders.index', compact('orders','cobrar', 'pagado', 'cancelado', 'procesando', 'total'));
    }
}
