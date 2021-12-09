<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Illuminate\Support\Str;

class CrearSub extends Component
{
    public $categories;
    public $category_id="", $name, $slug;
    public $subcategories;

    protected $rules=[
        'name' => 'required',
        'slug' => 'required',
        'category_id' => 'required',


    ];

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }
    public function mount(){
        $this->categories = Category::all();
    }
    public function save(){
        $this->validate();
        $subcategory = new Subcategory();

        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;
        $subcategory->category_id = $this->category_id;

        $subcategory->save();
        return redirect()->route('admin.subcategories.index');
    }
    public function render()
    {
        return view('livewire.admin.crear-sub')->layout('layouts.admin');
    }
}
