<div>

    <div class="bg-blue-200 py-8">
        <div class="container">
            {{-- datos --}}
            <section class="bg-white rounded-xl shadow-xl py-4">
                
                <div><p class="text-center text-2xl font-semibold">{{$users->name}}</p></div>
                <div class="mx-4">
                    <p>Telefono: {{$users->telefono}}</p>
                    <p>Direccion: {{$users->address}}, {{$users->colonia}}, {{$users->city}}, {{$users->state}}, {{$users->cp}}</p>
                    <p>Referencias: {{$users->references}}</p>
                </div>
             
            </section>
            {{-- datos admin--}}

    

            {{-- tarjetas --}}

            <section class=" my-4">

                <div class="grid md:grid-cols-5 grid-cols-1 gap-6 justify-center">
                    <a  class=" bg-yellow-500  bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8">
                        <p class="text-center text-2xl font-bold">{{$orders->where('status_paid', 8)->count()}}</p>
                        <p class="text-center font-semibold ">Por cobrar</p>
                    </a>
                    <a  class=" bg-green-500 items-center bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8">
                        <p class="text-center text-2xl font-bold">{{$orders->where('status_paid', 7)->count()}}</p>
                        <p class="text-center font-semibold ">Pagado</p>
                    </a>
                    <a  class=" bg-red-500 bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8">
                        <p class="text-center text-2xl font-bold">{{$orders->where('status_paid', 6)->count()}}</p>
                        <p class="text-center font-semibold ">Cancelado</p>
                    </a>
                    <a  class=" bg-purple-500 bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8">
                        <p class="text-center text-2xl font-bold">{{$orders->where('status_paid', 5)->count()}}</p>
                        <p class="text-center font-semibold ">Procesando</p>
                    </a>
                    <div class=" bg-orange-500  rounded-xl bg-opacity px-12 py-8">
                        <p class="text-center text-2xl font-bold">
                            {{-- {{$orders->where('status_paid', 8)->sum('acuenta')}} --}}
                             {{$orders->where('status_paid', 8)->sum('Acuenta')}} 
                        </p>
                        <p class="text-center font-semibold ">Total </p>
                    </div>
                </div>
    
            </section>

            {{-- Ordenes --}}
            
           
       


          
        </div>
    </div>
    {{-- orden proceso --}}

     <div class="bg-purple-200 py-4">
        <div class="container">
            <section>
                <h2 class="text-center font-semibold text-2xl py-4">Ordenes en proceso</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @foreach ($orders as $order)
                        @if($order->status_paid == 5)
                        <a href="{{route('admin.orders.detail', $order)}}">
                            <div class="bg-white rounded-xl shadow-xl py-2" >
                                <p class="text-center py-2 font-semibold">Orden-{{$order->id}}</p>
                                <p class="text-center py-2">{{$order->created_at}}</p>
                                <div class="flex justify-center items-center py-2">

                                 
                                    <span>
                                        @switch($order->status_paid) 
                                            @case(8)
                                                <span class="bg-yellow-300 p-1 font-semibold rounded-lg" >Por cobrar</span>
                                                @break
                                            @case(7)
                                                <span class="bg-green-500 p-1 font-semibold rounded-lg" >Pagado</span>
                                                @break
                                            @case(6)
                                                <span class="bg-red-500 p-1 font-semibold rounded-lg" >Cancelado</span>
                                                @break
                                            @case(5)
                                                <span class="bg-blue-500 p-1 font-semibold rounded-lg" >Procesando</span>
                                                @break
                                                    
                                            @default
                                                            
                                        @endswitch
                                    </span>

                               
                                    <span class="mx-2">
                                        @switch($order->status_shipped) 
                                        @case(1)
                                            <span class="bg-blue-400 p-1 font-semibold rounded-lg" >Pendiente</span>
                                            @break
                                        @case(2)
                                        <span class="bg-purple-400 p-1 font-semibold rounded-lg" >En camino</span>
                                            @break
                                        @case(3)
                                        <span class="bg-green-500 p-1 font-semibold rounded-lg" >Entregado</span>
                                            @break
                                        @case(4)
                                        <span class="bg-red-400 p-1 font-semibold rounded-lg" >No entregado</span>
                                            @break
                                    
                                        @default
                                            
                                        @endswitch
                                    </span>
        
                                </div>
                                <p class="font-bold text-xl text-center  py-2">${{$order->total}}</p>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>
     
    {{-- orden por cobrar --}}


    <div class="bg-yellow-200 py-4">
        <div class="container">
            <section>
                <h2 class="text-center font-semibold text-2xl py-4">Ordenes por cobrar</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                  
                    @foreach ($orders as $order)
                        @if($order->status_paid == 8 )
                        

                        <a href="{{route('admin.orders.detail', $order)}}">
                            <div class="bg-white rounded-xl shadow-xl py-2" >
                                <p class="text-center py-2 font-semibold">Orden-{{$order->id}}</p>
                                <p class="text-center py-2">{{$order->created_at}}</p>
                                <div class="flex justify-center items-center py-2">

                                 
                                    <span>
                                        @switch($order->status_paid) 
                                            @case(8)
                                                <span class="bg-yellow-300 p-1 font-semibold rounded-lg" >Por cobrar</span>
                                                @break
                                            @case(7)
                                                <span class="bg-green-500 p-1 font-semibold rounded-lg" >Pagado</span>
                                                @break
                                            @case(6)
                                                <span class="bg-red-500 p-1 font-semibold rounded-lg" >Cancelado</span>
                                                @break
                                            @case(5)
                                                <span class="bg-blue-500 p-1 font-semibold rounded-lg" >Procesando</span>
                                                @break
                                                    
                                            @default
                                                            
                                        @endswitch
                                    </span>

                                    <span class="mx-2">
                                        @switch($order->status_shipped) 
                                        @case(1)
                                            <span class="bg-blue-400 p-1 font-semibold rounded-lg" >Pendiente</span>
                                            @break
                                        @case(2)
                                        <span class="bg-purple-400 p-1 font-semibold rounded-lg" >En camino</span>
                                            @break
                                        @case(3)
                                        <span class="bg-green-500 p-1 font-semibold rounded-lg" >Entregado</span>
                                            @break
                                        @case(4)
                                        <span class="bg-red-400 p-1 font-semibold rounded-lg" >No entregado</span>
                                            @break
                                    
                                        @default
                                            
                                        @endswitch
                                    </span>
        
                                </div>
                                <p class="font-bold text-xl text-center  py-2">${{$order->total}}</p>
                            </div>
                        </a>

                      
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div> 


    {{-- orden por pagada --}}

    
    <div class="bg-green-200 py-4">
        <div class="container">
            <section>
                <h2 class="text-center font-semibold text-2xl py-4">Ordenes pagadas</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @php
                    $count=0;
                @endphp
                    @foreach ($orders as $order)
                        @if($order->status_paid == 7)
                        @break( $count== 10)
                        <a href="{{route('admin.orders.detail', $order)}}">
                            <div class="bg-white rounded-xl shadow-xl py-2" >
                                <p class="text-center py-2 font-semibold">Orden-{{$order->id}}</p>
                                <p class="text-center py-2">{{$order->created_at}}</p>
                                <div class="flex justify-center items-center py-2">

                                
                                    <span>
                                        @switch($order->status_paid) 
                                            @case(8)
                                                <span class="bg-yellow-300 p-1 font-semibold rounded-lg" >Por cobrar</span>
                                                @break
                                            @case(7)
                                                <span class="bg-green-500 p-1 font-semibold rounded-lg" >Pagado</span>
                                                @break
                                            @case(6)
                                                <span class="bg-red-500 p-1 font-semibold rounded-lg" >Cancelado</span>
                                                @break
                                            @case(5)
                                                <span class="bg-blue-500 p-1 font-semibold rounded-lg" >Procesando</span>
                                                @break
                                                    
                                            @default
                                                            
                                        @endswitch
                                    </span>

                                  
                                    <span class="mx-2">
                                        @switch($order->status_shipped) 
                                        @case(1)
                                            <span class="bg-blue-400 p-1 font-semibold rounded-lg" >Pendiente</span>
                                            @break
                                        @case(2)
                                        <span class="bg-purple-400 p-1 font-semibold rounded-lg" >En camino</span>
                                            @break
                                        @case(3)
                                        <span class="bg-green-500 p-1 font-semibold rounded-lg" >Entregado</span>
                                            @break
                                        @case(4)
                                        <span class="bg-red-400 p-1 font-semibold rounded-lg" >No entregado</span>
                                            @break
                                    
                                        @default
                                            
                                        @endswitch
                                    </span>
        
                                </div>
                                <p class="font-bold text-xl text-center  py-2">${{$order->total}}</p>
                            </div>
                        </a>
                        @php
                        $count++;
                    @endphp
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    {{-- orden cancelada --}}
    <div class="bg-red-200 py-4">
        <div class="container">
            <section>
                <h2 class="text-center font-semibold text-2xl py-4">Ordenes por canceladas</h2>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @foreach ($orders as $order)
                        @if($order->status_paid == 6)
                        <a href="{{route('admin.orders.detail', $order)}}">
                            <div class="bg-white rounded-xl shadow-xl py-2" >
                                <p class="text-center py-2 font-semibold">Orden-{{$order->id}}</p>
                                <p class="text-center py-2">{{$order->created_at}}</p>
                                <div class="flex justify-center items-center py-2">

                                    {{-- status paid --}}
                                    <span>
                                        @switch($order->status_paid) 
                                            @case(8)
                                                <span class="bg-yellow-300 p-1 font-semibold rounded-lg" >Por cobrar</span>
                                                @break
                                            @case(7)
                                                <span class="bg-green-500 p-1 font-semibold rounded-lg" >Pagado</span>
                                                @break
                                            @case(6)
                                                <span class="bg-red-500 p-1 font-semibold rounded-lg" >Cancelado</span>
                                                @break
                                            @case(5)
                                                <span class="bg-blue-500 p-1 font-semibold rounded-lg" >Procesando</span>
                                                @break
                                                    
                                            @default
                                                            
                                        @endswitch
                                    </span>

                                    {{-- status shipped --}}
                                    <span class="mx-2">
                                        @switch($order->status_shipped) 
                                        @case(1)
                                            <span class="bg-blue-400 p-1 font-semibold rounded-lg" >Pendiente</span>
                                            @break
                                        @case(2)
                                        <span class="bg-purple-400 p-1 font-semibold rounded-lg" >En camino</span>
                                            @break
                                        @case(3)
                                        <span class="bg-green-500 p-1 font-semibold rounded-lg" >Entregado</span>
                                            @break
                                        @case(4)
                                        <span class="bg-red-400 p-1 font-semibold rounded-lg" >No entregado</span>
                                            @break
                                    
                                        @default
                                            
                                        @endswitch
                                    </span>
        
                                </div>
                                <p class="font-bold text-xl text-center  py-2">${{$order->total}}</p>
                            </div>
                        </a>
                        @endif
                    @endforeach
                </div>
            </section>
        </div>
    </div>
  
</div>