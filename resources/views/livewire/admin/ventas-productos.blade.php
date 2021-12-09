<div>
    @foreach ($products as $product)
        
   
    <h2 class="py-4 text-xl font-bold  text-center">Agregar productos</h2>

                        <div class="mx-4 py-6">
                            <input type="text"  wire:model="find"autofocus id="agregaProducto" name="agregarProducto" placeholder="Agregar Productos" class="w-full">
                            <div class="flex gap-2 py-2">
                                <input type="number" min="1" placeholder="0" class="" >
                                <input type="number" placeholder="0.00" min="1" disabled class="bg-gray-300">
                            </div>

                        </div>
                        <div class=" px-6 pb-4">
                            <x-jet-button>Agregar producto</x-jet-button>
                        </div>
                        <div class="flex justify-center items-center gap-4"> 
                            <div>
                                <input type="radio">
                                <label for="">Por cobrar</label>
                            </div>
                            <div>
                                <input type="radio">
                                <label for="">Pagado</label>
                            </div>
                        </div>

                       
    @endforeach
                     
</div>
