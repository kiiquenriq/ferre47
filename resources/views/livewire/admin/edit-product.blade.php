<div>
    <header class=" container flex flex-col md:flex-row justify-between items-center py-4">
        <div>
            <div>
                <h2 class="text-xl font-semibold">{{$product->name}}</h2>
                <div>
                    <p>Codigo: {{$product->codigo}}</p>

                </div>
            </div>
        </div>
        <x-jet-danger-button wire:click="delete">Eliminar producto</x-jet-danger-button>
    </header>

    <div class=" bg-blue-200 py-12">
        <div class="container my-2" >
    
    
            {{-- titulo --}}
            <section class="bg-white rounded-xl shadow-xl">
                <h1 class="text-2xl text-center font-semibold py-2">Actualizar producto</h1>
                
    
            </section>
            {{-- dropzone --}}
            <section wire:ignore class="my-4">
                <form action="{{route('admin.products.files', $product)}}"
                    method="POST" 
                    class="dropzone"
                    id="my-awesome-dropzone">
                </form>
      
            </section>
            {{-- checa si hay imagenes --}}
            @if($product->images->count())
                <section class="bg-white rounded-xl shadow-xl py-4 my-4">
                    <h2 class="text-lg text-center text-gray-600 font-semibold">Imagenes del producto</h2>
    
                    <ul class=" flex flex-wrap gap-2 mx-4">
                        @foreach ($product->images as $image)
                            <li class="relative" wire:key="image-{{$image->id}}">
                                <img class="w-32 h-20 object-cover" src="{{Storage::url($image->url)}}" alt="">
                                <a wire:click="deleteImage({{$image->id}})"
                                    wire:loading.attr="disabled"
                                    wire:target="deleteImage({{$image->id}})"
                                     class="absolute right-2 top-2 text-xl cursor-pointer"><i class='bx bx-x' style='color:#e61010'  ></i></a>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endif
            
            {{-- cambiar si es borrador o publicado --}}
            <section class="bg-green-200 rounded-xl shadow-xl my-4 py-4">
                @livewire('admin.status-product', ['product' => $product], key('status-product-'. $product->id))
          
            </section>
            {{-- Categorias --}}
            <section class="bg-white rounded-xl shadow-xl my-4">
                <h2 class="text-2xl text-center font-semibold pt-2">Categorias</h2>
    
                <div class="grid grid-cols-2 gap-4 py-4 mx-4">
                    {{-- select categoria --}}
                    <div>
                        <select class="form-select" aria-label="Default select example" wire:model="category_id">
                       
                            <option selected disabled value="">-Seleccione categoria-</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                           
                        </select>
                        <x-jet-input-error for="category_id"/>
                    </div>
                    {{-- select subcategoria --}}
                    <div>
                        <select class="form-select" aria-label="Default select example" wire:model="product.subcategory_id">
                            <option selected disabled value="">-Seleccione una subcategoria-</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                            
                        </select>
                        <x-jet-input-error for="subcategory_id"/>
                    </div>
                </div>
                
            </section>
            {{-- nombre y slug --}}
            <section class="bg-white rounded-xl shadow-xl my-4 px-4" >
                <h2 class="font-semibold text-center text-2xl pt-2">Nombre</h2>
                <div class="flex flex-col md:flex-row justify-evenly items-center">
                    <div class="px-4 py-4 flex gap-4 " >
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" wire:model="product.name" id="nombre" placeholder="Nombre" class=" px-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                        <x-jet-input-error for="name"/>
                    </div>
                    <div class="px-2 py-2 flex gap-4">
                        <label for="nombre" class="form-label">Slug</label>
                        <input type="text" wire:model="slug" placeholder="Slug" disabled  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-gray-200  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                        <x-jet-input-error for="slug"/>
                    </div>
                </div>
            </section>
            {{-- descripcion --}}
            <section class="bg-white rounded-xl shadow-xl my-4">
                <div class="px-4 py-2 flex flex-col" >
                    <label for="nombre" class="form-label text-2xl font-semibold text-center">Descripcion</label>
                    <textarea type="text" wire:model="product.description" id="nombre" placeholder="Descripcion" class="w-full px-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"></textarea>
                    <x-jet-input-error for="description"/>
                </div>
    
              
            </section>
            {{-- brands e images --}}
             <section class="bg-white rounded-xl shadow-xl my-4">
                <h2 class="text-center text-2xl font-semibold pt-2">Marca y barcode</h2>
                <div class="flex flex-col md:flex-row gap-6 justify-around py-6 px-4">
                   {{-- brand --}}
                    <div>
                        <select class="form-select" aria-label="Default select example" wire:model="product.brand_id">
                       
                            <option selected disabled value="">-Seleccione una marca-</option>
                            @foreach ($brands as $brand)
                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                            
                        </select>
                        <x-jet-input-error for="brand_id"/>
                    </div>
                    {{-- barcode --}}
                    <div>
                        <input type="number" wire:model="product.barcode" placeholder="Barcode" class="form-select rounded-md border-gray-400">
                    </div>
                    <div>
                        <input type="number" wire:model="product.codigo" placeholder="Barcode" class="form-select rounded-md border-gray-400">
                    </div>
                </div>
            </section> 
                {{-- precio --}}
            <section class="bg-white rounded-xl shadow-xl my-4">
                <div class="flex flex-col md:flex-row justify-evenly mx-4">
                    {{-- precio --}}
                    <div class="px-2 py-2">
                      <label for="nombre" class="form-label font-semibold">Precio</label>
                      <input type="number" wire:model="product.price" placeholder="Precio"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                      <x-jet-input-error for="price"/>
                    </div>      
    
                    <div class="px-2 py-2">
                       
                        @if($this->subcategory)
                            @if(!$this->subcategory->color && !$this->subcategory->size )
                                {{-- quantity  sin talla ni color--}}
                    
                                <label for="nombre" class="form-label font-semibold">Stock</label>
                                <input type="number" wire:model="product.quantity" placeholder="Cantidad"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                                <x-jet-input-error for="quantity"/>
                            
                            @endif
                            {{-- @if($this->subcategory->color && !$this->subcategory->size )
                                {{-- quantity  sin talla ni color
                    
                                <label for="nombre" class="form-label font-semibold">Stock</label>
                                <input type="number" wire:model="quantity" placeholder="Cantidad"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
    
                            
                            @endif
                            @if($this->subcategory->color && $this->subcategory->size )
                                {{-- quantity  sin talla ni color
                    
                                <label for="nombre" class="form-label font-semibold">Stock</label>
                                <input type="number" wire:model="quantity" placeholder="Cantidad"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
    
                            
                            @endif --}}
    
                        @endif
                    </div>
                </div>
                
            </section>
    
                    {{-- boton --}}
                    <div class="flex items-center gap-2">
                        <button
                            
                            type="button" class="btn btn-success" wire:click="save">
                            Actualizar Producto
            
                        </button>
            
                        <div 
                            wire:loading.block
                            wire:target="save"
            
                            class=" hidden spinner-grow text-success" role="status">
                            <span class="sr-only">Loading...</span>
                            <x-jet-action-message class="mr-3" on="saved">Actualizado</x-jet-action-message>
                        </div>
                    </div>
            
            {{-- color y size --}}
            <section class="bg-white rounded-xl shadow-xl my-4">
                <h2 class="text-2xl pt-2 text-center font-semibold ">Extra</h2>
                @if($this->subcategory)
                    @if($this->subcategory->size)
                        @livewire('admin.size-product', ['product' => $product],key('size-product'. $product->id))
    
                        @elseif($this->subcategory->color)
                            @livewire(' .color-product', ['product' => $product],key('color-product'. $product->id))
    
                    @endif
                @endif
            </section>
    
    
            
        </div>
    
    
    
        {{-- opciones de dropzone --}}
        @push('script')
    
            <script>
                Dropzone.options.myAwesomeDropzone = {
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    dictDefaultMessage: "Inserte una imagen del producto", //texto del dropzone
                    paramName: "file",
                    acceptedFiles: 'image/*', //que archibos va a aceptar
                    maxFilesize: 2, //MB
                    complete: function(file){
                        this.removeFile(file);
                    },
                    queuecomplete: function(){
                        Livewire.emit('refreshProduct');
                    }
                };
            </script>
        @endpush
    </div>
</div>
