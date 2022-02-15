@extends("admin")

@section('content')


<?php $page = 'adminproductmanage' ?>

<table class="  overflow-y-hidden border-2 border-l-blue-400 mx-[10%]  ">
    <tr class="border-2 border-l-blue-400  ">
        <th class="  px-4">id</th>
        <th class="  px-4">uid</th>
        <th class="  px-4">product</th>
        <th class="   px-4">item_name</th>
        <th class="  px-4">price</th>
        <th class="   px-4">description</th>
        <th class="  px-4">image</th>
    </tr>

    @foreach ($item as $item)
    <tr>
        <td class=" px-4">{{ $item->id }} </td>
        <td class=" px-4">{{ $item->uid }} </td>

        <td class=" px-4">{{ $item->product }} </td>

        <td class=" px-4">{{ $item->item_name }} </td>

        <td class=" px-4">{{ $item->price }} </td>

        <td class=" px-4">{{ $item->description }} </td>

        <td class=" px-4"><img src="images/{{$item->image}}" alt=""></td>
       

        <td> <a href="adminproductmanage/edit/{{ $item->id }}" class=" font-mono mt-8 bg-sky-600 py-2 px-5 text-center hover:bg-sky-700 rounded-md">Edit</a>
        </td>
        <td><a href="adminproductmanage/delete/{{ $item->id }}" class=" font-mono mt-8 bg-red-600 py-2 px-5 text-center hover:bg-red-700 rounded-md">delete</a>
        </td>
        <td> <a href="adminproductmanage/discount/{{ $item->id }}" class=" font-mono mt-8 bg-yellow-700 py-2 px-5 text-center hover:bg-yellow-800 rounded-md ">Discount</a>
        </td>
        
    </tr>

    @endforeach

</table>



@endsection