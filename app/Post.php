<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//    use SoftDeletes;

    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected  $fillable = ['post_id','post_title','content','image','post_category_id'];
}
