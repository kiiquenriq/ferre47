<div>
    {{-- Crear categoria --}}
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
                        <x-jet-input type="text" class="w-full" wire:model="createForm.name"></x-jet-input>
                        <x-jet-input-error for="createForm.name" />
                    </div>
                    {{-- slug --}}
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label>Slug</x-jet-label>
                        <x-jet-input type="text" disabled  class="w-full bg-gray-100" wire:model="createForm.slug"></x-jet-input>
                        <x-jet-input-error for="createForm.slug" />
                    </div>
                    {{-- brand --}}
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label>Marcas</x-jet-label>
     
                        <div  >
                             <x-jet-label  >
                                 @foreach ($brands as $brand)
                                     <x-jet-checkbox wire:model.defer="createForm.brand" class="mx-1"
                                                 name="brand[]" value="{{$brand->id}}"/>{{$brand->name}}
                                 @endforeach
                             </x-jet-label>
                        </div>
                        <x-jet-input-error for="createForm.brand" />
                    </div>
                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message on="saved" class="mx-4">Categoria creada </x-jet-action-message>
                    <x-jet-button>Crear</x-jet-button>
                </x-slot>
            </x-jet-form-section>
     
        </div>
   </section>
   {{-- mostrar categorias --}}
   <section class="bg-red-200 py-12">
       <div class="container">
           <h2 class="text-2xl text-center font-semibold text-gray-600">Categorias</h2>
           <div>
               <x-jet-action-section>
                   <x-slot name="title">
                       Lista de categorias
                   </x-slot>
                   <x-slot name="description"></x-slot>
                   <x-slot name="content">
                       <table class="text-gray-600 w-auto">
                           <thead class="border-b border-gray-300">
                               <tr class="text-left ">
                                   <th class="py-2 w-full">Nombre</th>
                                   <th class="py-2">Accion</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($categories as $category)
                                   <tr>
                                       <td class="py-2 border-b border-gray-200">
                                           <h2 class="text-xl font-semibold">{{$category->name}}</h2>
                                          
                                       </td>
                                       <td class="py-2">
                                           <div class="flex gap-4">
                                               <a href="{{route('admin.category.edit', $category)}}" class=" cursor-pointer hover:text-xl transition-all" >Editar</a>
                                               <a class="hover:text-red-600 hover:text-xl transition-all cursor-pointer" wire:click="$emit('deleteCategory','{{$category->slug}}')">Eliminar</a>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </x-slot>
               </x-jet-action-section>
           </div>
       </div>
     
   </section>



   

</div>
