<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $comment = ['commentuserid','username','product','comment'];
    
    public $timestamps = false;
    
    public function replybelong(){
        return $this->hasMany(reply::class ,foreignKey:'commentid' ,localKey:'id');
    }
}
