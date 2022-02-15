<?php

namespace App\Http\Controllers;

use App\Models\comments;
use App\Models\reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commentcontroller extends Controller
{
    
    public function commentadd(Request $request , $product,$id){

        $user = Auth::user();
//   dd($user->name);
       

        $request->validate([
            'comment' => 'required|min:2',
        
        ]);

        $comments = new comments();
        $comments->comment = $request->input('comment');
        $comments->commentuserid = $user->id;
        $comments->username = $user->name;
        $comments->product = $product;
        // $comments->save();
        

        
          return redirect()->back();
      }


      public function replyadd( Request $request ,$commentid ,$userid){
       
        
        $request->validate([
              'reply'=> 'required|min:2',
          ]);
          
        $reply = new reply();
        $reply->reply = $request->input('reply');
        $reply->replyuserid = $userid;
        $reply->commentid = $commentid;
        // $reply->save();


        return redirect()->back();

    
        

          

      }
}
