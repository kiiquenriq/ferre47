<div>
    {{-- grid titulo --}}
    <div class="bg-white rounded-lg shadow-lg">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="text-lg font-semibold text-gray-700 uppercase">{{$category->name}}</h1>
            <div class="text-3xl cursor-pointer grid grid-cols-2  ">
                <i class='bx bx-grid-alt hover:text-teal-600 px-2 {{$view == 'grid' ? 'text-teal-600' : ''}}' wire:click="$set('view', 'grid')"></i>
                <i class='hidden md:block bx bx-list-ul hover:text-teal-600 px-2 {{$view == 'list' ? 'text-teal-600' : ''}}' wire:click="$set('view', 'list')"></i>
            </div>

        </div>

    </div>
    {{-- grid contenido --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 py-4 gap-4">
        {{-- sidebar modo escritorio --}}
        <aside class="hidden md:block">

  
            <h2 class="text-xl text-gray-800 font-semibold text-center mb-2">Subcategorias</h2>
            <ul class="my-4 divide-y divide-gray-300 ">
                @foreach ($category->subcategories as $subcategory)
                <li class="my-2 text-md ">
                    <a  class="cursor-pointer  hover:text-orange-500 capitalize {{$subcategoria == $subcategory->slug ? 'text-orange-500 font-semibold' : ''}}" 
                        wire:click="$set('subcategoria', '{{$subcategory->slug}}')"
                        >{{$subcategory->name}}
                    </a>
                </li>
                    
                @endforeach
            </ul>


            <h2 class="text-xl text-gray-800 font-semibold text-center mb-2">Marcas</h2>
            <ul class="my-4 divide-y divide-gray-300 ">
                @foreach ($category->brands as $brand)
                <li class="my-2 text-md ">
                    <a class="cursor-pointer  hover:text-orange-500 capitalize {{$marca == $brand->name ? 'text-orange-500 font-semibold' : ''}}" 
                        wire:click="$set('marca', '{{$brand->name}}')">
                        {{$brand->name}}
                    </a>
                </li>
                    
                @endforeach
            </ul>
            
            <x-jet-button class="bg-teal-500 py-2"
                wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>
        {{-- sidebar modo movil --}}
     <div class="block md:hidden">
        <p class="text-center">
            <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class='bx bx-filter-alt'></i> Filtrar
            </a>
        </p>
        <div class="collapse my-2" id="collapseExample">
            <div class="card card-body">
                <aside >

  
                    <h2 class="text-xl text-gray-800 font-semibold text-center mb-2">Subcategorias</h2>
                    <ul class="my-4 divide-y divide-gray-300 ">
                        @foreach ($category->subcategories as $subcategory)
                        <li class="my-2 text-md ">
                            <a class="cursor-pointer  hover:text-orange-500 capitalize {{$subcategoria == $subcategory->name ? 'text-orange-500 font-semibold' : ''}}" 
                                wire:click="$set('subcategoria', '{{$subcategory->name}}')"
                                >{{$subcategory->name}}
                            </a>
                        </li>
                            
                        @endforeach
                    </ul>
        
        
                    <h2 class="text-xl text-gray-800 font-semibold text-center mb-2">Marcas</h2>
                    <ul class="my-4 divide-y divide-gray-300 ">
                        @foreach ($category->brands as $brand)
                        <li class="my-2 text-md ">
                            <a class="cursor-pointer  hover:text-orange-500 capitalize {{$marca == $brand->name ? 'text-orange-500 font-semibold' : ''}}" 
                                wire:click="$set('marca', '{{$brand->name}}')">
                                {{$brand->name}}
                            </a>
                        </li>
                            
                        @endforeach
                    </ul>
                    
                    <x-jet-button class="bg-teal-500 py-2"
                        wire:click="limpiar">
                        Eliminar filtros
                    </x-jet-button>
                </aside>
            </div>
        </div>
     </div>

        {{-- contenido de productos --}}
        <div class="lg:col-span-4">
        @if ($view == 'grid')
            {{-- grid --}}
        <ul class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            @foreach ($products as $product)

            <li class="swiper-slide flex flex-col pb-8  rounded-md"> 
                <article>
                    <figure>
                        <img src="{{Storage::url($product->images->first()->url) }}" alt="" style="border-radius: .375rem .375rem 0 0"> 
  
                    </figure>
                    <div>
                        <h1 class="pt-4 text-trueGray-800 font-semibold " style="font-size: 1rem">
                            <a href="{{route('products.show', $product)}}">
                                {{Str::limit($product->name, 15)}}
                            </a>
                        </h1>
                        <p class="text-trueGray-600 font-semibold text-xl">{{$product->price}}</p>
                    </div>
                </article>
  
            </li>
            @endforeach
        </ul>
    
        @else
            {{-- list --}}
            <ul>
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow mb-4">
                        <article class="flex">
                            <figure>
                                <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url)}}" alt="" style="border-radius: .5rem 0 0 .5rem"> 
                            </figure>
                            <div class="flex-1 py-4 px-6 " style="border-radius: 0 .5rem .5rem 0">
                                <div class=" flex justify-between">
                                    <div>
                                        <a href="{{route('products.show', $product)}}" class="font-semibold text-trueGray-700 text-xl cursor-pointer hover:text-orange-600 ">{{$product->name}}</a>
                                        <p class="font-bold text-red-600 text-xl ">${{$product->price}}</p>
                                    </div>
                                    <div>
                                        <div class="text-2xl">
                                            <i class='bx bxs-star' style='color:#e8d200' ></i>
                                            <i class='bx bxs-star' style='color:#e8d200' ></i>
                                            <i class='bx bxs-star' style='color:#e8d200' ></i>
                                            <i class='bx bxs-star' style='color:#e8d200' ></i>
                                            <i class='bx bxs-star-half' style='color:#e8d200' ></i>
                                        </div>
                                        <div>
                                            <x-jet-button  class="mt-4 bg-orange-600"><a href="{{route('products.show', $product)}}">Ver producto</a></x-jet-button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </li>
                @endforeach
            </ul>
        
        
        @endif


                    {{-- paginacion --}}
        <div class="my-4">
            {{$products->links()}}
        </div>
           
        </div>
        

    </div>
</div>
