<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function getUserIdAttribute($userId){
        return User::find($userId);
    }

    public function getIdAttribute($id): array
    {
        return ['order_id' => $id, 'order_details' => OrderDetail::where('order_id', '=', $id)->get()];
    }

    public function getDeliveryAgentIdAttribute($Id)
    {
        return User::find($Id);
    }




}
