<div class="container">
    <div class="bg-white rounded-xl shadow-xl py-4">


      
       {{-- cliente --}}
       <div class="py-2 flex justify-around gap-4">
        <div class="block">
            <span class="text-gray-700">Marca "Entregado" si se entrego todo</span>
            <div class="mt-2 flex justify-around gap-4">
              <div>
                <label class="inline-flex items-center">
                  <input wire:model="ship" type="radio" class="form-radio" name="radio" value="2" checked>
                  <span class="ml-2">Falta entregar</span>
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

            {{-- cuenta --}}
        <div class="py-4 flex justify-center bg-red-200">
        
           
         
            
        </div>
        <div class="flex justify-between items-center">
            


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