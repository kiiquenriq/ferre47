<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;

    public function updatedSearch($value){
        if($value){
            $this->open = true;
        } else {
            $this->open = false;
        }

    }
    public function render()
    {
        if($this->search){



            // $products = Category::where('name', 'LIKE' ,"%".$this->search."%")->take(3)->get();

            $products = Product::where('name', 'LIKE' ,"%".$this->search."%")
                               ->where('status', 2)->take(5)
                                 ->get();

        } else{
            // $categories = [];
            $products = [];
        }
        return view('livewire.search', compact( 'products'));
    }
}
