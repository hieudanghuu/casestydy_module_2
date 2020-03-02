<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Sim extends Model
{
//    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'sims';
    protected $fillable = ['sim_name','sim_price','sim_image','sim_category_id', 'deleted_at'];
    protected $primaryKey = 'sim_id';

    public function product_order()
    {
        return $this->belongsTo('App\Product_Order');
    }

}
