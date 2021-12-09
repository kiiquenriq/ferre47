<div>
    <h2 class="text-2xl text-gray-600 text-center">Estado del producto</h2>
    <div class="flex justify-around">
        <label>
            <input wire:model="status" type="radio" name="satus" value="1" class="mx-2" >Brorrador
        </label>
        <label>
            <input wire:model="status" type="radio" name="satus" value="2" class="mx-2">Publicado
        </label>
      
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

