<div class="bg-red-200 py-10">
    <div class="container">
        <div class="flex justify-center ">
            <livewire:admin.search-controller>
        </div>
    </div>

    <div>

        @if ($product)
            <div class="flex justify-center pt-4">
                <div class="">
                    <div class="m-2 flex flex-col md:flex-row gap-6 items-center">
                        <div class="bg-white rounded-xl shadow-xl p-2">
                            <p class=" font-normal">Nombre:{{$product->name}}</p>
                            <p>Codigo: <span class="font-semibold">{{$product->codigo}}</span></p>
                        </div>

                        <div class="bg-white rounded-xl shadow-xl p-2">
                            <p class="font-bold">Pecio actual:$ {{$product->price}} </p>
                        </div>

                        <div class="flex items-center gap-2">
                            <input wire:model="cantidad" class="rounded-xl border-0" type="number" placeholder="cantidad">
                            <button  wire:click="update"><i class='bx bx-send text-4xl text-green-600'></i></button>

                            
                        </div>


                    </div>

                   

                </div>

            </div>
        @else
            
        @endif
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