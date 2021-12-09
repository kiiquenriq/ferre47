<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Fonts -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->

    {{-- sweet alert 2 --}}
    <link rel="stylesheet" href="sweetalert2.min.css">
    
    {{-- flexslider --}}
    <link rel="stylesheet" href="{{asset('vendor/flexslider/flexslider.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- dropzone --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- select" --}}   
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- css --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   
    @livewireStyles
    

 <!-- Scripts -->
    
    {{-- alpine --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    {{-- js --}}
    
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- perfect scrollbar --}}
    <script src="plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    {{-- onScan --}}
    <script src="{{ asset('js/onscan.js') }}"></script>
    {{-- bootstrap --}}
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    {{-- bootboxJs --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- popper --}}
    <script src="bootstrap/js/popper.min.js"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- select2 --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- flexslider --}}
    <script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"> </script>
    {{-- dropzone --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- app init --}}
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
   
   
     
 
  
    

    {{-- <script src="{{ mix('js/glider.js') }}" defer></script> --}}
    
</head>
<body>
    {{-- navbar --}}
     @livewire('navigation-menu')
    {{-- fin de navbar --}}

    @if(isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{$header }}
            </div>
        </header>
    @endif

 
    <main>
    {{ $slot }}
    </main> 

   



   
    
    


    @livewireScripts


    
    @stack('script')
    
 
</body>
</html>