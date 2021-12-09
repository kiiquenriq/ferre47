<div>
    <ul>
        <li>
            <form role="search">
                <div  class="search-bar">
                    <input id="code" type="text" placeholder="buscar por codigo" wire:keydown.enter.prevent="$emit('scan-code', $('#code').val())" autocomplete="off">
                </div>
            </form>
        </li>
    </ul>

    <script>
        document.addEventListener('DOMContentLoaded', function(){
            livewire.on('scan-code', action => {
                $('#code').val('')
            })
        })
    </script>




</div>
