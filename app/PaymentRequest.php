<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentRequest extends Model
{
    protected $guarded = [];

    public function getSellerIdAttribute($seller_id){
        return [
            User::find($seller_id),
            Wallet::where('user_id', '=', $seller_id)->first(),
            PaymentMethod::where('user_id', '=', $seller_id)->first()
        ];
    }
}
