<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category_id','category_name'];
    protected $primaryKey = 'category_id';

    public function sim()
    {
        return $this->hasMany('App\Sim');
    }
}
