<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    public function product_order()
    {
        return $this->belongsTo('App\Product_Order');
    }

}
