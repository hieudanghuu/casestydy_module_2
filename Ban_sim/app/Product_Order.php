<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Order extends Model
{
    protected $table = 'product_order';

    public function Order()
    {
        return $this->hasMany('App\Order');
    }
    public function Sim()
    {
        return $this->hasMany('App\Sim');
    }
}
