@extends("admin")

@section('content')

<?php $page = 'admindiscounttoken' ?>
<h1 class=" text-center mt-5 text-2xl">Discount Add</h1>
@foreach ($product as $product )
<div class=" text-center text-white"> product :
{{ $product -> product }} <br> price :
{{ $product->price }}
</div>
@endforeach
<form action="/discountadd/{{$product->product}}/{{$product->id}}" method="post">
    @csrf
    <div class=" flex justify-center">
        <input name="discount" type="text" class="  w-[300px] mt-5 rounded-md" name=""
            placeholder="Discount-percentage...">
         
    </div>
    @error('discount')
    <div class=" text-center text-white">{{ $message }}</div>
    @enderror
    <div class=" flex justify-center align-items-center">

        <button type="submit"
            class=" w-[300px] font-mono mt-8 bg-sky-600 py-2 px-7 text-center hover:bg-sky-700 rounded-md">Submit</button>

    </div>

</form>
<div class=" mt-4 flex justify-center align-items-center">
    <button> <a href="/adminproductmanage"
            class="w-[300px] font-mono  bg-sky-600 py-2 px-7 text-center hover:bg-sky-700 rounded-md">back</a>
    </button>

</div>

@endsection