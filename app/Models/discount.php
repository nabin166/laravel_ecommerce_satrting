<?php

namespace App\Models;
use App\Models\adminproductdescribe;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discount extends Model
{
    // use HasFactory;

    protected $discount = ['productid','prodid', 'product', 'discount', 'price'];

    public $timestamps = false;
    
   
  
}
