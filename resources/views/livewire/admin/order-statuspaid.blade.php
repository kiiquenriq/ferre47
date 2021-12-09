<div>
    <div class="mx-4 flex flex-col md:flex-row gap-2 justify-between items-center">
        <div>
            <input type="radio" value="5" wire:model="status">
            <label >Procesando</label>
        </div>
        <div>
            <input type="radio" value="6" wire:model="status">
            <label >Cancelado</label>
        </div>
        <div>
            <input type="radio" value="7" wire:model="status">
            <label >Pagado</label>
        </div>
        <div>
            <input type="radio" value="8" wire:model="status">
            <label >Por Cobrar</label>
        </div>
    </div>
    <div class="flex justify-end mx-6 my-2">
        <div>
        
            <x-jet-button wire:click="saved">
                Actualizar estado
    
            </x-jet-button>
            
            <div  wire:loading.block
            wire:target="saved" class="hidden spinner-grow text-danger" role="status">
            <span class="sr-only">Loading...</span>
        </div>
            
        </div>
        
    
    </div>
</div>
