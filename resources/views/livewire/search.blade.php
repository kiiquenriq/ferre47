<div x-data class="flex items-center relative">
    <form action="{{route('search')}}" class="flex items-center" autocomplete="off" >
        <x-jet-input name="name" wire:model="search" type="text" placeholder="Ingresa nombre o codigo" class="w-60 md:w-80 "/>
        <button><i class='bx bx-search-alt text-4xl px-2 text-teal-700'></i></button>
    </form>
    {{-- caja de busqueda --}}
    <div class=" absolute w-full ">
        <div >
            
            <div 
                @click.away ="$wire.open = false"
                :class ="{'hidden': !$wire.open }"
                class=" hidden absolute px-4 py-3 space-y-1 bg-greenLime-200 rounded-lg shadow-lg mt-12">

                <div>
                        <h2 class="font-bold text-xl">Productos</h2>
                        @forelse ($products as $product) 

                        <a href="{{route ('products.show', $product)}}" class="flex overflow-y pb-2">
                            <img class="w-16 h-12 object-cover" src="{{Storage::url($product->images->first()->url)}}" alt="">
                            <div class="ml-4 text-gray-700">
                                <p class="font-semibold">{{$product->name}}</p>
                                <p>{{$product->price}}</p> 
                            </div>
                        </a>
                    @empty
                        <div class="text-lg flex items-center">
                            <i class='text-xl bx bxs-error' style='color:#f50808'  ></i>
                            <p>No se encontro ningun producto</p>
                        </div>
                    @endforelse 
                </div>

                {{-- <div class=" border-b border-gray-600">
                        <h2 class="font-bold text-xl">Categorias</h2>
                        @forelse ($categories as $category)
                        <div class="flex overflow-y">
                      
                            <div class="ml-4 text-gray-700">
                                <p class="font-semibold">{{$category->name}}</p>
        
                            </div>
                        </div>
                    @empty
                        <div class="text-lg flex items-center">
                            <i class='text-xl bx bxs-error' style='color:#f50808'  ></i>
                            <p>No se encontro ninguna categoria</p>
                        </div>
                    @endforelse 
                </div> --}}



            </div>
        </div>
    </div>
</div>
