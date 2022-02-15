<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body class=" bg-stone-200">


    <!-- register and login button dashboard-->
    @if (Route::has('login'))
    <div class=" text-right top-0 right-0 sm:block">
        @auth
        <div class=" absolute left-20 top-3 text-xl font-mono uppercase"> Product manager </div>
        <x-app-layout class=" shadow-md ">
        </x-app-layout>

        {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
        --}}
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
        @endauth
    </div>
    @endif


    <div class="h-[100%] ">
        <ul class=" absolute  grid grid-rows-5 w-14  h-[100%] bg-slate-300 ">
            <li class=" @if($page == 'producthome') 
            {{ 'activity' }}
            @endif"><a href="/producthome" class=""> <img src="https://img.icons8.com/glyph-neue/344/home.png" id="homes"
                        class="icon w-11 block" alt=""></a></li>


                        
            <li class=" @if($page == 'products') 
            {{ 'activity' }}
            @endif"><a href="/products"> <img src="https://img.icons8.com/small/344/spy-male.png" class="icon  w-11"
                        alt=""></a></li>


            <li class=" @if($page == 'ownproductdiscount') 
            {{ 'activity' }}
            @endif"><a href="/ownproductdiscount"> <img src="https://img.icons8.com/small/344/price-tag-usd.png"
                        class="icon w-11" alt=""></a></li>
            <li><a href="#"> <img src="https://img.icons8.com/small/344/positive-dynamic.png" class="icon w-11"
                        alt=""></a></li>
            <li><a href="#"> <img src="https://img.icons8.com/small/344/gear.png" class="rot w-11" alt=""></a>
            </li>
        </ul>
    </div>


    @yield('contents')
</body>

</html>