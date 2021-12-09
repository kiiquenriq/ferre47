<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class VentasProductos extends Component
{
    public $find ="1", $producto;
    public function getProductId($value){
        $this->find = Product::where('id', $value)->get();  
        $this->find = $this->producto;
       
        
    }
    public function render()
    {   
               
        $products = Product::where('id', 1)->get();
        
        return view('livewire.admin.ventas-productos', compact('products'));
    }
}
