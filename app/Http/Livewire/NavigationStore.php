<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class NavigationStore extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.navigation-store',compact('categories') );
    }
}
