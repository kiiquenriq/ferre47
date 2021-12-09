<?php

namespace App\Http\Livewire\Admin\Partials;

use App\Models\Product;
use Livewire\Component;

class QtyInventory extends Component
{
    public $product,$cantidad, $qty;
   
    public function updateQuantity($idd){
        $this->product = Product::where('id', $idd)->first();
        $this->qty = $this->product->quantity + $this->cantidad;

    }

    public function update(){
        $this->product->quantity = $this->qty->save();
    }
    public function render()
    {
        
        return view('livewire.admin.partials.qty-inventory');
    }
}
