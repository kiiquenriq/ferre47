<div class="form-group" x-data>
                  
    <input  
         {{-- disabled
        x-bind:disabled="$wire.quantity < 1"
        wire:loading.attr='disabled'
        wire:target="cantidad"  --}}
             wire:change="cantidad" value="{{$item->qty}}" 
            type="number"  class="form-control"  min="1" max="{{$quantity}}" >
    
</div>
