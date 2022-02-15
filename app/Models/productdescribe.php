<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productdescribe extends Model
{
    // use HasFactory;
    protected $fillable = ['product','item_name','price','description','image'];
   
    public $timestamps = false;

}
