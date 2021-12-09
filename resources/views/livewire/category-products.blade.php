<div wire:init="loadPosts">
    @if (count($products))
    
<div>
    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
            $count=0;
        @endphp
        @foreach ($products as $product)

          @break ($count == 5)


            
         <li class="swiper-slide flex flex-col pb-8  rounded-md"> 
            <article>
                <figure>
                    <img src="{{Storage::url($product->images->first()->url) }}" alt="" style="border-radius: .375rem .375rem 0 0">

                </figure>
                <div>
                    <h1 class="pt-4 text-trueGray-800 font-semibold " style="font-size: 1rem">
                        <a href="{{ route('products.show', $product)}}">
                            {{Str::limit($product->name, 15)}}
                        </a>
                    </h1>
                    <p class="text-trueGray-600 font-semibold text-xl">{{$product->price}}</p>
                </div>
            </article>

        </li> 


          @php
              $count = $count + 1 
          @endphp

         
        @endforeach
    </ul> 
</div>

    @else

        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>
        
    @endif
</div>