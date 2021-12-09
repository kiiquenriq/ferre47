<x-app-layout>
    <header class="head-cat" >
       <h1 class="text-4xl uppercase text-white relative text-center">
        {{$category->name}}
       </h1>

       
    </header>

    <div class="pt-8 container">
        @livewire('category-filter', ['category'=> $category])
    </div>


</x-app-layout>
