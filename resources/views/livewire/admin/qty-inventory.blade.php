<div class="bg-green-100 py-10">
       
    <div class="pt-4 flex justify-center w-full gap-4" >
        <livewire:admin.search-controller>

        {{-- <select >
            <option value="" wire:model="user_id">--Seleccione cliente</option>
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select> --}}
        

   
        
    </div>

    <div class="flex justify-center py-10 ">
        <div class="flex flex-col md:flex-row gap-8 bg-purple-200 rounded-md shadow-xl p-6">
            <p>Nombre: {{$prueba}}</p>
            <p>Codigo:{{$codigo}}</p>
            <p> Cantidad actual: {{$qty}}</p>


            <input type="number" wire:model="cantidad">

            <x-jet-button wire:click="save">Actualizar</x-jet-button> 

             {{-- @livewire('admin.partials.qty-inventory', ['barcode' => $])  --}}

        </div>
    </div>






    @include('livewire.admin.scriptsPos.scan')
    @push('script')
<script src="{{ asset('js/onscan.min.js') }}"></script>
@endpush
   

</div>
