<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AtendOrder extends Component
{
    public $orders, $items, $products, $noti="", $idd , $barcode;

    public $name;
    protected $listeners = [
        'render',
        'scan-code' => 'order',
        'update' => 'update'
    ];
    protected $rules = [
        'quantity' => 'required'
    ];

    public function order($barcode) {
        $this->noti = "";
        $this->barcode = $barcode;
        
        $this->order = Order::where('id', $barcode)->first();//optional
        // $this->name = $this->order->name;
        // dd($this->order);
        $this->idd = $this->order->id;
        
       
        
    }
  
    public function render()
    {

        return view('livewire.admin.atend-order' )->layout('layouts.admin');
    }
}
