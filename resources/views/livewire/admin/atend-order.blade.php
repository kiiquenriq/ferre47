<div class="bg-purple-200 py-20">
    <div class="pt-20 flex justify-center w-full gap-4 " >
        <livewire:admin.search-controller>

    </div>
    <div >
       @if($idd != $barcode || $barcode == 0)  
        <div class="flex items-center justify-center py-4 gap-2">
            <div class="spinner-border text-danger" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <p class="text-2xl text-red-600 ">Esperando escaneo de orden</p>
        </div>

       @else
       <div class="flex justify-center py-4">
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Falta pagar: ${{$order->Acuenta}}
                    ID : {{$order->id}}
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700 w-full">
              <div class="flex ">
               
                <p class="text-2xl text-green-600 ">Orden encontrada</p>
              </div>
             
         
                <a  href="{{route('admin.orders.detail', $order)}}"><x-jet-button>Entrar</x-jet-button></a> 
            </div>
        </div>
       
          
{{--           
    </div>
    <section class="bg-white rounded-xl shadow-xl py-6 mt-4 container">
        @livewire('admin.order-descount', ['order' => $order], key('status-descount-'. $order->id))
    </section> --}}


       @endif
    </div>
    

  
    


   







    @include('livewire.admin.scriptsPos.scan')
    @push('script')
    <script src="{{ asset('js/onscan.min.js') }}"></script>
@endpush
</div>
