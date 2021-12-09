
    <div class="ml-3 relative px-2 " >

        @auth
            <x-jet-dropdown align="center" width="48">
            <x-slot name="trigger">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                        <img class="h-8 w-8 rounded-full object-cover " src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        
                    </button>
                @endif
            </x-slot>
    
            <x-slot name="content">
                <!-- Account Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ __('Manage Account') }}
                </div>
    
                <x-jet-dropdown-link href="{{ route('orders.index') }}">
                   Mis ordenes
                </x-jet-dropdown-link>
                 <x-jet-dropdown-link href="{{ route('profile.show') }}">
                    {{ __('Profile') }}
                </x-jet-dropdown-link> 
                @role('admin')
                    <x-jet-dropdown-link href="{{ route('admin.welcome') }}">
                    Administrador
                 </x-jet-dropdown-link> 

                @endrole
    
                
    
                <div class="border-t border-gray-100"></div>
    
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-dropdown-link>
                </form>
            </x-slot>
            </x-jet-dropdown>
        
    
    
        @else 
            <x-jet-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <i class='bx bx-user-circle text-4xl cursor-pointer text-white' ></i>
                </x-slot>
    
                <x-slot name="content">
                    <x-jet-dropdown-link href="{{ route('login') }}">
                        Iniciar Sesion
                    </x-jet-dropdown-link>
                    {{-- <x-jet-dropdown-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-jet-dropdown-link> --}}
    
                </x-slot>
    
            </x-jet-dropdown>
    
        @endauth
    
    
          
    </div>
