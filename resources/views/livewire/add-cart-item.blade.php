<div x-data class="pt-4">

    
    <p class="text-md text-gray-600 py-2">Stock disponible: <span>{{$quantity}}</span></p>

    <div class="flex justify-between">
        <div class="flex flex-col gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  
                {{-- boton - --}}
                {{-- <button 
                    disabled
                    x-bind:disabled="$wire.qty <= 1"
                    wire:loading.attr='disabled'
                    wire:target="decrement"
                    class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" 
                    wire:click ="decrement">
                    -
                </button>
    
                {{-- <span class="mx-3 text-gray-700 font-semibold"> {{$qty}} </span>  --}}

                <div class="form-group">
                    
                    <input 
                        disabled
                        x-bind:disabled="$wire.quantity < 1"
                        wire:loading.attr='disabled'
                        wire:target="cantidad" 
                            wire:model="qty" wire:change="cantidad"
                            type="number" class="form-control"  min="1" max="{{$quantity}}">
    
                </div>
                <div class="flex-1">
                    <button
                       
                       
                       wire:click="addItem"
                       wire:loading-attr="'disabled"
                       wire:target ="addItem" 
                       x-bind:disabled="$wire.qty > $wire.quantity"
                       class=" inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                       >Agregar carrito</button>
               </div>

     
            
                    {{-- boton + --}}
                {{-- <button 
                    disabled
                    x-bind:disabled="$wire.qty >= $wire.quantity"
                    wire:loading.attr='disabled'
                    wire:target="increment"
                    class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" wire:click ="increment" >  
                    +
                </button>  --}}
    
            </div>
 
        </div>
        {{-- <div class="flex flex-col  gap-6">
            <p>por tonelada</p>
            <div>
    
                {{-- boton 
                <button 
                    disabled
                    x-bind:disabled="$wire.qty <= 1"
                    wire:loading.attr='disabled'
                    wire:target="decrement_5"
                    class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" 
                    wire:click ="decrement_5">
                    -
                </button>
    
                <span class="mx-3 text-gray-700 font-semibold"> {{$qty}} </span> 

     
            
                    {{-- boton +
                <button 
                    disabled
                    x-bind:disabled="$wire.qty > $wire.quantity"
                    wire:loading.attr='disabled'
                    wire:target="increment_5"
                    class="bg-trueGray-100 py-2 px-3  shadow-md rounded-lg" wire:click ="increment_5" >  
                    +
                </button> 
    
            </div>
            <div class="flex-1">
                 <button
                    
                    script para agregar al carrito 
                    wire:click="addItem"
                    wire:loading-attr="'disabled"
                    wire:target ="addItem" 
                    x-bind:disabled="$wire.name > $wire.quantity"
                    class=" inline-flex items-center px-4 py-2 bg-orange-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                    >Agregar carrito</button>
            </div> 
        </div> --}}
    </div>
</div>

