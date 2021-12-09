<?php

namespace App\Http\Livewire\Admin;

use App\Models\Count;
use App\Models\Order;
use App\Models\Paid;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class OrderDetail extends Component
{
    
    public $update, $users, $no, $product, $prueba;
    protected $listeners = [
        'update',
        'scan-code' => 'scanCode',
        
    ];

    public function scanCode($barcode) {
        $this->product = Product::where('barcode', $barcode)
        ->orWhere('codigo', $barcode)->first(); //optional

        //  $this->quantity= Product::where('barcode', $barcode )->first()->qty; 
        $this->prueba = $this->product['quantity'];

        dd($this->product);
    }

    public function update(){
        print($this->update);
    }

   
    public function render(Order $order , User $user)
    {
        $this->users= User::where("id", "=", $order->user_id)->get();
        $pagos = Paid::where('order_id', $order->id)->get();
        $users=$this->users;
        
        $orders = Order::query()->where('user_id', $order->id );
        $count = Count::where('order_id', $order->id)->get();
        
        
    
        if(request('status')) {
            $orders->where('status_paid', request('status', 'update') );
        }

        $orders = $orders->latest()->take(30)->get();

        $items = json_decode($order->content);
        $array = $count;
        

        
        return view('livewire.admin.order-detail', compact('order', 'items', 'array', 'pagos'));
    }

    
}