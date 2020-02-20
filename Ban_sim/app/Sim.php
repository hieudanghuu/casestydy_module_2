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



//    public function search($key)
//    {
//        $sql = "SELECT * sim.name FROM sims INNER JOIN categories ON sims.sim_category_id = categories.categoris_id
//WHERE sims.sim_name like '%key%'";
//        $this->setQuery($sql);
//        dd( $this->setQuery($sql));
//        return $this->loadAllRows(array($key));
//    }

}
