<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $guarded = [];

    protected function getBuyerIdAttribute($id){
        return User::find($id);
    }

    protected function getSellerIdAttribute($id){
        return User::find($id);
    }

    protected function getProductIdAttribute($id){
        return Product::find($id);
    }

    protected function getOrderIdAttribute($id){
        return Order::find($id);
    }

}
