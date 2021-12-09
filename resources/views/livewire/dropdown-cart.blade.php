<div class="">
    <x-jet-dropdown >
        <x-slot name="trigger">
            <span class="relative inline-block">

                @if (Cart::count())
                    <i class='bx bx-cart-alt text-white text-4xl cursor-pointer'></i>
                    <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{Cart::count()}}</span></span>
                @else
                    <i class='bx bx-cart-alt text-white text-4xl cursor-pointer'></i>
                    
                @endif
            
            
        </x-slot>

        <x-slot name="content" style="width: 40rem" class="" >
            <div class="">
                <ul class=" overscroll-y-auto">
                    @forelse (Cart::content()->take(5) as $item)

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
            </div>
            {{-- total --}}
            @if (Cart::count())
                <div class="py-2 px-4 mt-2 flex items-center gap-4">
                    <p class="text-lg">Total: <span class="font-bold">${{Cart::subtotal()}}</span></p>
                    <a href="{{route('shopping-cart')}}"  class="flex-1 btn btn-outline-success">Comprar</a>
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
    
</div>
