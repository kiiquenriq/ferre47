<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItem extends Component
{
    public $rowId, $qty ;
    public $quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        // $this->prueba= Product::where('id');
       
        $this->quantity = qty_available($item->id);
    }
    public function cantidad(){
        $this->qty= $this->qty ;

        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.update-cart-item');
    }
}
