<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class UpdatePrice extends Component
{
    public $product, $cantidad, $idd;
    protected $listeners = [
        'render',
        'scan-code' => 'scan',
        'removeItem' => 'removeItem',
        'clearCart' => 'clearCart',
        'saveSale' => 'saveSale'
    ];

    public function scan($barcode){
        $this->product = Product::where('barcode', $barcode)
        ->orWhere('codigo', $barcode)->first(); //optional

        $this->idd = $this->product->id;
       
    }

    public function update(){


        Product::where('id', $this->idd)
        ->update(['price' => $this->cantidad]);

        return redirect()->route('admin.update.price');
    }
    public function render()
    {
        return view('livewire.admin.update-price')->layout('layouts.admin');
    }
}
