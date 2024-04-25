<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>posty</title>
    
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Scripts -->
  <!--<link rel="stylesheet" href="{{ asset('tailwindcss.com') }}">-->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="{{ asset('tailwindcss.js') }}" ></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">

    <nav class="p-6 bg-white flex justify-between mb-6">

<ul class="flex items-center">
    <li><a href="/" class="p-3">home</a></li>
    <li><a href="{{ route('dashboard') }}" class="p-3">dashboard</a></li>
    <li><a href="{{ route('posts') }}" class="p-3">post</a></li>
</ul>



<ul class="flex items-center">
   

   @auth
       
   
    <li><a href="/" class="p-3">{{ Auth::user()->name }}</a></li>


<form action="{{ route('logoutStore') }}" method="POST" class="p-3 inline">

   

    @csrf
    
    <button type="submit"  > logout </button>
   

</form>

    
    @endauth

    @guest

    <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
    <li><a href="{{ route('register') }}" class="p-3">Register</a></li>

    @endguest

   
   
</ul>



    </nav>



        
@yield('content')
 


</body>
</html>