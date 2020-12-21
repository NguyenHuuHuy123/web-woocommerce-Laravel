<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = "tbl_category_product";
    public $timestamps = false;

    public function getBrand()
    {
        return $this->hasMany('App\BrandModel', 'category_id', 'id');
    }

    public function getProduct()
    {
        return $this->hasMany('App\ProductModel', 'category_id', 'id');
    }
}
