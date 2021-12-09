<div>
    <div class="flex flex-col gap-6 items-center justify-around">
        {{-- color --}}
        <div class="p-2">
    
            @foreach($colors as $color)
                <label>
                    <input type="radio"
                            name="color_id"
                            wire:model.defer ="color_id"
                            value="{{$color->id}}">
                            <span class="px-2">
                                {{$color->name}}
                            </span>
                </label>
            @endforeach
            {{$color->id}}
            <x-jet-input-error for="color_id"/>
        </div>

        {{-- cantidad --}}
        <div>
            <input type="number" wire:model.defer="quantity" placeholder="Cantidad" class="form-select rounded-md border-gray-400">
            <x-jet-input-error for="quantity"/>
        </div>
    </div>

    <div class="flex justify-center items-center gap-2 py-2">
        <button
            
            type="button" class="btn btn-info text-xl flex items-center gap-2" wire:click="save">
            Agregar

            <span>
                <div wire:loading.block  wire:target="save" class="hidden spinner-border text-dark" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
            </span>

        </button>
        <x-jet-action-message class="mr-3" on="saved">Agregado</x-jet-action-message>

    </div>


    <div >
        <table>
            <thead >
             <tr>
                 <th class="px-4 py-2 w-1/3">Color</th>
                 <th class="px-4 py-2 w-1/3">Cantidad</th>
                 <th class="px-4 py-2 w-1/3"></th>
             </tr>
            </thead>
            <tbody>
                @foreach ($product_colors as $product_color)
                    <tr>
                        <td class="capitalize px-6 py-2">
                            {{$colors->where('id', $product_color->pivot->color_id)->first()->name}}
                        </td>
                        <td class="px-4 py-4">{{$product_color->pivot->quantity}}</td>
                        <td class="flex gap-6 items-center py-4">
                            <a wire:click="edit({{$product_color->pivot->id}})"><button type="button" class="btn btn-success" >Actualizar</button></a>
                            <a href=""><button type="button" class="btn btn-danger">eliminar</button></a>
                            

                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal --}}
    <div >
        
    <x-jet-dialog-modal wire:model='open'>
        <x-slot name="title">Editar Colores</x-slot>


        <x-slot name="content" >
            <div class="flex gap-6 justify-around items-center">
                <div>
                    <x-jet-label>Color</x-jet-label>
                    <select class="rounded-md border-gray-500 capitalize" wire:model="pivot_color_id">
                        <option value="">--Seleccione un color</option>
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div >
                    <x-jet-label>Cantidad</x-jet-label>
                    <x-jet-input type="number" placeholder="Cantidad" min="1" wire:model="pivot_quantity"></x-jet-input>
                    
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button>Cancelar</x-jet-secondary-button>
            <x-jet-button> Actualizar</x-jet-button>
        </x-slot> 
    </x-jet-dialog-modal>

    </div>


  
</div>
