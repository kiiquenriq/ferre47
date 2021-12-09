 <div>
    
   
        <div class="bg-green-200">
            <div class="container">
                <h1 class="text-2xl text-center py-8 font-semibold  ">Ordenes</h1>
                <section>
                    <div>
                    
                        <form class="px-6 py-4" >
                            <input
                                
                                 wire:model="search"
                                class="w-full form-control rounded-lg shadow form-control-lg" type="text" placeholder="Nombre del cliente" >
                            <input type="submit" hidden >
                        </form>
                        
                        
                    </div>
                </section>
                <section >
                    <h2 class="text-center text-2xl font-bold text-gray-700 py-2">Lista de clientes</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 m-4 gap-2">
                        @foreach ($users as $user)
                      

                            <div class="bg-white shadow-xl rounded-xl mb-8">
                            <a href="{{route('admin.orders.show', $user)}}">
                                <div>
                                    <p class="text-center py-2 font-semibold text-xl">{{$user->name}}</p>
                                    <p class="text-sm text-gray-700 text-center">Numero de cliente: <span>{{$user->id}}</span></p>
                                    <p class="text-sm text-gray-700 text-center">Telefono: <span>{{$user->telefono}}</span></p>
                                    {{-- <a href="{{route('admin.orders.show', $user)}}">Ir</a> --}}
                                </div>
                            </a>
                            

                        </div>
                        @endforeach 
                    </div>
                </section>
                <div class="py-1"></div>
            </div>
        </div>
     



</div> 





