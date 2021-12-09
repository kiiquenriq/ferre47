<x-app-layout >
    <header class="head-se" >
        <h1 class="text-4xl  text-white relative text-center">
         {{$request->name}}
        </h1>


     </header>
<div class="bg-gray-300 py-10" >
    <div class="container ">
        <ul>
            @forelse ($products as $product)
            <li class="bg-white rounded-lg shadow mb-4">
                <article class="flex">
                    <figure>
                        <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url)}}" alt="" style="border-radius: .5rem 0 0 .5rem">
                    </figure>
                    <div class="flex-1 py-4 px-6 " style="border-radius: 0 .5rem .5rem 0">
                        <div class=" flex justify-between">
                            <div>
                                <a href="{{route('products.show', $product)}}" class="font-semibold text-trueGray-700 text-xl cursor-pointer hover:text-orange-600 ">{{$product->name}}</a>
                                <p class="font-bold text-red-600 text-xl ">${{$product->price}}</p>
                            </div>
                            <div>
                                <div class="text-2xl">
                                    <i class='bx bxs-star' style='color:#e8d200' ></i>
                                    <i class='bx bxs-star' style='color:#e8d200' ></i>
                                    <i class='bx bxs-star' style='color:#e8d200' ></i>
                                    <i class='bx bxs-star' style='color:#e8d200' ></i>
                                    <i class='bx bxs-star-half' style='color:#e8d200' ></i>
                                </div>
                                <div>
                                    <x-jet-button  class="mt-4 bg-orange-600"><a href="{{route('products.show', $product)}}">Ver producto</a></x-jet-button>
                                </div>
                            </div>
                        </div>
                    </div>

                </article>
            </li>
            @empty
                <li class="bg-white rounded-lg shadow-lg pt-10">
                    <div class="flex flex-col items-center">
                        <i class=' text-5xl bx bx-comment-error bx-tada' style='color:#f90303 '  ></i>
                        <p class="text-4xl text-gray-700 text-center">Ningun producto coincide con los parametros</p>
                    </div>
                </li>

            @endforelse
        </ul>
        <div>
            {{$products->links()}}
        </div>
    </div>
</div>
</x-app-layout>