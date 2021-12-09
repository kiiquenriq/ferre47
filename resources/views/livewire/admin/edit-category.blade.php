  {{-- modal --}}
<div>
    <section class="pt-12 pb-36 bg-purple-200">
        <div class="container">
            <x-jet-form-section submit="update">
                <x-slot name="title">
                    Editar Categoria
                </x-slot>
                <x-slot name="description">
                    Complete informacion para crear una nueva categoria
                </x-slot>
                <x-slot name="form">
                    {{-- nombre --}}
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label>Nombre</x-jet-label>
                        <x-jet-input type="text" class="w-full" wire:model="editForm.name"></x-jet-input>
                        <x-jet-input-error for="editForm.name" />
                    </div>
                    {{-- slug --}}
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label>Slug</x-jet-label>
                        <x-jet-input type="text" disabled  class="w-full bg-gray-100" wire:model="editForm.slug"></x-jet-input>
                        <x-jet-input-error for="editForm.slug" />
                    </div>
                    {{-- brand --}}
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label>Marcas</x-jet-label>
     
                        <div  >
                             <x-jet-label  >
                                 @foreach ($brands as $brand)
                                     <x-jet-checkbox wire:model.defer="editForm.brand" class="mx-1"
                                                 name="brand[]" value="{{$brand->id}}"/>{{$brand->name}}
                                 @endforeach
                             </x-jet-label>
                        </div>
                        <x-jet-input-error for="editForm.brand" />
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message on="saved" class="mx-4">Categoria creada </x-jet-action-message>
                    <x-jet-button wire:click="update">Actualizar</x-jet-button>
                </x-slot>
            </x-jet-form-section>
     
        </div>
   </section>
</div>