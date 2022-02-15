<?php  $slider = array("Item1","Item2","Item3","Item4","Item5","Item6","Item7","Item8") ?>

<?php  $discname = array("disItem1","disItem2","disItem3","disItem4","disItem5","disItem6") ?>


{{-- https://images.pexels.com/photos/1904769/pexels-photo-1904769.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500 --}}


{{-- --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href=" css/app.css">
    <title>Document</title>
</head>

<body class=" bg-white  scrollbar-hide ">


    <!-- register and login button dashboard-->
    @if (Route::has('login'))
    <div class=" text-right top-0 right-0 px-6 py-4 sm:block">
        @auth
        <x-app-layout>
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
    <!--- Top bar--->
    <div class=" sticky top-0 h-7 bg-stone-300 ">

        <ul id=" div" class="topbar-ul ">

            <li class=" div "><a href="#">Home</a></li>
            <li class=" div  " onclick="productslistshow();"><a href="#">Products</a></li>
            <li class=" div "><a href="#">Other_Services</a></li>
            <li class=" div "><a href="#">About_us</a></li>

        </ul>

    </div>


    <!--- product dropdown  --->

    <div id="message" class="product-dropdown">
        <div class=" flex h-[100%] ">
            <div class=" w-[30%] bg-stone-300 ">

            </div>
            <div class=" w-[70%] bg-stone-200 "> </div>
            <!-- uparrow -->
            <img style="" src="https://img.icons8.com/ios-filled/344/collapse-arrow.png" onclick=" productslistremove()"
                class=" hover:translate-y-[-5px] absolute top-[30%]  left-[50%] text-center block h-[40px] duration-1000 "
                alt="">


        </div>

    </div>


    <!-- navbar -->
    <div style=" height:50px " class=" bg-white shadow-xl">

        <div class=" flex gap-3">
            <!-- logo -->
            <div class=" flex-1  ">

                <div class=" flex flex-row">

                    <img class=" " src="https://img.icons8.com/nolan/344/trekking.png " style=" height:50px "
                        class=" flex-1" alt="">
                    <h1 class="logo flex-1">HikingGearNepal</h1>

                </div>
            </div>

            <!--item search bar-->
            <div class=" item-search-bar">
                <input type="text" class=" search " placeholder="Search..">
            </div>

            <!---cartbar--->
            <div class=" flex ml-[30%] ">

                <img src="https://img.icons8.com/external-icongeek26-outline-gradient-icongeek26/344/external-cart-ecommerce-icongeek26-outline-gradient-icongeek26.png"
                    class="absolute right-[10%]  h-12 cart-hover" alt="">

                @if (Route::has('login'))
                @auth
                <img src="https://img.icons8.com/external-photo3ideastudio-flat-photo3ideastudio/344/external-payment-supermarket-photo3ideastudio-flat-photo3ideastudio.png"
                    class=" absolute right-[5%] h-12 cart-hover" alt="">
                @else
                <img src="https://img.icons8.com/external-photo3ideastudio-flat-photo3ideastudio/344/external-payment-supermarket-photo3ideastudio-flat-photo3ideastudio.png"
                    class=" hidden absolute right-[5%] h-12 cart-hover" alt="">
                @endauth
                @endif

            </div>
        </div>

    </div>
    <!-- flashsale -->
    <div class=" m-5">
        <div>
            <h1 class=" text-neutral-700 font-serif text-[30px] ">Flashsale</h1>
        </div>
        {{--
        grid-cols-[repeat(auto-fit,minmax(200px,1fr))] --}}
        <div class=" grid justify-items-center gap-5 grid-cols-[repeat(auto-fill,minmax(200px,1fr))]">

            @foreach($name as $name)
            {{-- {{ dd($name) }} --}}
            <a href="productdescription/{{ $name->id }}/{{ $name->product }}">
                <div class=" flashsale-1-dev ">
                    <div class=" flashsale-2-dev    ">
                        <div class=" flashsale-3-dev bg-cover"
                            style=" background-image:url('images/{{$name->image }}')">
                            <div class=" relative left-1 top-1 h-[35px] w-[35px] rounded-[100%]  bg-white">
                                <h1 class=" text-center text-[15px] text-red-600">

                                    {{-- discount place --}}

                                    {{ $name->discount }}

                                    %
                                </h1>
                            </div>

                        </div>



                        <div>
                            <h1> {{ $name->product }}</h1>
                        </div>
                        <div class="flex text-center justify-center align-items-center">
                            <h1 class=" line-through text-red-900">{{ $name->price }} </h1>
                            <h1 class=" text-black ml-1"> |
                                <?php $discountprice = ($name->discount / 100)*($name->price) ?>
                                {{ ($name->price)-$discountprice }}
                            </h1>
                        </div>
                        <div> <button class=" flashsale-btn">Shop
                                now</button></div>
                    </div>
                </div>
            </a>
            @endforeach

        </div>



    </div>



    <!-- Offer-image-items -->

    <div class=" font-serif m-5">
        <div>
            <h1 class=" offer-sale ">Offer image</h1>
        </div>


        <div style="" class="  bg-gray-500 h-[200px]">
            <div class=" flex h-[100%] ">
                <div class="  w-[80%] bg-stone-400 "></div>
                <div class=" w-[20%] bg-stone-300 "></div>
            </div>
        </div>



    </div>
    <!--- slider -->

    <div style=""
        class=" scroll-mx-3 flex flex-row  ml-5 gap-5  overflow-y-hidden overflow-x-visible justify-items-start ">

        @foreach($slider as $slider )
        <div class=" w-[200px]">
            <div class=" flashsale-1-dev  ">
                <div class=" flashsale-2-dev    ">
                    <div class=" flashsale-3-dev  " style="">
                    </div>
                    <div>
                        <h1> {{ $slider }}</h1>
                    </div>
                    <div>
                        <h1> Price name</h1>
                    </div>
                    <div> <button class=" flashsale-btn">Shop
                            now</button></div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <!--- categories --->

    <h1 class=" text-base text-center font-thin"> Choose items</h1>

    <div class=" h-[640px] gap-1 grid auto-cols-fr grid-cols-[repeat(auto-fit,minmax(240px,1fr))]">
        <div class=" a bg-slate-900 "></div>
        <div class="a bg-slate-700 "></div>

        <div class="a bg-gray-400 row-span-2 col-span-2 "></div>
        <div class="a bg-gray-300"></div>
        <div class="a bg-zinc-500  "></div>
        <div class="a bg-zinc-200 "></div>
        <div class="a bg-zinc-900 "></div>
        <div class="a bg-zinc-600 col-span-full"></div>

    </div>

    <div>
        <h1 class=" message"></h1>
    </div>

    <!-- collection-sale -->

    <div>
        <h1 id=" text" class="bg-slate-700" onmousedown=" divslideshow()">a</h1>
        <img style=" " class=" bg-cover" id=" img" alt="">
    </div>



    <!---slide--->

    <div id="photo" class="  h-[300px] m-1 bg-cover bg-center bg-no-repeat justify-center" style="">

        <div class="  ">
            <img src="https://img.icons8.com/ios-glyphs/344/double-left--v1.png"
                class=" opacity-40 absolute mt-[230px] left-[38%]  w-14 hover:translate-x-[-4px] duration-700 active:bg-slate-800"
                onclick="leftslideshow()" alt="">
            <img src="https://img.icons8.com/ios-glyphs/344/double-left--v1.png"
                class=" opacity-40 absolute mt-[230px] left-[48%]   hover:translate-y-[-4px] duration-700 active:bg-slate-800 w-14 rotate-90"
                onclick="middleslideshow()">
            <img src="https://img.icons8.com/ios-glyphs/344/double-left--v1.png"
                class=" opacity-40 absolute mt-[230px] left-[58%]   hover:translate-x-1 duration-700  w-14  active:bg-slate-800  rotate-180"
                onclick="rightslideshow()" alt="">

        </div>
    </div>

    <!-- footer  copyright-->

    <div class=" h-[30px] bg-gray-900">
        <h1 class=" text-center text-white"> Copyright 2022</h1>
    </div>


</body>

</html>

<script>
    function productslistshow() {

        var product_suffel = document.getElementById("message");

        if(product_suffel.style.display != "block"){
            
        product_suffel.style.display = "block";
        }else{
        product_suffel.style.display = "none";
    
        }


    }

    function productslistremove() {
    document.getElementById("message").style.display="none";

    }


    //  ARRAY FOOTER ITEMS

    var image = ["https://images.pexels.com/photos/1405773/pexels-photo-1405773.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                 "https://images.pexels.com/photos/48770/business-time-clock-clocks-48770.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                ,"https://images.pexels.com/photos/1122407/pexels-photo-1122407.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"];
    var i = 0;
    function slideshow(){
        document.getElementById("photo").style.backgroundImage = 'url('+image[i]+')';
        if(i < image.length-1){
        i++;
        }else{
        i=0;
        }
     setTimeout("slideshow()", 4000);
    }

    function leftslideshow(){

    document.getElementById("photo").style.backgroundImage = 'url('+image[0]+')';
        
    }
    function middleslideshow(){

    document.getElementById("photo").style.backgroundImage = 'url('+image[1]+')';

    }


    function rightslideshow(){
    document.getElementById("photo").style.backgroundImage= 'url('+image[2]+')';
    }


    var item = ["Item1","Item2","Item3"];
    var img = ["https://images.pexels.com/photos/1405773/pexels-photo-1405773.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                 "https://images.pexels.com/photos/48770/business-time-clock-clocks-48770.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                ,"https://images.pexels.com/photos/1122407/pexels-photo-1122407.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"];
  

    
    var j = 0;
    // document.getElementById(" text").innerHTML = item[j];
    // document.getElementById("img").style.backgroundImage = 'url('+img[0]+')';
    function divslideshow(){
        document.getElementById(" text").innerHTML = item[j];
      
        if(j < item.length-1){
        j++;
        }else{
        j=0;
        }
     setTimeout("divslideshow()", 1000);
    }


    window.onload= slideshow;

</script>