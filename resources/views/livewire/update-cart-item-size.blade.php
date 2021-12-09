<div class="form-group">
                    
    <input  
          {{-- disabled
        x-bind:disabled="$wire.quantity < 1"
        wire:loading.attr='disabled'
        wire:target="cantidad"   --}}
            wire:model="qty" wire:change="cantidad" 
            type="number" class="form-control"  min="1" max="{{$quantity}}" >

</div>
