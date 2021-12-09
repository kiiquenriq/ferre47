<div class="relative inline-block">
    <a >
        @if (Cart::count())
            <a href="{{route('shopping-cart-movil')}}">
                <i class='bx bx-cart-alt text-white text-4xl cursor-pointer'></i>
                <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{Cart::count()}}</span></span>
            </a>
        @else
            <i class='bx bx-cart-alt text-white text-4xl cursor-pointer'></i>
        
        @endif
    </a>
</div>
