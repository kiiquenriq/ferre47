<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SearchController extends Component
{
    public $search; 
    
    public function render()
    {
        return view('livewire.admin.search-pos');
    }
}
