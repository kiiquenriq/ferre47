{{-- menu interactivo --}}
 <style>

    .navigation-link:hover .navigation-submenu{
        display: block !important;
    
    }
    </style>
    
    
    
    <nav class="navbar navbar-expand-lg fixed-top bg-dark py-2 sticky"
         x-data="{open: false}">
        <div class="container h-16">
            {{-- navbar brand --}}
            <div  x-on:click="open = !open" 
           
            class=" invisible  nav_cat navbar-brand d-flex flex-col items-center cursor-pointer text-white " style="visibility:hidden " 
            :class="{'bg-teal-600 rounded-xl py-2 px-2': open}"    
                >
                <i class='bx bx-menu text-xl ' ></i>
                <a class="brand-text text-lg hover:text-white">Categorias</a>
            </div>
            {{-- carrito movil --}}
            <div class="block md:hidden mr-16 ">
                @livewire('cart-movil')
            </div>
                {{-- boton para abrir canvas --}}
            <button class="navbar-toggler block md:hidden" 
                   type="button" 
                   data-bs-toggle="offcanvas" 
                   data-bs-target="#Navbar" 
                   aria-controls="Navbar" >
                <span><i class='bx bx-menu text-2xl' style='color:#ffffff'  ></i></span>
            </button>
    
            <div class="offcanvas offcanvas-end bg-gray-800 " tabindex="-1" id="Navbar" aria-labelledby="offcanvaNavbarLabel">
                <div class="menu-mov overscroll-auto ml-0 md:ml-auto gap-8 d-flex pb-4">
    
                    <div class="offcanvas-header">
                      <h2 class="text-white text-4xl "><a href="/" class="hover:text-teal-500">inicio</a></h2>
                      <button  class="btn-close text-reset btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close" ></button>
                    </div>
    
                    {{-- search bar --}}
                    <div class="search ml-10 " >
                        @livewire('search')
                    </div>
                
                    {{-- links --}}
                    <div class="hidden md:block">
                        <div class="d-flex gap-2 ">
                            <a href="/" class="nav-link nav_li invisible text-xl text-white">Inicio</a>
                            <x-dropdown-login>
                                
                            </x-dropdown-login>
                             {{-- dropdown --}}
                            @livewire('dropdown-cart')
                        </div>
                    </div>
                    {{-- links_menu movil --}}
                    <div class="block md:hidden overflow-x-auto">
                        <div class="flex flex-col bg-trueGray-600 mx-8 py-4 rounded-xl text-white font-semibold text-center text-xl">
                            <p class="pb-2">USUARIOS</p>
                            @auth
                                <a href="{{route('profile.show')}}" class="p-2 cursor-pointer hover:bg-teal-400 hover:text-white  px-8">
                                    <span><i class='bx bxs-user-detail' style='color:#ece9e9'  ></i></span>
                                    perfil
                                </a>
                                <a href="{{route('orders.index')}}" class="p-2 cursor-pointer hover:bg-teal-400 hover:text-white  px-8">
                                    <span>Mis ordenes</span>
                                    

                                </a>
                                @role('admin')
                                        <a href="{{ route('admin.welcome') }}" class="p-2 cursor-pointer hover:bg-teal-400 hover:text-white  px-8">
                                        Administrador
                                        </a> 
            
                                @endrole
                                <a href=""
                                    onclick="event.preventDefault();
                                        document.getElementById('logout_form').submit();" 
                                        
    
                                    class="p-2 cursor-pointer hover:bg-teal-400 hover:text-white  px-8">
                                    <span><i class='bx bxs-user-x' style='color:#f9f9f9'  ></i></i></span>
                                    Cerrar sesion
                                </a>
                                <form id="logout_form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf 
                                </form>
    
                            @else 
                                <a href="{{route('login')}}" class="p-2 cursor-pointer hover:bg-teal-400 hover:text-white  px-8">
                                    <span><i class='bx bxs-user-detail' style='color:#ece9e9'  ></i></span>
                                    Iniciar Sesion
                                </a>
                            
                                
    
                                
                            @endauth
                        </div>
                    </div>
    
                        {{-- menu movil --}}
                        <div class="block md:hidden overflow-y-scroll">
                            <div class="flex flex-col justify-center bg-trueGray-200 py-1 mx-4 rounded-xl overflow-y-scroll">
                                <ul class="overflow-y-scroll">
                                    @foreach ($categories as $category)
                                        <li class="overflow-y-scroll text-trueGray-500 text-lg hover:bg-orange-500 hover:text-white ">
                                            <a href="{{route('categories.show', $category)}}" class="flex justify-center py-1 px-4  hover:text-white">
                                                {{$category->name}}
                                            </a>
                                        </li>
                                        
                                    @endforeach
                                </ul>
                               
                            </div>
    
                        </div>
                    
                    
                   
                  
                </div>
            </div>
        </div>
    
        {{-- menu complete --}}
        <nav x-show="open"  
            x-transition
             :class="{'block': open , 'hidden' : !open}"
            class="navigation-menu bg-trueGray-700 bg-opacity-25 w-full absolute hidden "    
            style="margin-top:38rem">
    
            <div class="container h-full">
                <div class="grid grid-cols-4 h-full pb-2 relative " x-on:click.away="open = !open">
                    <ul class="bg-white pt-4 " style="border-radius: 2rem 0 0 2rem ">
                        @foreach($categories as $category)
                        {{-- categoria --}}
                        <li class="navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            {{-- primer columna categoria --}}
                            <a href="{{route('categories.show', $category)}}" class=" py-1 px-4 text-md text-trueGray-500 hover:text-white d-flex item-center">
                                {{$category->name}}
                            </a>
    
                            <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-full top-0 right-0 hidden"  style="border-radius:0 2rem 2rem 0">
                                <x-navigation_subcategory :category="$category"></x-navigation_subcategory>
                                   
                            </div>
    
    
                        </li>
                            
                        @endforeach
    
                    </ul>
                    {{-- subcategoria --}}
                    <div class="col-span-3  bg-gray-100"  style="border-radius:0 2rem 2rem 0">
                        <x-navigation_subcategory :category="$categories->first()"></x-navigation_subcategory>
                 </div>
    
                </div>
    
            </div>
        </nav>
    
    </nav>