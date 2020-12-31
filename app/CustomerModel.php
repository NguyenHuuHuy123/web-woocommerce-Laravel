<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = "tbl_customer";

    public function getOder()
    {
        return $this->hasMany('App\OderModel', 'customer_id', 'id');
    }

    public function getDetailOder()
    {
        return $this->hasMany('App\DetailOderModel', 'oder_id', 'id');
    }
}
