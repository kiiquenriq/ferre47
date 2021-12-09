<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
        //controller para seccion subcategories en admin
        public function index(){
            $subcategories = Subcategory::all();
            return view('admin.subcategories.index', compact('subcategories'));
        }
}
