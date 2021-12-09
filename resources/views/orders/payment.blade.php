<x-app-layout>

    <div class="bg-red-200">
        <div class="container py-8 ">
            <section class=" bg-white rounded-xl shadow-xl px-6 py-4 flex justify-between items-center">
                <p class="text-gray-700">Numero de orden: <span class="font-bold">O-{{$order->id}}</span></p>
                <h2 class="text-xl font-bold ">Resumen del pedido</h2>

            </section>
                {{-- envio y detalles del cliente --}}
            <section class=" bg-white rounded-xl shadow-xl px-6 py-4 my-6">
                <div class="grid grid-cols-2 gap-6">
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
                <a href="{{route('orders.show', $order)}}"><x-jet-button class="bg-green-500">Continuar</x-jet-button></a>
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