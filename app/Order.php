<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id', 'price', 'client', 'created_at'];
    protected $dates = ['created_at', 'updated_at',];
}
