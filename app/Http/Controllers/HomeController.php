<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\BrandModel;
use App\ProductModel;
use App\DetailOderModel;
use Session;

class HomeController extends Controller
{
    public function index(){
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
        $allProduct = ProductModel::all();
        $giohang = Session::get("cart");
        $tongGioHang = 0;
        foreach($giohang as $idProduct => $quantity){
            $giaTien = $allProduct->find($idProduct)->product_price;
            $tongGioHang = $tongGioHang + $giaTien*$quantity;
        };
        Session::put("tongGioHang",$tongGioHang );
        return view('pages.cart');
    }

    public function deleteProductCart( $idProduct ){
        $giohang = Session::get("cart");
        unset($giohang[$idProduct]);
        Session::put("cart", $giohang);
        DetailOderModel::where("product_id", $idProduct)->delete();
        return back();
    }

    //Check OUT
    public function checkOut( ){
        $allProduct = ProductModel::all();
        $giohang = Session::get("cart");
        $tongGioHang = 0;
        foreach($giohang as $idProduct => $quantity){
            $giaTien = $allProduct->find($idProduct)->product_price;
            $tongGioHang = $tongGioHang + $giaTien*$quantity;
        };
        Session::put("tongGioHang",$tongGioHang );
        return view('pages.checkout');
    }

}
