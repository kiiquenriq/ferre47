<div class="bg-orange-100">

    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between">
            <h2 class="font-semibold text-xl text-gray-600 leading-tight">Lista de productos</h2>
            <div class="flex flex-col md:flex-row gap-4">
               <a href="{{route('admin.products.create')}}" > <button  class="btn btn-info font-semibold bg-teal-500">Crear producto</button> </a>
               <a href="{{route('admin.product.qtyinventory')}}" > <button  class="btn btn-info font-semibold bg-greenLime-400">Actualizar Inventario</button> </a>
               <a href="{{route('admin.update.price')}}" > <button  class="btn btn-info font-semibold bg-purple-600 ">Actualizar Precio</button> </a>
            </div>
        </div>

    </x-slot>


    {{-- productos table --}}
    <div class="container py-12">

        {{-- buscador --}}
        <div>
                
            <form class="flex justify-center py-4">
                <input
                    wire:model ="search" 
                    class="w-full form-control rounded-lg shadow form-control-lg" type="text" placeholder="Inserte nombre de producto" >
            </form>

        </div>

        {{-- tabla de productos --}}
        <x-table-responsive>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Categoria
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Estado
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Precio
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                {{-- <img class="h-10 w-10 rounded-full object-cover" src="{{Storage::url($product->images->first()->url)}}" alt=""> --}}
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$product->name}}
                                </div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{$product->subcategory->name}}</div>
                   
                    </td>
                    {{-- Satus --}}
                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($product->status)
                            @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-red-800">
                                Borrador
                            </span>
                                @break
                            @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Publicado
                            </span>
                                @break
                            @default
                                
                        @endswitch
                    </td>
                    {{-- precio --}}
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        ${{$product->price}}
                    </td>
                    {{-- editar --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{route('admin.products.edit', $product)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                    
                @endforeach

        
                    <!-- More people... -->
            </tbody>

            </table>

            <div class="px-6 py-4">
                {{$products->links()}}
            </div>
        </x-table-responsive>     
    </div>
    
</div>