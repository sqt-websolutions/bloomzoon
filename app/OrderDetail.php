<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function getProductIdAttribute($product_id)
    {
        return Product::find($product_id);
    }



}
