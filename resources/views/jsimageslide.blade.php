<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Document</title>
</head>

<body class="  mt-[20px] gap-5 ">

    <a class=" bg-slate-500  active:bg-gray-400 hover:bg-gray-400 h-[2rem] " href="#" onclick="checkfunc()"> Checker
    </a>

    <div id="click" class=" hidden  bg-slate-700  w-[5rem] h-[5rem]" style=""></div>

    <div class=" flex flex-col-3">
        <!--side arrow --->
        <img src="https://img.icons8.com/material-rounded/344/down-left.png" id="left" onclick="leftslideshow()"
            style=" height:50px" alt="">
        {{-- <div class=" w-96"></div> --}}
        <img src=" https://img.icons8.com/material-outlined/344/up-right.png " onclick="rightslideshow()"
            style=" height:50px" class=" active:bg-slate-500" alt="">
    </div>


    <div style=" height:200px ; width:150px" class=" bg-gray-200">
        <img id="photo" class=" duration-1000 bg-cover" alt="">
    </div>

</body>

</html>



<script>
    function checkfunc(){
        var product_suffel =   document.getElementById("click");

        if(product_suffel.style.display != "block"){
        
        document.getElementById("click").style.display = "block";
    }else{
        document.getElementById("click").style.display = "";
    }
}


var image = ["https://images.pexels.com/photos/732895/pexels-photo-732895.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
                     "https://images.pexels.com/photos/2365974/pexels-photo-2365974.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                    ,"https://images.pexels.com/photos/1122407/pexels-photo-1122407.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"];
var i = 0;
  function slideshow(){
    document.getElementById("photo").src= image[i];
     if(i < image.length-1){
        i++;
      }else{
        i=0;
      }
     setTimeout("slideshow()", 3000);
    }

    function leftslideshow(){
       document.getElementById("photo").src= image[0];
}
function rightslideshow(){
   document.getElementById("photo").src= image[2];
}



    window.onload= slideshow;
</script>