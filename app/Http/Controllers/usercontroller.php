<?php

namespace App\Http\Controllers;

use App\Models\adminproductdescribe;
use App\Models\comments;
use App\Models\discount;
use App\Models\reply;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function homepage()
    {


        // $name = adminproductdescribe::with(relations: 'discountbelongs')->get();
        // $name = adminproductdescribe::all();
        $name =    DB::table('adminproductdescribes')
            ->join('discounts', 'discounts.product', '=', 'adminproductdescribes.product')
            ->select('*')
            ->get();

        // foreach($users as $users) {
        //     dd($users->discount);
        // }


        return view('frontpage', [
            'name' => $name
        ]);
    }

    public function productdescription($id, $product, Request $request)
    {
        $descriptionpage = adminproductdescribe::where('id', '=', $id)->with(relations: 'discountbelongs')->get();

        // $forcommentreply  =    DB::table('comments')
        //     ->join('replies', 'replies.commentid', '=', 'comments.id')
        //     ->select('*')    
        //     ->get();

        $forcommentreply = comments::with(relations: 'replybelong')->get();
        // foreach($forcommentreply as $forcommentreply){
        //     foreach($forcommentreply->replybelong as $reply){
        //         dd($reply);
        //     }
        // }
        

        // $replyfetch = reply::get()->where('commentid', ); 

        $commentfetch = comments::get()->where('product', $product);

        if (Auth::check('login')) {
            $user = $request->user();
            return view('productdescription', ["descriptionpage" => $descriptionpage, "commentfetch" => $commentfetch, 'user' => $user, 'forcommentreply' => $forcommentreply]);
        } else {
            return view('productdescription', ["descriptionpage" => $descriptionpage, "commentfetch" => $commentfetch]);
        }
    }
    public function redirect()
    {

        $usertype = Auth::user()->usertype;


        if ($usertype == '0') {
            return redirect('/');
        } elseif ($usertype == '1') {

            return view('productblade.producthome');
        } else {
            return  view('adminblade.adminhome');
        }
    }
}
