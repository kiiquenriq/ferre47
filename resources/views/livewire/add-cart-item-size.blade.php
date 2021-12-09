<div x-data >
  <div class="pt-4">
      <p class="text-xl text-gray-600">Talla:</p>
      <select wire:model='size_id' class="form-select form-select-lg mb-2  ">
          <option value="" selected disabled> Seleccione el tamaño</option>
          @foreach ($sizes as $size)
            <option value="{{$size->id}}" >{{$size->name}} </option>
              
          @endforeach
      </select>
  </div>
  <div class="pt-2">
      <p class="text-xl text-gray-600">Color:</p>
      <select wire:model='color_id' class="form-select form-select-lg mb-2  ">
          <option value="" selected disabled> Seleccione el color</option>
          @foreach ($colors as $color)
            <option value="{{$color->id}}" >{{$color->name}} </option>
              
          @endforeach
      </select>
      <p class="text-md text-gray-600 py-2">Stock disponible: <span>{{$quantity}}</span></p>
    <div class="flex  gap-6">
        <div>
            {{-- <button 
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr='disabled'
                wire:target="decrement"
                class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" 
                wire:click ="decrement">-</button> --}}

                <div class="form-group">
                    
                    <div class="form-group">
                    
                        <input 
                            disabled
                            x-bind:disabled="$wire.qty < 1"
                            wire:loading.attr='disabled'
                            wire:target="cantidad" 
                                wire:model="qty" wire:change="cantidad"
                                type="number" class="form-control"  min="1" max="{{$quantity}}">
        
                    </div>

            {{-- <button 
            disabled
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr='disabled'
                wire:target="increment"
            class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" wire:click ="increment" >+</button> --}}

        </div>
        <button
                       

        wire:click="addItem"
        wire:loading-attr="'disabled"
        wire:target ="addItem" 
        x-bind:disabled="$wire.qty > $wire.quantity"
        class=" inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
        >Agregar carrito

    </button>
    </div>
  </div>
</div>
