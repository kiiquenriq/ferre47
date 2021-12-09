<div class="bg-purple-200">
   
    <div class="flex justify-center py-4  ">

        <div class="bg-white rounded-xl shadow-xl p-4">
            

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input  wire:model="name" class="block mt-1 w-full" placeholder="{{$user->name}}" type="text" required autofocus autocomplete="name" />
                        
                </div>
    
                
        
                   
             
                
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="telefono" value="telefono" />
                        <x-jet-input wire:model="telefono" id="telefono" placeholder="{{$user->telefono}}" class="block mt-1 w-full" type="number" name="telefono" required autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="address" value="direccion" />
                        <x-jet-input wire:model="address" class="block mt-1 w-full" placeholder="{{$user->address}}" type="text" name="address"  autocomplete="off" />
                    </div>
                </div>

                
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="state" value="estado" />
                        <x-jet-input wire:model="state" placeholder="{{$user->state}}" class="block mt-1 w-full" type="text" name="state"  autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="city" value="ciudad" />
                        <x-jet-input wire:model="city" placeholder="{{$user->city}}" class="block mt-1 w-full" type="text" name="city"  autocomplete="off" />
                    </div>
                </div>

                
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="colonia" value="colonia" />
                        <x-jet-input wire:model="colonia" placeholder="{{$user->colonia}}" class="block mt-1 w-full" type="text" name="colonia"  autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="cp" value="codigo postal" />
                        <x-jet-input wire:model="cp"  placeholder="{{$user->cp}}" class="block mt-1 w-full" type="text" name="cp"  autocomplete="off" />
                    </div>
                </div>

                
                <div class="mt-4">
                    <x-jet-label for="references" value="referencias" />
                    <x-jet-input wire:model="references"  placeholder="{{$user->references}}" class="block mt-1 w-full" type="text" name="references"  autocomplete="off" />
                </div>
    
                
        <div class="bg-yellow-200 rounded-xl shadow-xl py-4 mt-4 flex justify-center items-center gap-6">
            <label for="">
                <input {{count($user->roles) ?  'checked' : ''}} type="radio" value="1" wire:change="assignRole({{$user->id }}, $event.target.value )" >
                <span>Admin</span>
            </label>
            <label for="">
                <input {{count($user->roles) ?  '' : 'checked'}} type="radio" value="0" wire:change="assignRole({{$user->id }}, $event.target.value )" >
                <span>Cliente</span>
            </label>

        </div>

        <div class="flex items-center justify-end mt-4">
                    
    
            <x-jet-button wire:click="update" class="ml-4">
                Actualizar
            </x-jet-button>
        </div>
              
            
        </div>
 
    </div>
</div>
