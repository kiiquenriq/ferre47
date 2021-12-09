<div class="bg-fuchsia-200 py-12">
   <div class="container">
        <h2 class="text-2xl text-gray-600 text-center">Crear una marca</h2>
        <x-jet-form-section submit="save">
            <x-slot name="title">
                Crear Nueva Categoria
            </x-slot>
            <x-slot name="description">
                Complete informacion para crear una nueva categoria
            </x-slot>
            <x-slot name="form">
                {{-- nombre --}}
                <div class="col-span-6 md:col-span-3">
                    <x-jet-label>Nombre</x-jet-label>
                    <x-jet-input type="text" class="w-full" wire:model="name"></x-jet-input>
                    <x-jet-input-error for="name" />
                </div>

             
            </x-slot>
            <x-slot name="actions">
                <x-jet-action-message on="saved" class="mx-4">Categoria creada </x-jet-action-message>
                <x-jet-button wire:model="save">Crear</x-jet-button>
            </x-slot>
        </x-jet-form-section>
 
   </div>
</div>
