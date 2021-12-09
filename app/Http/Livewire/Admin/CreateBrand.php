<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateBrand extends Component
{
    public $slug, $name;

    protected $rules=[
        'name'=>'required',
        'slug'=>'required',
    ];
    public function updatedName($value){
        $this->slug = Str::slug($value);
        
    }
    public function save() {
        $this->validate();

        $brands = new Brand();

        $brands->name = $this->name;

        $brands->save();
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.create-brand')->layout('layouts.admin');
    }
}
