<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OderModel extends Model
{
    protected $table = "tbl_oder";

    public function getCustomer()
    {
        return $this->belongsTo('App\CustomerModel', 'customer_id', 'id');
    }

    public function getStatus()
    {
        return $this->belongsTo('App\StatusModel', 'status', 'id');
    }
}
