

@extends("productmanager")
@section('contents')
 <?php $page = "producthome" ?>
 
 
 @foreach ($names as $names)
     



 <div class=" mt-20 mb-5 text-center text-3xl text-black"> Edit product </div>
 <form action="/productupdate/edit/{{ $names->id }}" class=" flex  justify-center" method="post" enctype="multipart/form-data">
     @csrf
     
     <div class=" flex-row ">
         <div class="">
             <input name="product" type="text" class=" w-[300px] rounded-md " name="" value="{{ $names->product }}" placeholder="Brand...">
             <span>@if($errors->any())
                 {{ implode('', $errors->all('<div>:message</div>')) }}
             @endif</span>
         </div>
 
         <div class=" ">
             <input name="item_name" type="text" class="  w-[300px] mt-5 rounded-md" name=""  value="{{ $names->item_name }}" >
         </div>
 
         <div class="">
             <input name="price" type="text" class=" w-[300px] mt-5 rounded-md "  value="{{ $names->price }}" placeholder="price..">
         </div>
 
         <div class=" ">
             <textarea name="description" id="" cols="10"   class="  w-[300px]  mt-5 rounded-md" rows="10"
                 > value="{{ $names->description }}"</textarea>
         </div>
         <div>
             <h1 class=" font-mono" > Add photo</h1>
             <input type="file" name="image" alt=""  value="{{ $names->image }}">
  
            
         </div>
 
 
         <button type="submit" class=" w-[300px] font-mono mt-8 bg-sky-600 py-2 px-7 text-center hover:bg-sky-700 rounded-md">update</button>
             <button> <a href="/products" class=" w-[300px] font-mono mt-8 bg-sky-600 py-2 px-7 text-center hover:bg-sky-700 rounded-md">back</a>
             </button>
            </div>
 
 </form>
 
 

 @endforeach


@endsection