<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class CreateCategory extends Component
{
    public $brands, $categories, $category;
    protected $listeners=['delete'];
    
    public $createForm= [
        
        'name'=> null,
        'slug'=> null,
        'brand'=> [],
    ];
    public $editForm= [ //sirve para wire:model en edit categories
        'open'=> false,
        'name'=> null,
        'slug'=> null,
        'brand'=> [],
    ];

    protected $rules =[
        'createForm.name' => 'required',
        'createForm.slug' => 'required',
        'createForm.brand' => 'required',
    ];
    protected $validationAttributes=[
        'createForm.name' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.brand' => 'marca',
    ];
    public function mount(){
        $this->getBrands(); //para que se ejecute este metodo
        $this->getCategories();
    }
    public function getBrands(){
        $this->brands = Brand::all();
    }
    public function getCategories(){
       $this->categories = Category::all();
    }
    public function updatedCreateFormName($value){
        //slug 
        $this->createForm['slug'] = Str::slug($value) ;
    }
    public function save(){
        $this->validate();

        $category = Category::create([
            'name'=>$this->createForm['name'],
            'slug'=>$this->createForm['slug'],
            
        ]);
        //relaciona las marcas con categorias
        $category->brands()->attach($this->createForm['brand']);
        $this->reset('createForm');
        $this->getCategories(); //actualice
        $this->emit('saved');
    }
    public function edit(Category $category){
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
    public function delete(Category $category){
        $category->delete();
        $this->getCategories();
    }
    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
