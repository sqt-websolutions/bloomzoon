<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = [];

    public function getProductIdAttribute($product_id){
        return Product::find($product_id);
    }

    public function getUserIdAttribute($user_id){
        return User::find($user_id);
    }
}
