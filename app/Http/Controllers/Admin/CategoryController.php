<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //controller para seccion categories en admin
    public function index(){
        return view('admin.categories.index');
    }
}
