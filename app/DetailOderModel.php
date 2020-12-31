<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOderModel extends Model
{
    protected $table = "tbl_detail_oder";

     public function getProduct()
    {
        return $this->belongsTo('App\ProductModel', 'product_id', 'id');
    }
}
