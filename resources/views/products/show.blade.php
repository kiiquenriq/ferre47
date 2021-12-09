<x-app-layout>
    <div class="container">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 py-8">
             <div>
                 {{-- flex slider --}}
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{Storage::url($image->url)}}">
                                <img src="{{Storage::url($image->url)}}" />
                            </li>
                        @endforeach

                    </ul>
                  </div>
             </div>
             {{-- informacion --}}
             <div class="flex flex-col">
                <h1 class="text-3xl font-bold text-trueGray-700">{{$product->name}}</h1>
                <h2 class="text-4xl mt-6 font-bold">${{$product->price}}</h2>
                {{-- tarjeta de envio --}}
                <div class="bg-white rounded-lg shadow-lg my-6">
                    <span class="py-4 px-8 flex gap-8 items-center ">
                        <i class='bx bx-check-circle bg-greenLime-600 text-5xl rounded-full' style='color:#ffffff'  ></i>
                        <div>
                            <h3 class="text-2xl text-greenLime-600">Envios diponibles a tu domicilio</h3>
                            <p class="text-md text-trueGray-600">Recibelo el {{Date::now()->addDay(1)->locale('es')->format(' l j F')}}</p>
                        </div>
                    </span>
                </div>
                
                {{-- color talla etc --}}
                <div>
                    {{-- @if ($product->subcategory->size)

                        @livewire('add-cart-item-size', ['product' => $product])


                    @elseif($product->subcategory->color)

                        @livewire('add-cart-item-color', ['product' => $product])

                    @else --}}

                        @livewire('add-cart-item', ['product' => $product])

                    {{-- @endif --}}
                </div>
             </div>

        </div>

    </div>

    @push('slider')
        <script>
        
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
            
    @endpush

</x-app-layout>