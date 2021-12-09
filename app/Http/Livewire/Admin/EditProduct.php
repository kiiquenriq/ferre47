<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use Livewire\Component;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    public $product, $categories, $brands, $codigo, $barcode;
    public $subcategories, $slug, $status;
    public $category_id;

    protected $rules= [
        'category_id'=> 'required',
        'product.name'=> 'required',
        'product.description'=> 'required',
        'product.brand_id'=> 'required',
        'product.price'=> 'required',
        'slug'=> 'required|unique:products,slug',
        'product.subcategory_id'=> 'required',
        'product.barcode'=> 'required',
        'product.codigo'=> 'required',
        'product.quantity'=> 'numeric'];
    
        protected $listeners =['refreshProduct', 'delete'];

    public function mount(Product $product){
        
        $this->product = $product;
        $this->categories = Category::all();
        $this->barcode = $this->product->barcode;
        $this->codigo = $this->product->codigo;
        $this->category_id = $product->subcategory->category->id;
        $this->subcategories = Subcategory::where('category_id' , $this->category_id)->get();
        $this->slug = $this->product->slug;
        $this->brands = Brand::whereHas('categories', function(Builder $query) {
            $query->where('category_id', $this->category_id);
        })->get();
    }
    public function getSubcategoryProperty(){
        return Subcategory::find($this->product->subcategory_id);
    }
    public function updatedProductName($value){
        $this->slug = Str::slug($value);
    }
    public function refreshProduct(){
        $this->product = $this->product->fresh();
    }
    public function updatedCategoryId($value){
        $this->subcategories = Subcategory::where('category_id' , $value)->get();

        $this->brands = Brand::whereHas('categories', function(Builder $query) use ($value) {
            $query->where('category_id', $value);
        })->get();

        $this->product->subcategory_id = "";
    }
    public function save(){
        $rules = $this->rules;
        $rules['product.slug'] = 'required|unique:products,slug,'. $this->product->id;
        if($this->product->subcategory_id){
            if(!$this->subcategory->color && !$this->subcategory->size) {
                $rules['product.quantity'] = 'required| numeric';
            }
        }
       
        $this->validate($rules);
        $this->product->slug = $this->slug;

        $this->product->save();
        $this->emit('saved');
    }
    public function deleteImage(Image $image){
        Storage::delete([$image->url]);
        $image->delete();

        //actualizacion del cuadro de imagen
        $this->product = $this->product->fresh();
    }
    public function delete(){

        //recuperar imagenes
        $images = $this->product->images;
        //itera y borra registro y despues la imagen
        foreach($images as $image) {
            Storage::delete($image->url);
            $image->delete();
        }
        //posteriormente borra los datos de la base de datos
        $this->product->delete();
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
