<div class="my-4">
    <div class="bg-white shadow-xl rounded-xl py-4">
        <div class="container">
           
                
           
           <div class="flex justify-between items-center">
            <h2>Total:</h2>
            <p class="font-bold text-2xl text-red-500">$ {{Cart::subtotal()}}</p>
           </div>
           <div class="flex justify-between items-center">
               <h2>Cantidad de productos:</h2>
               <p>{{Cart::content()->sum('qty')}}</p>
           </div>
        
          
        </div>
    </div>
</div>