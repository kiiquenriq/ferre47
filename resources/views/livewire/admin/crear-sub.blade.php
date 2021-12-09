<div>
   <section class="bg-green-200 py-12">
    <div class="container">
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
                {{-- slug --}}
                <div class="col-span-6 md:col-span-3">
                    <x-jet-label>Slug</x-jet-label>
                    <x-jet-input type="text" disabled  class="w-full bg-gray-100" wire:model="slug"></x-jet-input>
                    <x-jet-input-error for="slug" />
                </div>
                <div>
                    <select wire:model="category_id">
                        <option value="">Seleccione una categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            
                        @endforeach

                    </select>
                    <x-jet-input-error for="category_id" />
                    
                    {{$category_id}}
                </div>
             
            </x-slot>
            <x-slot name="actions">
                <x-jet-action-message on="saved" class="mx-4">Categoria creada </x-jet-action-message>
                <x-jet-button wire:model="save">Crear</x-jet-button>
            </x-slot>
        </x-jet-form-section>
 
    </div>
</section>
</div>
