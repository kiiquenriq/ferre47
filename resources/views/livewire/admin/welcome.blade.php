<div>
   
            {{-- Venta --}}
    <section class="bg-blue-200 py-6">
        <div class="container">
            <div class="flex items-center justify-around">
                <h1 class="text-bold  text-center text-4xl">Ventas</h1>
                <a href="{{route('admin.ventas')}}"> <x-jet-button>Crear venta</x-jet-button></a>

            
            </div>
        </div>
    </section>
    {{-- pagar orden --}}
    <section class="bg-pink-200 py-6">
        <div class="container">
            <div class="flex items-center justify-around">
                <h1 class="text-bold  text-center text-4xl">Pagar Ordenes</h1>
                <a href="{{route('admin.orden-venta')}}"> <x-jet-button>ir</x-jet-button></a>

            
            </div>
        </div>
    </section>
    {{-- ver faltantes --}}
    <section class="bg-teal-200 py-6">
        <div class="container">
            <div class="flex items-center justify-around">
                <h1 class="text-bold  text-center text-4xl">Enviar orden</h1>
                <a href="{{route('admin.order.ship')}}"> <x-jet-button>Entrar</x-jet-button></a>

            
            </div>
        </div>
    </section>
    <section class="bg-yellow-200 py-6">
        <div class="container">
            <div class="flex items-center justify-around">
                <h1 class="text-bold  text-center text-4xl">Crear nuevo cliente</h1>
                <a href="{{ route('admin.register') }}"> <x-jet-button>Crear</x-jet-button></a>

            
            </div>
        </div>
    </section>
    <section></section>
    {{-- ver ordenes procesadas --}}
    <section class="bg-purple-300 py-4">
        <div class="container">
            <h2 class="text-2xl text-center py-2 font-bold">Ordenes Pendientes</h2>

        </div>

    </section>

</div>
