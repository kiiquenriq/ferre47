<div class="bg-purple-100 py-10">
    <div class="container grid grid-cols-1  md:grid-cols-5 gap-6">
        {{-- ccolumna de datos --}}
        <div class="col-span-3">
                {{-- nombre y telefono --}}
            <div class="bg-white rounded-xl shadow-xl p-4">
                <div>
                    <x-jet-label class="text-xl text-gray-600" value="Nombre del contacto"/>
                    <x-jet-input wire:model.defer="name" disabled  type="text" placeholder="Ingrese nombre " class="w-full text-gray-500 font-semibold"/>
                   
                  
                </div>
                <div class="my-4">
                    <x-jet-label class="text-xl text-gray-600" value="Telefono"/>
                    <x-jet-input wire:model.defer="telefono" disabled type="text" placeholder="Ingrese telefono" class="w-full text-gray-500 font-semibold"/>
                </div>
            </div>
            {{-- Envios  --}}
            <div x-data="{envio_type: @entangle('envio_type')}">
                <p class="text-xl text-gray-600 pt-4 pb-1 font-semibold">Envios</p>
                <div class="bg-white rounded-xl shadow-xl p-4">
                    <div>
                        <label class=" flex items-center">
                            <input x-model="envio_type" type="radio" name="envio_type" value="1" class="text-orange-600">
                            <span class="pl-2 text-gray-600"> Recoger en tienda</span>
                            <span class=" pl-2 font-semibold text-green-600 ml-auto text-xl" > Gratis </span>
                        </label>
                    </div>

                </div>

                <div class="bg-white rounded-xl shadow-xl mt-4 p-4">
                    <label class=" flex items-center">
                        <input x-model="envio_type"  type="radio" name="envio_type" value="2" class="text-orange-600">
                        <span class="pl-2 text-gray-600"> Envio a domicilio</span>
                        {{-- <span class=" pl-2 font-semibold text-green-600 ml-auto" > Gratis </span> --}}
                    </label>
  
                </div>

                <div :class="{'hidden': envio_type != 2 }" class=" transition-all  bg-white shadow-xl rounded-xl mt-6 p-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        {{-- Estados --}}
                        <x-jet-label class="text-xl text-gray-600" value="Estado"/>
                        <x-jet-input wire:model.defer="estado"   type="text" placeholder="Ingrese estado " class="w-full text-gray-500 font-semibold border-red-500"/>
                       
                        
                    </div>
                        {{-- Ciudad --}}
                    <div>
                        <x-jet-label class="text-xl text-gray-600" value="ciudad"/>
                        <x-jet-input wire:model.defer="ciudad"   type="text" placeholder="Ingrese ciudad " class="w-full border-yellow-500 text-gray-500 font-semibold"/>
                       
                        
                    </div>
                    
                    {{-- colonia --}}
                    <div>
                        <x-jet-label class="text-xl text-gray-600" value="colonia"/>
                        <x-jet-input wire:model.defer="colonia"   type="text" placeholder="Ingrese colonia " class="w-full border-green-500 text-gray-500 font-semibold"/>
                       
                        
                    </div>
                    <div>
                        <x-jet-label class="text-xl text-gray-600" value="codigo postal"/>
                        <x-jet-input wire:model.defer="cp"   type="text" placeholder="Ingrese cp " class="w-full border-blue-500 text-gray-500 font-semibold"/>
                       
                        
                    </div>
                    
                    {{-- direccion --}}
                    <div class="">
                        <x-jet-label value="Referencia"/>
                        <x-jet-input wire:model="references" class="border-purple-600 w-full" type="text" placeholder="Ingresa referencia"/>
                    </div>
                    <div class="cols-span-2 ">
                        <x-jet-label value="Direccion"/>
                        <x-jet-input wire:model="address" class="border-purple-600 w-full" type="text" placeholder="Ingresa tu direccion y Codigo Postal"/>
                        {{$address}}
                    </div>
                
                </div>
                {{-- <div :class="{'hidden': envio_type != 2 }" class=" transition-all  bg-white shadow-xl rounded-xl mt-6 p-4 grid grid-cols-2 gap-6">
                    <div>
                        {{-- Estados 
                        <x-jet-label value="Estado"/>
                        <select wire:model="department_id" class="rounded-lg border-yellow-500">
                            <option value="" selected disabled>--Seleccione un estado</option> 
                            @foreach ($departments as $department)

                                <option value="{{$department->id}}">{{$department->name}}</option>
                            @endforeach
                            
                        </select>
                        {{$department_id}}
                        
                    </div>
                        {{-- Ciudad 
                    <div>
                        <x-jet-label value="Ciudad"/>
                        <select wire:model="city_id" class="rounded-lg border-green-500">
                            <option value="" selected disabled>--Seleccione una ciudad</option> 
                            @foreach ($cities as $city)

                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                            
                        </select>
                        {{$city_id}}
                        
                    </div>
                    
                    {{-- colonia 
                    <div>
                        <x-jet-label value="Colonia"/>
                        <select wire:model="disctrict_id" class="rounded-lg border-red-500">
                            <option value="" selected disabled>--Seleccione una colonia </option> 
                            @foreach ($disctricts as $disctrict)

                                <option value="{{$disctrict->id}}">{{$disctrict->name}}</option>
                            @endforeach
                            
                        </select>
                        {{$disctrict_id}}
                        
                    </div>
                    
                    {{-- direccion 
                    <div class="">
                        <x-jet-label value="Referencia"/>
                        <x-jet-input wire:model="reference" class="border-purple-600" type="text" placeholder="Ingresa referencia"/>
                    </div>
                    <div class="cols-span-2 ">
                        <x-jet-label value="Direccion"/>
                        <x-jet-input wire:model="address" class="border-purple-600 w-full" type="text" placeholder="Ingresa tu direccion y Codigo Postal"/>
                    </div>
                
                </div> --}}
            </div>
            {{-- boton --}}
            <div class="pt-10">
                <a  class="mb-2 cursor-pointer" wire:click="create_order"><x-jet-button>Continuar</x-jet-button></a>
                <hr class="mt-2">
                    <p class="text-gray-700 pt-2 text-sm">Lorem ipsum dolor sit amet consectetur <a href="" class="font-semibold text-red-500">Terminos y condiciones</a></p>
            </div>
            
        </div>
        {{-- detalle de compra --}}
        <div class="col-span-2 bg-white rounded-xl shadow-xl p-4 overflow-y">
            {{-- Carrito de productos --}}
            <ul class="" >
                @forelse (Cart::content()->take(10) as $item)
                    <li class="flex py-2 border-b border-gray-200 ">
                        <img class="px-1 h-15 w-20 object-cover mr-4"src="{{$item->options->image}}" alt="">
                        <div class="flex-1">
                            <p class="font-bold">{{$item->name}}</p>
                            <div class="flex gap-2 items-center">
                                <p class="text-sm">Cant: {{$item->qty}}</p>
                               @isset($item->options['color'])
                                   <p class="mx-2 text-sm"> Color:{{$item->options['color']}}</p>
                               @endisset
                               @isset($item->options['size'])
                                   <p class="mx-2 text-sm"> Med:{{$item->options['size']}}</p>
                               @endisset
                            </div>
                            <p class="font-semibold">${{$item->price}}</p>

                        </div>
                    </li>
                    @empty
                    <li  >
                        <p class="text-center px-4 text-lg text-gray-700 font-semibold">No tienes agregado ningun producto</p>
                    </li>
                        
                    @endforelse
            </ul>
            <hr class="mt-4">
            <div class="py-2">
                <a href="{{route('shopping-cart')}}"><x-jet-button class="bg-red-500">Regresar al carrito</x-jet-button></a>
            </div>
            <hr class="mt-4">
            {{-- total y subtotal --}}
            <div class="text-gray-400">
                
                <p class="font-semibold flex justify-between items-center ">Subtotal: <span class="text-black">$ {{Cart::subtotal()}}</span> </p>
                <p class="font-semibold flex justify-between items-center ">Envio: <span class="text-black">Gratis</span> </p>

                <hr class="mt-4">

                <p class="font-semibold flex justify-between items-center ">Total: <span class="text-black text-xl">Gratis</span> </p>
                {{-- <a wire:model="create_order"><x-jet-button class="bg-teal-500">Crear Orden</x-jet-button></a> --}}
            </div>

            </div>
        </div>

    </div>
</div>
