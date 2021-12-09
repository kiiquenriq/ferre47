<?php

namespace App\Http\Livewire\Admin\Partials;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;

class QtyUpdate extends Component
{
    public $rowId, $qty;
    public $quantity;

    public function mount(){
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
       
        $this->quantity = qty_available($item->id);
    }
    public function cantidad(){
        $this->qty= $this->qty ;

        Cart::update($this->rowId, $this->qty);
        $this->emit('render');
    }
    public function render()
    {
     
        
        return view('livewire.admin.partials.qty-update');
    }
}
