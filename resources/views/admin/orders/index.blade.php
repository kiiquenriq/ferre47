<x-admin-layout>
    <div class="bg-pink-200">
        <div class="container">
            <h1 class="text-2xl text-center py-8 font-semibold  ">Ordenes</h1>
            <section>
                <div>
                
                    <form class="px-6 py-4">
                        <input
                            wire:model="search" 
                            class="w-full form-control rounded-lg shadow form-control-lg" type="text" placeholder="Inserte nombre de producto" style="width: 25rem">
                    </form>
                    
                </div>
            </section>
            <section class="bg-white shadow-xl rounded-xl mb-8">
                <h2 class="text-center text-xl text-gray-700 py-2">Lista de clientes</h2>
                <div class="flex flex-col">
                    @foreach ($users as $user)
                    <a href="{{route('admin.orders.show', $user)}}" class=" hover:bg-green-100 flex">
                        <span class="px-4 py-2 text-gray-700 font-semibold">{{$user->id}}</span>

                        <div class="ml-auto px-4 text-gray-700 font-semibold">{{$user->name}}</div>
                    </a>
                    @endforeach
                </div>
            </section>
            <div class="py-1"></div>
        </div>
    </div>
 
</x-admin-layout>