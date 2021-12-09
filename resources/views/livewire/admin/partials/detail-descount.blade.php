<div x-data>
    <div class="container py-4 mx-2">
        <div class="bg-white shadow-xl rounded-xl py-4 grid grid-cols-1  md:grid-cols-2 gap-2">




            <div  class="tblscroll bg-red-300 rounded-xl p-2 mx-2">
                <div  class="py-4">
            
                     <h2 class="text-center font-semibold text-xl">Pedido Completo</h2>
                                  
                    <table class="table-auto w-full">
                        <thead class="bg-red-100">
                            <tr>
                                <th>Producto</th>
                                
                                <th>Cantidad</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                               <tr  >
                                   {{-- datos --}}
                                   <td>
                                        <div class="flex ">
                                            
                                            <div class="text-black text-base">
                                                <p class="font-bold">{{$item->name}}</p>
                                                <span>Codigo: {{$item->options->codigo}}</span>
                                            </div>
                                        
                                        </div> 
                                   </td>
                                
                                   {{-- cantidad --}}
                                   <td  >
                                    <div class="flex items-center">
                                 
                                        <div class="flex items-center" >
                                            <p>{{$item->qty}}</p>
                                           
                                            
                                          
                                        </div>
                                   
                                    </div>
                                   </td>
                                   
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
               
               
                </div>
            </div>

            <div  class="tblscroll bg-gray-300 rounded-xl p-2 mx-2">
                <div  class="py-4">
                    <h2 class="text-center font-semibold text-xl">Entregar</h2>
                    @if (Cart::count())
                     
                                   {{-- contenido de carrito --}}
                    <table class="table-auto w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th>Producto</th>
                             
                                <th>Cantidad</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                               <tr  >
                                   {{-- datos --}}
                                   <td>
                                        <div class="flex ">
          
                                            <div class="text-black text-base">
                                                <p class="font-bold">{{$item->name}}</p>
                                                <span>Codigo: {{$item->options->codigo}}</span>
                                            </div>
                                        
                                        </div> 
                                   </td>
                               
                                   {{-- cantidad --}}
                                   <td  >
                                    <div class="flex items-center">
                            
                                        <div class="flex items-center" >
                                             @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId)) 
                                            {{-- @livewire('admin.partials.qty-update', ['rowId' => $item->rowId], key($item->rowId))  --}}
                                            <a wire:click ="delete('{{$item->rowId}}')" wire.loading.class ="text-red-600" wire:target="delete('{{$item->rowId}}')" class="hover:text-red-600 cursor-pointer"><i class='bx text-2xl px-4 bxs-trash hover:text-red-600'  ></i></a>
                                            
                                          
                                        </div>
                               
                                    </div>
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