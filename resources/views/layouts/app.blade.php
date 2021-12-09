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
    {{-- flexslider --}}
    <link rel="stylesheet" href="{{asset('vendor/flexslider/flexslider.css')}}">
    {{-- bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- css --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
   
    @livewireStyles
    

 <!-- Scripts -->
    

    {{-- js --}}
    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- alpine --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- flexslider --}}
    <script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"> </script>
   
   
     
 
  
    

    {{-- <script src="{{ mix('js/glider.js') }}" defer></script> --}}
    
</head>
<body>
    {{-- navbar --}}
     @livewire('navigation-store')
    {{-- fin de navbar --}}


 
    <main>
    {{ $slot }}
    </main> 

   



   
    
    


    @livewireScripts

    {{-- bootstrap --}}
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  

    @stack('slider')

</body>
</html>