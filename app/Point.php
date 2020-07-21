<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [];

    public function getSaleIdAttribute($saleId){
        return Sale::find($saleId);
    }
}
