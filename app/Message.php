<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function getReplyIdAttribute($reply_id){
        return Reply::find($reply_id);
    }
}
