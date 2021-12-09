<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $search = $this->search;

        $products = Product::where('name' , 'like','%'. $this->search . '%')
                            ->orWhere('price', 'like','%'. $this->search . '%')

                            ->paginate(15);
        // $price = Product::where('price', 'like','%'. $this->search . '%')->paginate(15);
    
 
        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');
    }
}
