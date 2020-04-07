<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post_tran extends Model
{
    use SoftDeletes;
    protected $table = 'post_trans';
    protected $fillable = ['id','name','title','content','image','post_id','locale'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
