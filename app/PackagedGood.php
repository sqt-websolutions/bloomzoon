<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackagedGood extends Model
{
    protected $guarded = [];

    public function getOrderIdAttribute($order_id){
        return Order::find($order_id);
    }
}
