<?php

namespace App\Http\Livewire;

use App\Models\Color;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItemColor extends Component
{

    public $rowId, $qty;
    public $quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        $color = Color::where('name', $item->options->color)->first();


        $this->quantity = qty_available($item->id, $color->id);

    }
    public function cantidad(){
        $this->qty= $this->qty ;

        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }
    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}
