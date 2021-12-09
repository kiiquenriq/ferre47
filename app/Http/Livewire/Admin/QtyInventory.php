<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class QtyInventory extends Component
{   
    public $prueba="", $error, $users, $user_id="";
    public $total, $cart=[];
    public $user, $cantidad, $idd;
   
    public $qty, $quantity, $product, $codigo;


    protected $listeners = [
        'render',
        'scan-code' => 'updateQuantity',
        'update' => 'update'
    ];
    protected $rules = [
        'quantity' => 'required'
    ];


    // public function scanCode($barcode, $cantidad = 1){

       
    //     $title="";
    //     $this->product = Product::where('barcode', $barcode)
    //                 ->orWhere('codigo', $barcode)->first(); //optional

    //     $this->prueba = $this->product['name'];
    //     $this->qty= $this->product->quantity;
    //     $this->codigo= $this->product['codigo'];
    //     $this->idd= $this->product['id'];
    //     $this->total = $this->qty + $this->cantidad;
    //     $this->product->quantity= $this->total->save();
    
        
        
    // }
    public function updateQuantity($barcode) {
        $title="";
        $this->product = Product::where('barcode', $barcode)
                    ->orWhere('codigo', $barcode)->first(); //optional

        $this->prueba = $this->product['name'];
        $this->qty= $this->product->quantity;
        $this->codigo= $this->product['codigo'];
        $this->idd= $this->product['id'];
        
      
    }
    public function save(){
        // $this->qty = $this->total;
        // $this->qty->save();
        $results = DB::select('select * from products where id = :id', ['id' => $this->idd]);
        
        $this->qty = $results[0]->quantity;
        $total = $this->qty + $this->cantidad;
     
        
       
        Product::where('id', $this->idd)
                ->update(['quantity' => $total]);

        return redirect()->route('admin.product.qtyinventory');
    }
 
    public function render()
    {
        
        return view('livewire.admin.qty-inventory')->layout('layouts.admin');
    }
}
