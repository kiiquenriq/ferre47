<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCartMovil extends Component
{


    public $user;
    protected $listeners =['render'];
    public function destroy(){
        Cart::destroy();
        $this->emitTo('dropdown-cart', 'render');
    }
     public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart', 'render');
     }
    public function render()
    {
     
        return view('livewire.shopping-cart-movil');
    }
}