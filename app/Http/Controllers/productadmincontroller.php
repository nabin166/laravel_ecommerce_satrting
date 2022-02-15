<?php

namespace App\Http\Controllers;

use App\Models\productdescribe;
use Illuminate\Support\Facades\Auth;




use Illuminate\Http\Request;
use Productdesc as GlobalProductdesc;

class productadmincontroller extends Controller
{
    public function products()
    {
        $item = productdescribe::all();
        return view('productblade.products',['item'=>$item]);
    }
    public function ownproductdiscount()
    {
        return view('productblade.ownproductdiscount');
    }
    public function producthome()
    {
        return view('productblade.producthome');
    }

    public function productadd(Request $request)
    {

        $request->validate([
            'product' => 'required|min:3',
            'item_name' => 'required|min:3',
            'price' => 'required', 'integer',
            'description' => 'required|min:20',
            'image' => 'required|mimes:jpeg,png,jpg|max:5048',
        ]);

        // for image name repeatation

        $newimagename = time() . '-' . $request->product . '.' . $request->image->extension();
        //   public path for image store

        $test =  $request->image->move(public_path('images'), $newimagename);

        // productdescribe::create([
        //     'product' => $request->input('product'),
        //     'uid' => Auth::user()->id,
        //     'item_name' => $request->input('item_name'),
        //     'price' => $request->input('price'),
        //     'description' => $request->input('description'),
        //     'image' => $newimagename,

        // ]);

        $productdescribe = new productdescribe;
        $productdescribe->uid = Auth::user()->id;
        $productdescribe->product = $request->input('product');
        $productdescribe->item_name = $request->input('item_name');
        $productdescribe->price = $request->input('price');
        $productdescribe->description = $request->input('description');
        $productdescribe->image = $newimagename;
        $productdescribe->save();

        return view('productblade.producthome');
    }

    public function producteditpage($sid){
        $names = productdescribe::where('id' ,'=', $sid)->get();
        return view('productblade.productedit',['names'=>$names]);
    }

    public function productdelete(){

    }

    
    public function productupdate($id ,Request $request){

        $request->validate([
            'product' => 'required|min:3',
            'item_name' => 'required|min:3',
            'price' => 'required', 'integer',
            'description' => 'required|min:20',
            'image' => 'required|mimes:jpeg,png,jpg|max:5048',
        ]);


        $newimagename = time() . '-' . $request->product . '.' . $request->image->extension();


        $test =  $request->image->move(public_path('images'), $newimagename);

    

        $productdescribe = productdescribe::find($id);
        $productdescribe->uid = Auth::user()->id;
        $productdescribe->product = $request->input('product');
        $productdescribe->item_name = $request->input('item_name');
        $productdescribe->price = $request->input('price');
        $productdescribe->description = $request->input('description');
        $productdescribe->image = $newimagename;
        $productdescribe->update();

        return view('productblade.producthome');
       
    }


}
