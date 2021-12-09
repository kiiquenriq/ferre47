<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    //controller para subir imagenes usando Dropzone
    public function files(Product $product, Request $request){
        // $request->validate([
        //     'file'=> 'required image|max:2048'
        // ]);
        //guarda la imagen en el almacenamiento public/products
        $url = Storage::put('products', $request->file('file'));

        $product->images()->create([
            'url' => $url
        ]);
    }
}
