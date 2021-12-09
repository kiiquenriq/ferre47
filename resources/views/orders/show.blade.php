<x-app-layout>

    <div class="bg-purple-200">
        <div class="container py-8 ">

            {{-- estatus de pago --}}
        
            <section class=" bg-white rounded-xl shadow-xl px-6 py-4 grid grid-cols-1 md:grid-cols-2 justify-between items-center">
                <p class="text-gray-700">Numero de orden: <span class="font-bold">O-{{$order->id}}</span></p>
                 
                    <span>
                        @if ($order->status_paid == 5)
                        <div class="rounded-lg bg-blue-100 p-2 flex flex-col items-center ">
                            <h2 class="text-xl font-bold ">Estatus del pedido: 
                                <p class="font-semibold text-blue-500">PROCESANDO</p>
                        </div>
    
                        @endif
                        @if ($order->status_paid == 6)
                        <div class="rounded-lg bg-red-100 p-2 flex flex-col items-center ">
                            <h2 class="text-xl font-bold ">Estatus del pedido: 
                            <p class="font-semibold text-red-500">CANCELADO</p>
                        </div>
    
                        @endif
                        @if ($order->status_paid == 7)
                        <div class="rounded-lg bg-green-100 p-2  flex flex-col items-center ">
                            <h2 class="text-xl font-bold ">Estatus del pedido: 
                            <p class="font-semibold text-green-600">PAGADO</p>
                        </div>
    
                        @endif
                        @if ($order->status_paid == 8)
                        <div class="rounded-lg bg-yellow-100 p-2  flex flex-col items-center ">
                            <h2 class="text-xl font-bold ">Estatus del pedido: 
                            <p class="font-semibold text-yellow-500">POR COBRAR</p>
                        </div>
    
                        @endif
                    </span></h2>

            </section>

            {{-- estatus de envio --}}

            <section class="bg-white rounded-xl shadow-xl px-6 py-4 mt-4 ">
                @if($order->status_shipped !=4)
                    <div class="flex items-center">
                        {{-- package --}}
                        <div class="flex items-center flex-col">
                            <div class="{{($order->status_shipped >= 1) ?  'bg-green-400' : 'bg-blue-400'}} h-12 w-12 rounded-full  flex items-center justify-center">
                                <i class='bx bx-package text-white text-xl'></i>
                                <p></p>
                                
                            </div>
                            <div class="{{($order->status_shipped >= 1) ? 'block' : 'hidden'}}">
                                <p class="text-green-700">PROCESANDO</p>
                            </div>
                                
                        </div>
                        {{-- linea --}}
                        <div class="{{($order->status_shipped >= 2) ?  'bg-green-400' : 'bg-blue-400'}} h-1 flex-1  mx-2 rounded-md"></div>
                        {{-- send --}}
                        <div class="flex items-center flex-col">
                            <div class=" {{($order->status_shipped >= 2) ?  'bg-green-400' : 'bg-blue-400'}} h-12 w-12  rounded-full flex items-center justify-center">
                                <i class='bx bxs-truck bx-tada text-white text-2xl'></i>
                            </div>
                            <div class="{{($order->status_shipped >= 2) ? 'block' : 'hidden'}}">
                                <p class="text-green-700">EN CAMINO</p>
                            </div>
                        </div>
                        {{-- linea --}}
                        <div class=" {{($order->status_shipped >= 3) ?  'bg-green-400' : 'bg-blue-400'}} h-1 flex-1  mx-2 rounded-md"></div>
                        {{-- enviado --}}
                        <div class="flex items-center flex-col">
                            <div class="{{($order->status_shipped >= 3) ?  'bg-green-400' : 'bg-blue-400'}} h-12 w-12  rounded-full flex items-center justify-center">
                                <i class='bx bxs-check-circle text-white text-xl'></i>
                            </div>
                            <div class="{{($order->status_shipped >= 3) ? 'block' : 'hidden'}}">
                                <p class="text-green-700">ENTREGADO</p>
                            </div>
                        </div>
                    </div>
                @else
                <div class="flex items-center">
                    {{-- package --}}
                    <div class="flex items-center">
                        <div class="{{($order->status_shipped >= 4) ?  'bg-red-400' : 'bg-blue-400'}} h-12 w-12 rounded-full  flex items-center justify-center">
                            <i class='bx bx-package text-white text-xl'></i>

                        </div>
                    </div>
                    {{-- linea --}}
                    <div class="{{($order->status_shipped >= 4) ?  'bg-red-400' : 'bg-blue-400'}} h-1 flex-1  mx-2 rounded-md"></div>
                    {{-- send --}}
                    <div class="flex items-center">
                        <div class=" {{($order->status_shipped >= 4) ?  'bg-red-400' : 'bg-blue-400'}} h-12 w-12  rounded-full flex items-center justify-center">
                            <i class='bx bxs-truck text-white text-xl'></i>
                        </div>
                    </div>
                    {{-- linea --}}
                    <div class=" {{($order->status_shipped >= 4) ?  'bg-red-400' : 'bg-blue-400'}} h-1 flex-1  mx-2 rounded-md"></div>
                    {{-- enviado --}}
                    <div class="flex items-center">
                        <div class="{{($order->status_shipped >= 4) ?  'bg-red-400' : 'bg-blue-400'}} h-12 w-12  rounded-full flex items-center justify-center">
                            <i class='bx bxs-check-circle text-white text-xl'></i>
                        </div>
                    </div>
                </div>

                @endif
            </section>
                {{-- envio y detalles del cliente --}}
            <section class=" bg-white rounded-xl shadow-xl px-6 py-4 my-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                       <p class="text-xl font-semibold">Envio</p> 
                       @if ($order->envio_type == 1)
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                            <p class="font-bold">Importante!!</p>
                            <p>El envio se recogerá en tienda. </p>
                        </div>
                       @else
                           <p class="font-semibold text-lg text-gray-600 mt-2">direccion de entrega:</p>
                            <div class="mt-2">
                                <p>{{$order->address}}</p>
                                <p>{{$order->colonia}}</p>
                                <p>{{$order->city}}</p>
                                <p>{{$order->state}}</p>
                                <p>{{$order->cp}}</p>
                                <p>{{$order->references}}</p>

                            </div>
                       @endif
                    </div>


                    <div>
                        <p class="text-xl font-semibold">Detalles del cliente:</p> 

                        <div class="mt-4">
                            <p>{{$order->name}}</p>
                            <p>{{$order->telefono}}</p>
                        </div>
                       

                       
                    </div>
                </div>
                

            </section>

            <section class="bg-white rounded-xl shadow-xl px-6 py-4 my-6">
                <h2 class="text-center text-gray-700 text-xl font-semibold">Detalle del pedido</h2>
                <div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <tr class="">
                                    <td>
                                        <div class="flex">
                                            <img src="{{$item->options->image}}" alt="" class="hidden md:block h-15 w-20 object-cover mr-4 ">
                                            <p>{{$item->name}} <br>codigo: {{$item->options->codigo}}</p>
                                            
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{$item->price}}</p>
                                    </td>
                                    <td> 
                                        <p>{{$item->qty}}</p>
                                    </td>
                                    <td>
                                        {{$item->price * $item->qty}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
              
            </section>

            <section class="bg-white rounded-xl shadow-xl px-6 py-4 my-4">

            <div class="flex justify-around items-center">
                {{-- <a href="{{route('orders.show', $order)}}"><x-jet-button class="bg-green-500">Continuar</x-jet-button></a> --}}
                <div class="flex flex-col justify-end items-start">
                    <p>Subtotal: $ {{$order->total - $order->shipping_cost}}</p>
                    <p>Envio: $ {{$order->shipping_cost}}</p>
                    <p class="text-xl"> Total: <span class="font-bold text-xl">$ {{$order->total}}</span></p>
                    
                </div>
            </div>

            </section>
            
        </div>
    </div>
</x-app-layout>