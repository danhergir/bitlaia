<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderPast extends Model
{
    protected $fillable = ['order_id', 'price', 'client'];
}
