<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    protected $dates = ['deleted_at'];
    protected  $fillable = ['id'];

    public function post_tran ()
    {
        return $this->hasMany('App\Post_tran');
    }
}
