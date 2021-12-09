<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product,$quantity;
    public $qty = 1;

    public $cant = 1;
    public $options =[
        'color_id'=> null,
        'size_id' => null,
        'codigo'=> null, 
        'barcode'=> null, 

    ];

    public function mount(){
        $this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
        $this->options['codigo'] = $this->product->codigo;
        $this->options['barcode'] = $this->product->barcode;
    }

    // public function decrement(){
    //     $this->qty = $this->qty - 1; 
    // }
    // public function decrement_5(){
    //     $this->qty = $this->qty - 5; 
    // }
    // public function increment(){
    //     $this->qty = $this->qty + 1; 
    // }
    // public function increment_5(){
    //     $this->qty = $this->qty + 5; 
    // }

    public function cantidad(){
        $this->qty= $this->qty ;
    }

    public function addItem(){
        Cart::add([
            'id' => $this->product->id, 
            'name' => $this->product->name, 
            'qty' => $this->qty, 
            'price' => $this->product->price, 
            'weight' => 550,
            'codigo' => $this->product->codigo,
            'barcode' => $this->product->barcode,
            'options' => $this->options
            
        ]);
        $this->quantity = qty_available($this->product->id);
        $this->reset('qty');
        $this->emitTo('dropdown-cart', 'render');
        $this->emitTo('cart-movil', 'render');
    }

    public function render()
    {
        
        return view('livewire.add-cart-item');
    }
}
