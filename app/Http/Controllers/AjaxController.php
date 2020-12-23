<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facedes\Redriect;
use App\ProductModel;
use App\CategoryModel;
session_start();

class AjaxController extends Controller
{
    public function getBrand($idCategory){
        $brand = BrandModel::where("category_id",$idCategory)->get();
        foreach ($brand as $br){
            echo '<option value="'.$br->id.'">'.$br->brand_name.'</option>';
        }
    }

    public function saveCart(Request $request){
        $idProduct = $request->idProduct;
        $quatity = $request->quatity;
        $giohang = Session::get("cart");
        $giohang[$idProduct] = $quatity ;
        Session::put("cart", $giohang);
        echo count($giohang);
    }
}
