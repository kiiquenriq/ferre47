<div class="form-group flex items-center" x-data>
                  
    <input  
         {{-- disabled
        x-bind:disabled="$wire.quantity < 1"
        wire:loading.attr='disabled'
        wire:target="cantidad"  --}}
            wire:model="qty" wire:change="cantidad"
            type="number"    min="1" max="{{$quantity}}" >
          

            <p class="text-red-500">{{$quantity}}</p>
</div>
