<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facedes\Redriect;
use App\CategoryModel;
use App\BrandModel;
session_start();

class BrandController extends Controller
{
    public function add_brand_product()
    {
        $all_category_product = CategoryModel::all();
//        dd(BrandModel::find(13)->getProduct->toArray());
        return view("admin.brand.add_brand_product", ['all_category_product'=>$all_category_product]);
    }

    public function all_brand_product()
    {
        $all_brand_product = BrandModel::all();
//        dd(BrandModel::find(8));
//        $all_category_product = CategoryModel::all();
        return view("admin.brand.all_brand_product", ['all_brand_product'=>$all_brand_product]);
    }

    public function save_brand_product(Request $request)
    {
        $data = array();
        $data["brand_name"] = $request->brand_name;
        $data["brand_desc"] = $request->brand_desc;
        $data["brand_status"] = $request->brand_status;
        $data["category_id"] = $request->category_id;
        DB::table("tbl_brand_product")->insert($data);
        Session::put("message", "THÊM thương hiệu sản phẩm thành công!");
        return redirect("/admin/add-brand-product");
    }

    public function change_status_brand_product($brand_id, $brand_status)
    {
        if ($brand_status == 0) {
            DB::table('tbl_brand_product')->where("id", $brand_id)->update(["brand_status" => 1]);
            Session::put("message_update", "Đã ẨN HIỂN THỊ thương hiệu thành công!");
        };
        if ($brand_status == 1) {
            DB::table('tbl_brand_product')->where("id", $brand_id)->update(["brand_status" => 0]);
            Session::put("message_update", "Đã HIỂN THỊ thương hiệu thành công!");
        }
        return redirect("/admin/all-brand-product");
    }

    public function action_brand_product($brand_id, $brand_action)
    {
        if ($brand_action == "edit") {
            $brand_item = BrandModel::find($brand_id)->toArray();
            $all_category_product = CategoryModel::all();
            return view("admin.brand.edit_brand_product", ['brand_item'=>$brand_item,'all_category_product'=>$all_category_product]);
            echo '<pre>';
            print_r($brand_item['category_id']);
            echo '</pre>';
        };
        if ($brand_action == "delete") {
            DB::table('tbl_brand_product')->where("id", $brand_id)->delete();
            Session::put("message_update", "Đã XÓA thương hiệu sản phẩm thành công!");
            return redirect("/admin/all-brand-product");
        }
    }

    public function edit_brand_product(Request $request, $brand_id)
    {
        $brand_data = BrandModel::find($brand_id);
        $brand_data->brand_name = $request->brand_name;
        $brand_data->category_id = $request->category_id;
        $brand_data->brand_desc = $request->brand_desc;
        $brand_data->save();
        Session::put("message_update", "UPDATE danh mục sản phẩm thành công!");
        return redirect("/admin/all-brand-product");
    }

}

