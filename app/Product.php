<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function getUserIdAttribute($userId){
        return User::find($userId);
    }
    public function getCategoryIdAttribute($Id){
        return Category::find($Id);
    }

    public function reviews(){
        return $this->hasMany('App\Review','product_id','id');
    }
}
