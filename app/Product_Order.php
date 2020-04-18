<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Order extends Model
{


    protected $table = 'product_order';

    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function sim()
    {
        return $this->belongsTo('App\Sim');
    }
}
