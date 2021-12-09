<div class="bg-gray-100 py-10">
    {{-- Because she competes with no one, no one can compete with her. --}}
    


    <div class="container">
        <div class="flex justify-center py-10">
            <livewire:admin.search-controller>
        </div>
 
        <section>
            <div class="container">
                <div >


                  @if ($status == 5)

                  <div class="bg-purple-100 border-t-4 border-purple-500 rounded-b text-purple-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-purple-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">Orden {{$idd}}</p>
                        <p class="text-sm">Su orden se esta procesando</p>
                      </div>
                    </div>
                  </div>
                      
                  @endif
                  @if ($status == 6)
                      
                  <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">Orden {{$idd}}</p>
                        <p class="text-sm">Su orden esta cancelada</p>
                      </div>
                    </div>
                  </div>
                  @endif
                  @if ($status == 7)
                  <div class="bg-green-100 border-t-4 border-green-500 rounded-b text-green-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-green-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">Orden {{$idd}}</p>
                        <p class="text-sm">Su orden esta pagada</p>
                      </div>
                    </div>
                  </div>

                  @endif
                  @if ($status == 8)
                  <div class="card text-center">
                    <div class="card-header">
                     <h2>Orden: <span class="font-bold">{{$idd}}</span></h2>
                    </div>
                    <div class="card-body">
                      <div class="flex gap-6 justify-center">
                        <h5 class="card-title font-bold">Total: <span class="font-bold text-2xl "> ${{$total}}</span></h5>
                        <h5 class="card-title font-bold">Falta Pagar: <span class="font-bold text-2xl text-red-500"> ${{$falta}}</span></h5>
                      </div>
                      <div>
                        <p class="card-text py-2">{{$user}}</p>
                        <p class="py-2">{{$date}}</p>
                      </div>
                    


                      <div class="flex flex-col md:flex-row justify-center gap-2 items-center border-b border-teal-500 py-2">
                        <input wire:model="cantidad" class="appearance-none bg-transparent border-none  text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="number" placeholder="Ingrese cantidad">
                        <button wire:click="update" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="button">
                          Pagar
                        </button>
                        
                        <button class="first flex-shrink-0 border-transparent border-4 text-teal-500 hover:text-teal-800 text-sm py-1 px-2 rounded" type="button">
                          Cancelar
                        </button>
                      </div>
                    </div>
                    <div class="card-footer text-muted">
                      <h1 class="text-xl font-bold">Cambio: <span class="text-bold text-orange-600">{{$cambio}}</span></h1>
                      <p>Nota: vuelva a escanear para ver el reflejo</p>
                    </div>
                  </div>
                  @endif
                </div>

            </div>
       
        </section>



        @if ($status == 8)
        <section wire:change="render" class="rounded-xl shadow-xl bg-white px-6 py-4 my-4">
          <h2 class="text-2xl text-center py-2 font-semibold">Historial de pagos</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 ">
              @foreach ($paids as $pago)
                  <div class="bg-green-100 rounded-lg shadow-lg">
                      <p class="text-center py-2 text-xl text-red-500 font-semibold">$ {{$pago->Acuenta}}</p>
                      <p class="text-center py-2">{{$pago->created_at}}</p>
                  </div>
              @endforeach
          </div>

      </section>
      @endif



         
    </div>

  








    @include('livewire.admin.scriptsPos.scan')
    @push('script')
        <script src="{{ asset('js/onscan.min.js') }}"></script>

        <script>
          document.querySelector(".first").addEventListener('click', function(){
           Swal.fire("Our First Alert");
           });
        </script>
     
 
    @endpush
   



    <script src="{{ asset('js/onscan.min.js') }}"></script>
</div>
