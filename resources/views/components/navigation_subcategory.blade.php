@props(['category'])
<div class="grid grig-cols-4 p-4">
    <div>
        <p class="text-lg font-bold text-center text-gray-500 mb-3">Subcategorias</p>

        <ul>
            @foreach($category->subcategories as $subcategory)

            <li>
                <a href="{{route('categories.show', $category) . '?subcategoria=' .  $subcategory->slug}}" class="text-trueGray-500 font-semibold inline-block py-1 px-4 hover: hover:text-orange-500 text-center">
                    {{$subcategory->name}}
                </a>
            </li>
                
            @endforeach
        </ul>
    </div>
    <div class="col-span-3">
        {{-- columna de imagen --}}
         {{-- <img src="{{Storage::url($categories->first()->image)}}" alt="">   --}}
    </div> 
     

</div>