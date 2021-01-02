<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


use App\CategoryModel;
use App\BrandModel;
use App\ProductModel;
use App\CustomerModel;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function __construct()
    {
        $this->viewShare();
    }
    public function viewShare(){

        $allCategory = CategoryModel::all();
        $allBrand= BrandModel::all();
        $allProduct = ProductModel::all();
        $allCustomer = CustomerModel::all();
        Session::put("cart", array());

        view()->share([
            'allCategory'=>$allCategory,
            'allBrand'=> $allBrand,
            'allProduct'=>$allProduct,
            'allCustomer'=>$allCustomer
        ]);
    }
}
