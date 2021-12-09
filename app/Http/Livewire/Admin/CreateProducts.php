<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProducts extends Component
{
    public $categories, $subcategories = [];
    public $category_id ="", $brands;
    public $subcategory_id="";
    public $name, $slug, $description, $codigo,$barcode;

    public $brand_id ="";
    public $price, $quantity;

    protected $rules= [
        'category_id'=> 'required',
        'name'=> 'required',
        'description'=> 'required',
        'brand_id'=> 'required',
        'price'=> 'required',
        'slug'=> 'required| unique:products',
        'subcategory_id'=> 'required'];
    

    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id' , $value)->get();

        
        $this->reset(['subcategory_id', 'brand_id']);
    }
    //obtener categories
    public function mount(){
        $this->categories = Category::all();
        $this->brands = Brand::all();

    }
    //slug
    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    //otener subcategories
    public function getSubcategoryProperty(){
        return Subcategory::find($this->subcategory_id);
    }

    public function save(){
        //reglas para validacion de stock
        $rules = $this->rules;
        if($this->subcategory_id){
            if(!$this->subcategory->color && !$this->subcategory->size) {
                $rules['quantity'] = 'required';
            }
        }
        $this->validate($rules);

        //envio a base de datos

        $product = new Product();
        
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->subcategory_id = $this->subcategory_id;
        $product->brand_id = $this->brand_id;
        $product->price = $this->price;
        $product->barcode = $this->barcode;
        $product->codigo = $this->codigo;


        if($this->subcategory_id){
            if(!$this->subcategory->color && !$this->subcategory->size) {
                $product->quantity = $this->quantity;
            }
        }
        $product->save();
        return redirect()->route('admin.index', $product);
        
    }
    public function render()
    {
        return view('livewire.admin.create-products')->layout('layouts.admin');
    }
}
