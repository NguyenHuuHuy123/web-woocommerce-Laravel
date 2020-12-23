<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\BrandModel;
use App\ProductModel;
use Session;

class HomeController extends Controller
{
    function __construct()
    {
        $this->viewShare();
    }
    public function viewShare(){
        $allCategory = CategoryModel::all();
        $allBrand= BrandModel::all();
        $allProduct = ProductModel::all();
        Session::put("cart", array());
        view()->share(['allCategory'=>$allCategory, 'allBrand'=> $allBrand, 'allProduct'=>$allProduct ]);
    }
    public function index(){

        $allProduct = ProductModel::take(6)->orderBy('id', 'desc')->get();
        return view("pages.home");
    }

    public function getProductCategory($category_id){
        $filterProduct = ProductModel::where('category_id','=',$category_id)->get();
        $titleProduct = CategoryModel::find($category_id)->category_name;
        return view('pages.shop', ['filterProduct'=>$filterProduct, 'titleProduct'=>$titleProduct]);
    }

    public function getProductBrand($brand_id){
        $filterProduct = ProductModel::where('brand_id','=',$brand_id)->get();
        $titleProduct = BrandModel::find($brand_id)->brand_name;
        return view('pages.shop', ['filterProduct'=>$filterProduct, 'titleProduct'=>$titleProduct]);
    }

    public function getProductId($product_id){
        $detailProduct = ProductModel::find($product_id);
        return view('pages.single_product', ['detailProduct'=>$detailProduct]);
    }

    public function getCart(){
        return view('pages.cart');
    }

    public function deleteProductCart( $idProduct ){
        $giohang = Session::get("cart");
        unset($giohang[$idProduct]);
        Session::put("cart", $giohang);
        return redirect("/shop/cart");
    }


}
