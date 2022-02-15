<?php

namespace App\Http\Controllers;

use App\Models\adminproductdescribe;
use App\Models\discount;
use App\Models\productdescribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class admincontroller extends Controller
{
    public function adminhome()
    {
        return view('adminblade.adminhome');
    }

    public function adminproductmanage()
    {
        $item = adminproductdescribe::all();
        return view('adminblade.adminproductmanage', ['item' => $item]);
    }

    public function admindiscounttoken()
    {

        return view('adminblade.admindiscounttoken');
    }



    // to add product


    public function adminproductadd(Request $request)
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


        $adminproductdescribe = new adminproductdescribe();
        $adminproductdescribe->uid = Auth::user()->id;
        $adminproductdescribe->product = $request->input('product');
        $adminproductdescribe->item_name = $request->input('item_name');
        $adminproductdescribe->price = $request->input('price');
        $adminproductdescribe->description = $request->input('description');
        $adminproductdescribe->image = $newimagename;
        $adminproductdescribe->save();


        // discount table default


        $discount = new discount();

        $discount->product = $request->input('product');
        $discount->price = $request->input('price');

        $discount->save();



        return view('adminblade.adminhome');
    }


    //  to edit page route

    public function adminproducteditpage($id)
    {
        // ddd($id);
        // $names = adminproductdescribe::all();
        $names = adminproductdescribe::where('id', '=', $id)->get();

        return view('adminblade.adminproductedit', ['names' => $names]);
    }




    public function adminproductdiscountpage($id)
    {
        $product =  adminproductdescribe::where('id', '=', $id)->get(['id', 'product', 'price']);
        return view('adminblade.admindiscountadd', ['product' => $product]);
    }

    // discount add in discount table 

    public function discountadd(Request $request, $product, $id)
    {
        $request->validate([
            'discount' => 'required|max:2',
        ]);

        $discountincome = $request->input('discount');

        DB::update("update discounts set prodid = ? , discount = ? where product = ?", [$id,$discountincome,$product]);

        return redirect('/adminproductmanage');
    }

    // Update product

    public function adminproductupdate(Request $request, $id)
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

        $adminproductdescribe = adminproductdescribe::find($id);

        $adminproductdescribe->product = $request->input('product');
        $adminproductdescribe->item_name = $request->input('item_name');
        $adminproductdescribe->price = $request->input('price');
        $adminproductdescribe->description = $request->input('description');
        $adminproductdescribe->image = $newimagename;
        $adminproductdescribe->update();

        return redirect('/adminproductmanage');
    }

    // Delete the data
    public function adminproductdelete($id)
    {
        // $names = adminproductdescribe::where('id' ,'=', $id)->get();
        // ddd($id);
        // $id->delete();
        $adminproductdescribe = adminproductdescribe::find($id);
        $adminproductdescribe->delete();
        return redirect('/adminproductmanage');
    }
}
