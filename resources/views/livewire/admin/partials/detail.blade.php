<div x-data>
    <div class="container py-4 mx-2">
        <div class="bg-white shadow-xl rounded-xl py-4">


            {{-- <div class=" mx-2 tblscroll" style="overflow: hidden">
                @if(Cart::count())
              <a wire:click="clearCart" class="cursor-pointer">limpiar</a>
                <table class="w-full">
                    <thead class= "text-white" style="background-color: rgb(7,35,94">
                        <tr>
                            <th class="w-2"></th>
                            <th class="w-2 text-white">Precio</th>
                            
                            <th class="w-2 text-white">Cantidad</th>
                            <th class="w-2 text-white">Importe</th>
                            <th class="w-2 text-white">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                        
                        
                            <tr>
                                <td>
                                    <div class="flex gap-1 items-center">
                                        <div >
                                            <img class="h-15 w-20 object-cover mx-4" src="{{$item->options->image}}" alt=""> 
                                        
                                        </div>
                                        <p class="mx-4 text-left w-full ">{{$item->name}}</p>
                                    </div>
                                </td>
                                <td style="width: 10%">
                                    <p>{{$item->price}}</p>
                                </td>
                                <td style="width: 10%">
                                   
                                      @livewire('admin.partials.qty-update', ['rowId' => $item->rowId], key($item->rowId))   

                                     <input 
                                        type="number" id="r{{$item->rowId}}" 
                                        wire:change="updateQty({{$item->rowId}}, $('#r' + {{$item->rowId}}).val())" 
                                        
                                        min="1" value="{{$item->qty}}" 
                                         max="{{$quantity}}">
                                        {{$prueba}}


                                        
                                        
                                    {{$item->rowId}}
                                  
                                    
                                </td>
                                <td>
                                    <p class="pr-8 font-semibold text-xl">$ {{$item->price * $item->qty}}</p>
                                </td>
                                <td>
                                       
                                    <button onclick="Confirm('{{$item->id}}', 'remove item', 'Confirma eliminar registro')" wire:click="removeItem">
                                        <i class='bx bx-x text-xl text-red-500'></i>
                                    </button>
                                
                                    <button wire:click="increaseQty({{$item->rowId}})">
                                        <i class='bx bx-minus' ></i>
                                    </button> 
                                </td>
                              
                            </tr>

                        @endforeach
                    </tbody>
                </table>
                @endif
                <h5>agregar productos a la venta</h5>
            </div> --}}



            <div  class="tblscroll">
                <div  class="py-4">
            
                    @if (Cart::count())
                     
                                   {{-- contenido de carrito --}}
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                               <tr  >
                                   {{-- datos --}}
                                   <td >
                                        <div class="flex px-2">
                                            <img class="hidden md:block h-15 w-20 object-cover mx-4" src="{{$item->options->image}}" alt="">
                                            <div class="text-black text-base">
                                                <p class="font-bold">{{$item->name}}</p>
                                                <span>Codigo: {{$item->options->codigo}}</span>
                                            </div>
                                        
                                        </div> 
                                   </td>
                                   {{-- precio --}}
                                   <td class="flex items-center pt-4">
                                       <span class="text-base font-semibold text-center text-trueGray-800">${{$item->price}}</span>
                                       <a wire:click ="delete('{{$item->rowId}}')" wire.loading.class ="text-red-600" wire:target="delete('{{$item->rowId}}')" class="hover:text-red-600 cursor-pointer"><i class='bx text-2xl px-1 bxs-trash hover:text-red-600'  ></i></a>
                                   </td>
                                   {{-- cantidad --}}
                                   <td  >
                                    <div class="flex items-center">
                                        @if ($item->options->size)
        
                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))
                                        
                                    @elseif($item->options->color)
                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId], key($item->rowId))
                                    @else
                                        <div class="flex items-center" >
                                             @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId)) 
                                            {{-- @livewire('admin.partials.qty-update', ['rowId' => $item->rowId], key($item->rowId))  --}}
                                           
                                            
                                          
                                        </div>
                                    @endif
                                    </div>
                                   </td>
                                   {{--total --}}
                                   <td class="text-center" >
                                       <p class=" font-semibold text-base">$ {{$item->price * $item->qty}}</p>
                                   </td>
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
                            <p class=" text-center text-2xl font-bold">Use el Scanner para agregar productos</p>
  
                        </div>
                        
                    @endif
                </div>
            </div>

            
        </div>

        <div wire:loading.inline wire:target="saveSale">
            <h1>Guardardando venta....</h1>
        </div>

 
    </div>
</div>