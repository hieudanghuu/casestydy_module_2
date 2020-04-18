<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'name', 'phone','address','note'
    ];

    public function product_order()
    {
        return $this->hasMany('App\Product_Order','order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
