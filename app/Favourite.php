<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    protected $guarded = [];

    public function getUserIdAttribute($userId){
        return User::find($userId);
    }

    public function getProductIdAttribute($productId){
        return Product::find($productId);
    }
}
