<div>

    {{-- <div class="bg-gray-100">
        <div class="container">
            <div class="grid grid-cols-5">
                
                <div class="text-xl col-span-2 bg-green-100 py-6">
                   
                    <section class="bg-white rounded-xl shadow-xl m-2">
                        <h2 class="py-4 text-xl font-bold  text-center">Datos del cliente</h2>
                        <div class="mx-4 py-6">
                            <select wire:model="user_id" class=" w-full">
                                <option value="">--Seleccione cliente</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <div class="py-2 ml-auto">
                                <x-jet-button>Crear cliente</x-jet-button>
                            </div>
                        </div>
                    </section>
                  
                    <section class="bg-white rounded-xl shadow-xl m-2">
                        @livewire('admin.ventas-productos')
                        
                    </section>
                </div>
               
                <div class="col-span-3">
                    <section class="py-4 mr-20">
                       <div class="flex justify-around items-center">
                            <h2 class="font-bold text-2xl">Total: <span>$ 100</span></h2>
                            <x-jet-button class="bg-green-400"> Terminar compra </x-jet-button>
                        </div>

        
         
    
                    </section>

                    <section class="bg-white shadow-xl rounded-xl mx-4">
                        <div class="mx-2">
                            <h2>holi</h2>
                            <div>
                             
                            </div>
                        </div>
                    </section>
         
                </div>
           
            </div>

        </div>
    </div> --}}

    <div class="bg-gray-200">
        <div class="grid grid-cols-1  md:grid-cols-6">
            {{-- columna 1 --}}
            <div class="col-span-4">
                
                <div class="pt-4 flex justify-center w-full gap-4" >
                    <livewire:admin.search-controller>
               

                    {{-- <select >
                        <option value="" wire:model="user_id">--Seleccione cliente</option>
                        @foreach ($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select> --}}
                    

                </div>
                {{-- detalles --}}
                @include('livewire.admin.partials.detail-descount')
            </div>
            {{-- columna 2 --}}
            <div class="col-span-2">
                <div>
                    {{-- total --}}
                    {{-- @include('livewire.admin.partials.total') --}}
                </div>
                {{-- coins --}}
                <div>
                    @include('livewire.admin.partials.coin-descount')
                </div>
            </div>
        </div>

    </div>
@include('livewire.admin.scriptsPos.scan')
</div>







@push('script')
    <script src="{{ asset('js/onscan.min.js') }}"></script>


    <script>
        document.addEventListener('livewire:load', function(){
            $('.select2').select2();
            $('.select2').on('change');
        })
    </script>

@endpush
   



    <script src="{{ asset('js/onscan.min.js') }}"></script>