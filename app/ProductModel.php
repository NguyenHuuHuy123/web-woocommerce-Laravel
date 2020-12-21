<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "tbl_product";

    public function getBrand()
    {
        return $this->belongsTo('App\BrandModel', 'brand_id', 'id');
    }

    public function getCategory()
    {
        return $this->belongsTo('App\CategoryModel', 'category_id', 'id');
    }


}
