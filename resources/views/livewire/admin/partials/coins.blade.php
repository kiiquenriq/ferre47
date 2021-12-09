<div class="container">
    <div class="bg-white rounded-xl shadow-xl py-4">


       {{-- <div  class="mx-4" >
           <select wire:model="user_id" >
                <option value="">Seleccione opcion</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                    
                @endforeach

           </select>

       </div> --}}
       {{-- cliente --}}
       <div class="py-2 flex justify-around gap-4">
        <div class="block">
            
            <div class="mt-2 flex justify-around gap-4">
              <div>
                <label class="inline-flex items-center">
                  <input wire:model="ship" type="radio" class="form-radio" name="radio" value="2" checked>
                  <span class="ml-2">En camino</span>
                </label>
              </div>
              <div>
                <label class="inline-flex items-center">
                  <input wire:model="ship" type="radio" class="form-radio" name="radio" value="3">
                  <span class="ml-2">Entregado</span>
                </label>
              </div>
              
            </div>
          </div>

       </div>
       <div wire:ignore class="mx-4 py-2" x-data >
           <label for="">Seleccione cliente</label>
           <select wire:model="user_id" class="select2" >
                <option value="">--Seleccione--</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                    
                @endforeach

           </select>

          
           
        </div>


       <div class="bg-teal-200 py-2">
        <div class="flex flex-col gap-2 py-2 mx-2">
            <input type="text" placeholder="name" wire:model="name"> 
            <input type="text" placeholder="direccion" wire:model=address>
        </div>
       </div>
            {{-- cuenta --}}
        <div class="py-4 flex justify-center bg-red-200">
            <div>
                <input type="number" wire:model="cant" placeholder="ingrese cantidad">
            </div> 
           
            {{-- <div class="w-full max-w-xs">
                <form wire:model="cantidad">

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Username
                        </label>
                        <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="number" placeholder="ingrese cantidad">
                    </div>
                  
                  
                </form>
                
            </div> --}}
            
        </div>
        <div class="flex justify-between items-center">
            <div class="mx-4">
                <p>Falta pagar: <span class="text-orange-500 text-lg font-bold"> $ {{$falta}}</span></p>
                <p>cambio: <span class="text-green-500 text-lg font-bold"> $ {{$cambio}}</span></p>
            </div>


            {{-- <div class="flex justify-center py-2 mx-4">
        
                <button wire:click="update" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Actualizar
                </button>
            </div> --}}
        </div>
        <div class="flex justify-center py-2 mx-4">
        
            <button wire:click="save" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                Terminar
            </button>
        </div>

        


    
       
    </div>




    
    <script>
            //select2
             document.addEventListener('livewire:load', function(){
                 $('.select2').select2();
                 $('.select2').on('change', function(e){
                    
                    @this.set('user_id', e.target.value);
                 });

                
             });
    </script>
    
</div>