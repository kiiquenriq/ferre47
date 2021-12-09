<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class EditCategory extends Component
{

    public $brands, $categories, $category;
    public function getBrands(){
        $this->brands = Brand::all();
    }

    protected $rules =[
        'editForm.name' => 'required',
        'editForm.slug' => 'required',
        'editForm.brand' => 'required',
    ];
    protected $validationAttributes=[
        'editForm.name' => 'nombre',
        'editForm.slug' => 'slug',
        'editForm.brand' => 'marca',
    ];
 
    public $editForm= [ //sirve para wire:model en edit categories
        'open'=> false,
        'name'=> null,
        'slug'=> null,
        'brand'=> [],
    ];

    public function updatedEditFormName($value){
        $this->editForm['slug'] = Str::slug($value);
    }

    public function mount(Category $category) {
        
        $this->getBrands();
        $this->category = $category;

        // $editForm= [ //
        //     'name'=> null,
        //     'slug'=> null,
        //     'brand'=> [],
        // ];
        $this->editForm['open']= true;
        $this->editForm['name'] = $category->name;
        $this->editForm['slug'] = $category->slug;
        $this->editForm['brand'] = $category->brands->pluck('id'); //pluck solo trae un campo


    }

    public function update(){
        $this->validate();
       $this->category->update($this->editForm);
       $this->category->brands()->sync($this->editForm['brand']);

       return redirect()->route('admin.categories.index');
       

       
    }
    public function render()
    {
 
        return view('livewire.admin.edit-category')->layout('layouts.admin');
    }
}
