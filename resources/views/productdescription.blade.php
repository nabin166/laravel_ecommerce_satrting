<?php  $name = array("Item1","Item2","Item3","Item4","Item5","Item6") ?>

<?php  $slider = array("Item1","Item2","Item3","Item4","Item5","Item6","Item7","Item8") ?>

<?php  $discname = array("disItem1","disItem2","disItem3","disItem4","disItem5","disItem6") ?>


{{-- https://images.pexels.com/photos/1904769/pexels-photo-1904769.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500 --}}







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--
    <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Document</title>
</head>

<body class=" bg-white h-full  scrollbar-hide ">


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


    @foreach ($descriptionpage as $item)

    <div class=" ml-[5.2%]  bg-stone-300 w-[90%]">

        <div class="grid  mt-2">
            <div class=" flex">

                <div style=" background-image:url('/images/{{ $item->image }}')"
                    class=" left-5 top-5  bg-cover bg-center  h-[15rem] w-1/2 "></div>

                <div class=" w-1/2">
                    <div class=" ml-9 text-lg text-black font-mono right-0 top-5">
                        <h1 class=" mb-4 ml-0 text-center">{{ $item->item_name }}</h1>
                        <p>Review---- | </p>
                        <h1> Brand: {{ $item->product }} | </h1>

                        <h1>RS:
                            <?php $discountprice = ($item->discountbelongs->discount / 100)*($item->price) ?> {{(
                            $item->price)-($discountprice )}}
                        </h1>
                        <h1> Discount:
                            <?php $discountprice = ($item->discountbelongs->discount / 100)*($item->price) ?> {{
                            $discountprice }}
                        </h1>
                        <div class=" flex gap-5">
                            <button class=" mt-8 bg-sky-700 py-2 px-3 hover:bg-sky-900 rounded-md"> Add to cart</button>
                            <button class=" mt-8 bg-orange-600 py-2 px-3 hover:bg-orange-700 rounded-md"> Buy
                                now</button>
                        </div>
                    </div>

                </div>
            </div>

            {{-- describe --}}

            {{-- photo down --}}

            <div class=" flex gap-2 mt-[6px]">
                <div style=" background-image:url('https://images.pexels.com/photos/5875910/pexels-photo-5875910.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');"
                    class=" left-5 top-5 bg-cover bg-center  h-[90px] w-[100px]  "></div>
                <div style=" background-image:url('https://images.pexels.com/photos/1047966/pexels-photo-1047966.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');"
                    class=" left-5 top-5  bg-cover bg-center  h-[90px] w-[100px] "></div>
            </div>
        </div>

    </div>


    <div class="">
        <h1 class=" text-center text-3xl mt-4 font-mono"> Product Description</h1>

        <div class="ml-[5.2%] mr-[2%] w-1/2">
            <h1 class=" text">{{ $item->description }}</h1>
        </div>
    </div>



    @if (Route::has('login'))
    @auth
    <!--- comment section for product --->
    <div class="ml-[5.2%] mt-6 mr-[2%] ">
        <h1 class=" text-2xl mb-2"> Comment Section </h1>
        <h1 class="ml-10 text-md"> Add a new comment </h1>

        {{-- comment form --}}
        <form method="Post" action="/commentadd/{{ $item->product }}/{{ $item->id }}">
            @csrf
            <div class=" flex ">
                <!---login user profile image section--->
                <div class=" h-10 w-10 bg-slate-600 rounded-full "></div>

                {{ $user->name }}

                <div>
                    <h1 class=" mt-1">

                    </h1>
                </div>
                <!---comment area--->
                <div class="mt-2 ml-1 w-full "><textarea name="comment" class=" w-full resize-none h-12 font-mono "
                        placeholder=" Write a comment ..." id=""></textarea></div>
            </div>
            <!--- comment button--->
            <button
                class=" mt-1 bg-slate-200 py-1 ring-1 ring-stone-400 font-mono text-black ml-10 px-3 hover:bg-stone-300 rounded-md">
                Post comment </button>
            @error('comment')
            <h1 class=" text-red-900 ml-9 ">{{ $message }}</h1>
            @enderror
        </form>



    </div>

    @endauth
    @endif
    @endforeach
    <h1 class=" text-lg mb-2 mx-[8.4%] ">comments</h1>
    <!--Comment landing space --->


    @foreach ($commentfetch as $comment )


    <div class=" bg- bg-stone-300 mx-[11%] ">
        <div class="mx-[8.4%]   mt-2 h-28">

            <div class=" flex ">

                <!---login user profile image section after comment --->
                <div class=" h-10 w-10 bg-slate-600 rounded-full "></div>
                <div>
                    <h1 class=" mt-1">{{ $comment->username }}</h1>
                </div>
                <div class=" ml-2 ring-stone-200 ring-1 rounded-sm w-full h-9">
                    <h1 class=" mt-1"> {{ $comment->comment }}</h1>
                </div>
            </div>
            @if (Route::has('login'))
            @auth
            <!--- like counting --->

            <div>
                <img src="https://img.icons8.com/external-tal-revivo-regular-tal-revivo/344/external-like-thumbs-up-button-from-popular-social-media-logo-regular-tal-revivo.png"
                    class="absolute  ml-12 mt-1 w-5" alt="">
                <img src="https://img.icons8.com/external-tal-revivo-duo-tal-revivo/344/external-like-thumbs-up-button-from-popular-social-media-logo-duo-tal-revivo.png"
                    class=" hidden absolute ml-12 mt-1 w-5" alt="">
            </div>
            <!---like counting  number--->
            <div class=" mt-1 flex ml-20">
                <div>
                    <h1>2</h1>
                </div>
                <!--- Reply button  --->
                <div>
                    <button onclick="replyshow()"
                        class="  bg-slate-200  ring-1 ring-stone-400 font-mono text-black ml-6 px-3 hover:bg-stone-300 rounded-md">
                        Reply </button>
                </div>
            </div>
            @endauth
            @endif


        </div>
        
       


        @if (Route::has('login'))
        @auth


        <!---Reply section for comment  --->
        <div class=" mx-[11%] mb-2  " id="replysection">

            <h1 class="ml-10 text-md"> Add a new reply </h1>
            <form action="/reply/{{ $comment->id }}/{{$user->id}}" method="POST">
                @csrf

                <div class=" flex ">
                    <!---login user profile image section--->
                    <div class=" h-10 w-10 bg-slate-600 rounded-full "></div>
                    <!---Reply area--->
                    <div class="mt-2 ml-1 w-full "><textarea name="reply"
                            class=" w-full opacity-80 resize-none h-11 font-mono "
                            placeholder=" Reply for this post ..." id=""></textarea></div>
                </div>
                <!--- Reply button--->
                <button
                    class=" mt-1 bg-slate-200 py-1 ring-1 ring-stone-400 font-mono text-black ml-10 px-3 hover:bg-stone-300 rounded-md">
                    Post Reply </button>


            </form>
            @error('reply')
            <div class=" ml-9"> {{ $message }}</div>

            @enderror
        </div>

    
       <!--Reply landing space --->
        @foreach ($forcommentreply as $forreply)
        @foreach ($forreply->replybelong as $forreply)
        <div class="mx-[11%]   mt-2 h-32">

            <div class=" flex ">

                <!---login user profile image section after reply --->
                <div class=" h-10 w-10 bg-slate-600 rounded-full "></div>

                <div>
                    <h1>{{ $forreply->replyuserid }}</h1>
                </div>
                <div class=" ml-2 ring-stone-200 ring-1 rounded-sm w-full h-9">
                    <h1 class=" mt-1">
                        <div>{{ $forreply->reply }}
                    </h1>
                </div>
            </div>
            @if (Route::has('login'))
            @auth
            <!---  Reply like counting --->

            <div>
                <img src="https://img.icons8.com/external-tal-revivo-regular-tal-revivo/344/external-like-thumbs-up-button-from-popular-social-media-logo-regular-tal-revivo.png"
                    class="absolute  ml-12 mt-1 w-5" alt="">
                <img src="https://img.icons8.com/external-tal-revivo-duo-tal-revivo/344/external-like-thumbs-up-button-from-popular-social-media-logo-duo-tal-revivo.png"
                    class=" hidden absolute ml-12 mt-1 w-5" alt="">
            </div>


            <!--- Reply like counting  number--->
            <div class=" mt-1 flex ml-20">
                <div>
                    <h1>--</h1>
                </div>

                <div>
                    {{-- <button onclick="replyshow()"
                        class="  bg-slate-200  ring-1 ring-stone-400 font-mono text-black ml-6 px-3 hover:bg-stone-300 rounded-md">
                        Reply </button> --}}
                </div>
                @else
                <h1>please register for comment.</h1>
                @endauth

                @endif


                <!--- Reply button  --->

            </div>

        </div>
        @endforeach
        @endforeach


        @endauth
        @endif


    </div>


    {{-- comment end for each --}}
    @endforeach

    <!-- footer  copyright-->
    <div class=" w-[100%]  h-[30px] bg-stone-900">
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

    function replyshow(){
        var replysect = document.getElementById('replysection');

        if(replysect.style.display != "block"){
            replysect.style.display="block";
        }else{
            replysect.style.display="";
        }
    }




</script>