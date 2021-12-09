<div class=" bg-blue-200 py-12">
    <div class="container my-2" >
        {{-- titulo --}}
        <section class="bg-white rounded-xl shadow-xl my-6">
            <h1 class="text-2xl text-center font-semibold py-2">Crear producto</h1>
        </section>


        {{-- Categorias --}}
        <section class="bg-white rounded-xl shadow-xl my-4">
            <h2 class="text-2xl text-center font-semibold pt-2">Categorias</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 py-4 mx-4">
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
                    <select class="form-select" aria-label="Default select example" wire:model="subcategory_id">
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
            <div class="flex flex-col md:flex-row items-center md:justify-evenly ">
                <div class="px-4 py-4 flex gap-2 " >
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" wire:model="name" id="nombre" placeholder="Nombre" class=" px-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                    <x-jet-input-error for="name"/>
                </div>
                <div class="px-2 py-2 flex gap-2">
                    <label for="nombre" class="form-label">Slug</label>
                    <input type="text" wire:model="product.slug" placeholder="Slug" disabled  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-gray-200  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                    <x-jet-input-error for="product.slug"/>
                </div>
            </div>
        </section>
        {{-- descripcion --}}
        <section class="bg-white rounded-xl shadow-xl my-4">
            <div class="px-4 py-2 flex flex-col" >
                <label for="nombre" class="form-label text-2xl font-semibold text-center">Descripcion</label>
                <textarea type="text" wire:model="description" id="nombre" placeholder="Descripcion" class="w-full px-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"></textarea>
                <x-jet-input-error for="description"/>
            </div>

          
        </section>
        {{-- brands e images --}}
         <section class="bg-white rounded-xl shadow-xl my-4">
            <h2 class="text-center text-2xl font-semibold pt-2">Marca y barcode</h2>
            <div class="flex flex-col md:flex-row gap-6 justify-around py-6 px-4">
               {{-- brand --}}
                <div>
                    <select class="form-select" aria-label="Default select example" wire:model="brand_id">
                   
                        <option selected disabled value="">-Seleccione una marca-</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                        @endforeach
                        
                    </select>
                    <x-jet-input-error for="brand_id"/>
                </div>
                {{-- barcode --}}
                <div>
                    <input wire:model="barcode" type="number" placeholder="Barcode" class="form-select rounded-md border-gray-400">
                </div>
                <div>
                    <input wire:model="codigo" type="number" placeholder="Codigo" class="form-select rounded-md border-gray-400">
                </div>
            </div>
        </section> 
            {{-- precio --}}
        <section class="bg-white rounded-xl shadow-xl my-4">
            <div class="flex flex-col md:flex-row justify-evenly mx-4">
                {{-- precio --}}
                <div class="px-2 py-2">
                  <label for="nombre" class="form-label font-semibold">Precio</label>
                  <input type="number" wire:model="price" placeholder="Precio"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                  <x-jet-input-error for="price"/>
                </div>      

                <div class="px-2 py-2">
                    {{-- @if($subcategory_id)
                        @if(!$this->subcategory->color && !$this->subcategory->size ) --}}
                            {{-- quantity  sin talla ni color--}}
                
                            <label for="nombre" class="form-label font-semibold">Stock</label>
                            <input type="number" wire:model="quantity" placeholder="Cantidad"  class="px-3  placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:ring " autocomplete="off"/>
                            <x-jet-input-error for="quantity"/>
                        
                        {{-- @endif --}}
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

                    {{-- @endif  --}}
                </div>
            </div>
            
        </section>
        <div class="flex items-center gap-2">
            <button
                
                type="button" class="btn btn-success" wire:click="save">
                Crear Producto

            </button>

            <div 
                wire:loading.block
                wire:target="save"

                class=" hidden spinner-grow text-success" role="status">
                <span class="sr-only">Loading...</span>
            </div>

            
        </div>
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
                    Livewire.emit('refreshPost');
                }
            };
        </script>
    @endpush

    {{-- @push('script')
        <script>
            $(document).keypress(
  function(event){
    if (event.which == '13') {
      event.preventDefault();
    }
});
        </script>
    @endpush --}}
</div>
