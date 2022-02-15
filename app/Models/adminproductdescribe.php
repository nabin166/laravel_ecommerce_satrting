<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\discount;

class adminproductdescribe extends Model
{
    use HasFactory;
    protected $fillable = ['product', 'item_name', 'price', 'description', 'image'];

    public $timestamps = false;

    public function discountbelongs()
    {
        return $this->belongsTo(related: discount::class ,foreignKey:'product'  , ownerKey: 'product');
    }

}
