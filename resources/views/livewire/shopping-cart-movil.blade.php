
<section  class="bg-teal-100 py-10 md:hidden">
    <div class="container ">
        <section class="bg-white rounded-lg shadow-xl  text-gray-600 my-10 ">
           
        <div  class="py-4">
            
            @if (Cart::count())
                <h1 class="text-2xl font-semibold text-center mb-6">Carro de comprassss</h1>
                           {{-- contenido de carrito --}}
            <table class="table-auto  w-full">
                <thead>
                    <tr>
                        <th></th>
                       

                    </tr>
                </thead>
                <tbody>
                    @foreach (Cart::content() as $item)
                       <tr >
                           {{-- datos --}}
                           <td>
                                <div class="flex ">
                                    <img class="h-15 w-20 object-cover mx-4" src="{{$item->options->image}}" alt="">
                                    <div>
                                        <p class="font-bold">{{$item->name}}</p>
                                        <div class="flex items-center">
                                            <span class="text-lg font-semibold text-center text-trueGray-800">${{$item->price}}</span>
                                            <a wire:click ="delete('{{$item->rowId}}')" wire.loading.class ="text-red-600" wire:target="delete('{{$item->rowId}}')" class="hover:text-red-600 cursor-pointer"><i class='bx text-2xl px-4 bxs-trash hover:text-red-600'  ></i></a>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                            <p class="pr-8 font-semibold text-xl">$ {{$item->price * $item->qty}}</p>
                                        </div>
                                    </div>
                                
                                </div> 
                           </td>
                       
           
                           {{--total --}}
                           {{-- <td class="text-center" >
                               <p class="pr-8 font-semibold text-xl">$ {{$item->price * $item->qty}}</p>
                           </td> --}}
                        </tr> 
                    @endforeach
                </tbody>
            </table>
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
</section>
