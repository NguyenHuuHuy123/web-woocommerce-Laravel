<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\CategoryModel;
class BrandModel extends Model
{
    protected $table = "tbl_brand_product";
    public $timestamps = false;

    public function getCategory()
    {
        return $this->belongsTo('App\CategoryModel', 'category_id', 'id');
    }

    public function getProduct()
    {
        return $this->hasMany('App\ProductModel', 'brand_id', 'id');
    }
}
