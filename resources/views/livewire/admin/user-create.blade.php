<div class="bg-purple-200">
   
    <div class="flex justify-center py-4  ">

        <div class="bg-white rounded-xl shadow-xl p-4">
            

                <div>
                    <x-jet-label for="name" value="{{ __('Name') }}" />
                    <x-jet-input  wire:model="name" class="block mt-1 w-full" type="text" required autofocus autocomplete="name" />
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input  wire:model="email" class="block mt-1 w-full" type="email" required />
                </div>
    
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input wire:model="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                    </div>
        
                    {{-- <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div> --}}
                </div>
                
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="telefono" value="telefono" />
                        <x-jet-input wire:model="telefono" id="telefono" class="block mt-1 w-full" type="number" name="telefono" required autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="address" value="direccion" />
                        <x-jet-input wire:model="address" class="block mt-1 w-full" type="text" name="address"  autocomplete="off" />
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="state" value="estado" />
                        <x-jet-input wire:model="state" class="block mt-1 w-full" type="text" name="state"  autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="city" value="ciudad" />
                        <x-jet-input wire:model="city" class="block mt-1 w-full" type="text" name="city"  autocomplete="off" />
                    </div>
                </div>
                <div class="flex gap-6">
                    <div class="mt-4">
                        <x-jet-label for="colonia" value="colonia" />
                        <x-jet-input wire:model="colonia" class="block mt-1 w-full" type="text" name="colonia"  autocomplete="off" />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="cp" value="codigo postal" />
                        <x-jet-input wire:model="cp" class="block mt-1 w-full" type="text" name="cp"  autocomplete="off" />
                    </div>
                </div>
                <div class="mt-4">
                    <x-jet-label for="references" value="referencias" />
                    <x-jet-input wire:model="references" class="block mt-1 w-full" type="text" name="references"  autocomplete="off" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
    
                    <x-jet-button wire:click="create" class="ml-4">
                        Registrar
                    </x-jet-button>
                </div>
            
        </div>
    </div>
</div>
