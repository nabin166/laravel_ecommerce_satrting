<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;
    protected $reply =['replyuserid','commentid','reply'];
    
    public $timestamps = false;

   public function comment(){
       $this->belongsTo( comments::class);
   }
}
