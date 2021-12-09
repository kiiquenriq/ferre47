<div class="bg-pink-200 py-4">
   <div class="container">

    <section class="bg-white rounded-lg shadow-lg py-4 mt-6">
        <h2 class="text-center font-bold text-gray-700 text-2xl">Clientes</h2>
    </section>

       {{-- clientes --}}
       <div class="container py-12">

        {{-- buscador --}}
        <div class="flex justify-center">
                
             <form class="px-6 py-4">
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
                        Dirección
                        </th>
                      
                        <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
            <tbody class="bg-white divide-y divide-gray-200">

                @foreach ($users as $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                {{-- <img class="h-10 w-10 rounded-full object-cover" src="{{Storage::url($product->images->first()->url)}}" alt=""> --}}
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <p class="font-bold">{{$user->name}}</p>
                                    <p>Telefono: {{$user->telefono}}</p>
                                </div>
                            </div>
                        </div>
                    </td>

                   
                    <td>
                        <p>Calle: {{$user->address}}</p>
                        <p>Referencia: {{$user->references}}</p>

                    </td>
                   
                    {{-- editar --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div>
                            @if ($user->roles->count())
                                <p class="bg-purple-100 rounded-md py-4 font-semibold text-center text-purple-700 ">Admin</p>
                            @else
                                <p class="bg-pink-100 rounded-md py-4 font-semibold text-center text-pink-700 ">Cliente</p> 
                            @endif
                        </div>
                        <a href="{{route('admin.users.edit', $user)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                    
                @endforeach

        
                    <!-- More people... -->
            </tbody>

            </table>

            <div class="px-6 py-4">
                {{$users->links()}}
            </div>
        </x-table-responsive>     
    </div>

   </div>
</div>
