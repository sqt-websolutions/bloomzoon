<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded = [];

    public function getFormattedDate(): string
    {
       return Carbon::parse($this->attributes['created_at'])->format('d/m/y');
    }

    public function getFormattedTime(): string
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
}
