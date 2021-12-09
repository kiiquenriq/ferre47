<section  class="bg-teal-100 py-10">
    <div class="container ">
        <section class="bg-white rounded-lg shadow-xl  text-gray-600 my-10 ">

        <div  class="py-4">

            @if (Cart::count())
                <h1 class="text-2xl font-semibold text-center mb-6">Carro de compras</h1>
                           {{-- contenido de carrito --}}
           @foreach (Cart::content() as $item)

           <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th></th>
                            <th >Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
        
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <tr class="px-4">
                        <td>
                            <div class="flex ">
                                <img class="h-15 w-20 object-cover mx-4 hidden md:block" src="{{$item->options->image}}" alt="">
                                <div>
                                    <p class="font-bold">{{$item->name}}</p>
                                    @if ($item->options->color)
                                        <span>Color : {{$item->options->color}}</span>
        
                                    @endif
                                    @if ($item->options->size)
                                        <span>{{$item->options->size}}</span>
                                    @endif
                                </div>
        
                            </div>
                        </td>
        
        
                        <td class="flex items-center">
                            <span class="text-lg font-semibold text-center text-trueGray-800">${{$item->price}}</span>
                            <a wire:click ="delete('{{$item->rowId}}')" wire.loading.class ="text-red-600" wire:target="delete('{{$item->rowId}}')" class="hover:text-red-600 cursor-pointer"><i class='bx text-2xl px-4 bxs-trash hover:text-red-600'  ></i></a>
                        </td>
        
                        <td  >
                            <div class="flex items-center">
                                @if ($item->options->size)
        
                                @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
        
                            @elseif($item->options->color)
                                @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                            @else
                                @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                            @endif
                            </div>
                        </td>
                        
                        <td class="text-center" >
                            <p class="pr-8 font-semibold text-xl">$ {{$item->price * $item->qty}}</p>
                        </td>
                      </tr>
        
                      <!-- More people... -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
               
           @endforeach
            {{-- borrar carrito --}}
            <div class=" rounded-lg text-center my-8 mx-6 border-gray-500" style="border: 2px solid red">
                <i class='bx text-xl bxs-x-circle' style='color:#ea1409'  ></i>
                <a class="cursor-pointer font-semibold text-xl" wire:click ="destroy">Borrar carrito de compras</a>

            </div>

            @else
                <div>
                    <p class=" text-center text-2xl font-bold">Carrito de compras esta vacio</p>
                    <p class="py-4 text-center font-bold text-2xl">acceda a la <a class="text-orange-400" href="/">tienda</a></p>
                </div>

            @endif
        </div>

        </section>

        {{-- resumen --}}
        <section >
            <div class="bg-white rounded-lg shadow-lg py-6">
                <h2 class="text-2xl text-center font-bold">Resumen</h2>

                @if(Cart::count())
                    <div class=" flex justify-evenly ">
                        <p class=" px-8 flont-semibold text-2xl">Total: <span>$ {{Cart::subTotal()}}</span></p>
                        <a  href="{{route('orders.create', $user)}}"><button type="button" class="btn btn-outline-success">Continuar</button></a>
                    </div>

                @endif
            </div>
        </section>

    </div>



    <!-- This example requires Tailwind CSS v2.0+ -->


</section>
