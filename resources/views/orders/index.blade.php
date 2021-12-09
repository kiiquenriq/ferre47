<x-app-layout >
    <div class="bg-gray-200 py-12">
       <div class="container">
           {{-- tarjetas  href="{{route('orders.index') ."?status=8"}}"  --}}
            <div class="grid md:grid-cols-5 grid-cols-1 gap-6">
                <a  class=" bg-yellow-500 bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8 ">
                    <p class="text-center text-2xl font-bold">{{$orders->where('status_paid', 8)->count()}}</p>
                    <p class="text-center font-semibold ">Por cobrar</p>
                </a>
                <a  class=" bg-green-500 bg-opacity-50 cursor-pointer  rounded-xl bg-opacity px-12 py-8">
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
                        {{$orders->where('status_paid', 8)->sum('total')}}
                    </p>
                    <p class="text-center font-semibold ">Total </p>
                </div>
            </div>

       </div>
    </div>

    <div class="bg-orange-200 py-8">
        <div class="container">
            <div class="bg-white rounded-xl shadow-xl my-4">

               <h1 class="text-2xl text-center text-gray-700 font-semibold pt-2">Pedidos recientes</h1> 

               <ul class="pb-4">
                   @foreach ($orders as $order)
                       <li  class="text-gray-800 hover:text-gray-700 mb-8">
                           <a href="{{route('orders.show', $order)}}" class="flex py-2 px-4 my-4 hover:bg-gray-100 items-center text-gray-700 hover:text-gray-700 ">
                                
                                   <div class="flex gap-2">
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

                                {{-- # orden --}}
                                <span>
                                    Orden: O-{{$order->id}}
                                </span>
                                   </div>
                                    {{-- total --}}
                                    <div class="ml-auto">
                                        <span>
                                            <p>Total: <span class="font-semibold">{{$order->total}}</span></p>
                                 
                                        </span>

                                    </div>
                                    {{-- total --}}
                                    <i class=' hidden md:block px-6 bx bx-right-arrow-alt text-2xl text-blue-800'></i>
                           </a>
                       </li>
                   @endforeach
               </ul>

               
            </div>
        </div>
    </div>
</x-app-layout>