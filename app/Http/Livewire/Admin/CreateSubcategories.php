<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Subcategory;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class CreateSubcategories extends Component
{
    use WithPagination;
   
    public $search, $categories ,$category, $brands;
    public $category_id="1",$slug, $name;
    protected $listeners=['delete'];

    protected $rules =[
        'name'=>'required',
        'slug'=>'required|unique:subcategories,slug',
        'category_id' =>'required'
    ];
    protected $validationAttributes=[
        'name' => 'nombre',
        'slug' => 'slug',
        
    ];
 
    



    public function updatingSearch(){
        $this->resetPage();
    }
    public function getSubcategories(){
        $this->sub = Subcategory::where('category_id', $this->category->id)->get();
    }
 
    public function updatedName($value) {
        $this->slug= Str::slug($value);
    }
    public function mount(Category $category) {
        $this->category = $category;
        $this->categories = Category::all();
        $this->getSubcategories();
        $this->brands = Brand::all();
    }
    public function updatedCategoryId($value){
        $this->category_id = Subcategory::where('category_id', $this->category->id) ;
    }

    public function delete(Subcategory $subcategory){
        
        $subcategory->delete();
        $this->getsubcategories();
    }


    public function render()
    {
        $search = $this->search;
        
        $subcategories = Subcategory::where('name' , 'like','%'. $this->search . '%')
                           

                            ->paginate(10);
      
        return view('livewire.admin.create-subcategories', compact('subcategories'));
    }
}
