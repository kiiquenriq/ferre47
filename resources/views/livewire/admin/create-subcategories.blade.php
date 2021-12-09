<div>
    {{-- Crear categoria --}}
   <section class="bg-purple-200 py-12">
        <div class="container">
            <h2 class="text-2xl text-center font-semibold text-gray-600">Subcategorias</h2>
            <div class="flex justify-end">
                <a href="{{route('admin.subcategory.create')}}" ><x-jet-button class="bg-purple-700">Crear una subcategoria</x-jet-button></a>
            </div>
     
        </div>
   </section>
   {{-- mostrar categorias --}}

 
    <section class="bg-red-200 py-12">
       <div class="container">
           

            {{-- buscador --}}
        
           <div>
               <x-jet-action-section>
                   <x-slot name="title">
                       Lista de subcategorias
                   </x-slot>
                   <x-slot name="description"></x-slot>
                   <x-slot name="content">
                       {{-- Buscador --}}
                    <div>
                
                        <form class="px-6 py-4">
                             <input
                                wire:model ="search" 
                                class="w-full form-control rounded-lg shadow form-control-lg" type="text" placeholder="Inserte nombre de la subcategoria">
                        </form>
        
                    </div>
                       <table class="text-gray-600 w-auto">
                           <thead class="border-b border-gray-300">
                               <tr class="text-left ">
                                   <th class="py-2 w-full">Nombre</th>
                                   <th class="py-2">Accion</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($subcategories as $subcategory)
                                   <tr>
                                       <td class="py-2 border-b border-gray-200">
                                           <h2 class="text-xl font-semibold">{{$subcategory->name}}</h2>
                                            
                                       </td>
                                       {{-- <td class="py-2">
                                           <div class="flex gap-4">
                                               <a href="" class=" cursor-pointer hover:text-xl transition-all" >Editar</a>
                                               <a class="hover:text-red-600 hover:text-xl transition-all cursor-pointer" wire:click="delete">Eliminar</a>
                                           </div>
                                       </td> --}}
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>
                       <div>
                           {{$subcategories->links()}}
                       </div>
                     
                   </x-slot>
               </x-jet-action-section>
           </div>
       </div>
     
   </section> 
    {{-- crear marca --}}
   <section class="bg-yellow-200 py-12">
       <h2 class="text-center text-2xl text-gray-600">Marcas</h2>

      <div class="container flex justify-end">
        <a href="{{route('admin.brands.create')}}"><x-jet-button class="bg-yellow-600 hover:bg-purple-700">Crear una marca</x-jet-button></a>
      </div>
   


   </section>

         {{-- Lista marca --}}
         <section class="bg-teal-200 py-12">
            <div class="container">
                
     
                
             
                <div class="container">
                    <x-jet-action-section>
                        <x-slot name="title" >
                            Lista de marcas
                        </x-slot>
                        <x-slot name="description"></x-slot>
                        <x-slot name="content">
                            {{-- Buscador --}}
    
                            <table class="text-gray-600 w-auto">
                                <thead class="border-b border-gray-300">
                                    <tr class="text-left ">
                                        <th class="py-2 w-full">Nombre</th>
                                        <th class="py-2">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $brand)
                                        <tr>
                                            <td class="py-2 border-b border-gray-200">
                                                <h2 class="text-xl font-semibold">{{$brand->name}}</h2>
                                                 
                                            </td>
                                            {{-- <td class="py-2">
                                                <div class="flex gap-4">
                                                    <a href="" class=" cursor-pointer hover:text-xl transition-all" >Editar</a>
                                                    <a class="hover:text-red-600 hover:text-xl transition-all cursor-pointer" wire:click="delete">Eliminar</a>
                                                </div>
                                            </td> --}}
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
