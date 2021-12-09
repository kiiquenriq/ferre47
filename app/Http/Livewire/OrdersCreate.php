<?php

namespace App\Http\Livewire;

use App\Models\Address;
use App\Models\City;
use App\Models\Department;
use App\Models\Disctrict;
use App\Models\Order;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class OrdersCreate extends Component
{
    public $envio_type = 1;
    // public $departments, $cities, $disctricts;
    public $references, $address, $user;
    public $users, $telefono, $name, $estado, $ciudad, $colonia, $cp;

    public $shipping_cost = 0;

    protected $rules = [
        'name' => 'required',
        'telefono' => 'required',
        'envio_type' => 'required',
    ];
    public $department_id="", $city_id="", $disctrict_id="";
    public function mount(){


        $this->addresses = User::all();
        // $this->users = User::all();
      $this->name= auth()->user()->name;
      $this->telefono= auth()->user()->telefono;
      $this->estado= auth()->user()->state;
      $this->city= auth()->user()->city;
      $this->colonia= auth()->user()->colonia;
      $this->cp= auth()->user()->cp;
      $this->address= auth()->user()->address;
      $this->references= auth()->user()->references;

    }

    public function create_order(){
        $this->validate();
        $total = $this->shipping_cost + Cart::subtotal(2,'.','');

        
        $order = new Order();
        
        $order->user_id = auth()->user()->id;
        $order->Acuenta = $total;
        $order->name = $this->name;
        $order->address = $this->address;
        $order->references = $this->references;
        $order->cp = $this->cp;
        $order->state = $this->estado;
        $order->city = $this->city;
        $order->colonia = $this->colonia;
        $order->telefono = $this->telefono;
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = $this->shipping_cost;
        $order->total = $total;
        $order->content = Cart::content();
        $order->entregado = Cart::content();

        $order->save();
        foreach(Cart::content() as $item ){
            discount($item); //helper descontar stock
        }

        Cart::destroy();

        return redirect()->route('orders.payment', $order);

    }


    public function render()
    {
        return view('livewire.orders-create')->layout('layouts.app');
    }
}
