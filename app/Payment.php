<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function getOrderIdAttribute($orderId){
        return Order::find($orderId);
    }
}
