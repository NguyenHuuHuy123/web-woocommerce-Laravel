<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facedes\Redriect;

session_start();

class CategoryController extends Controller
{
    public function add_category_product()
    {
        return view("admin.category.add_category_product");
    }

    public function all_category_product()
    {
        $all_category_product = DB::table("tbl_category_product")->get();
        return view("admin.category.all_category_product", compact('all_category_product'));
    }

    public function save_category_product(Request $request)
    {
        $data = array();
        $data["category_name"] = $request->category_name;
        $data["category_desc"] = $request->category_desc;
        $data["category_status"] = $request->category_status;

        $resutl = DB::table("tbl_category_product")->insert($data);
        Session::put("message", "THÊM sản phẩm thành công!");
        return redirect("/admin/add-category-product");
    }

    public function change_status_category_product($category_id, $category_status)
    {
        if ($category_status == 0) {
            DB::table('tbl_category_product')->where("id", $category_id)->update(["category_status" => 1]);
            Session::put("message_update", "Đã ẨN HIỂN THỊ danh mục thành công!");
        };
        if ($category_status == 1) {
            DB::table('tbl_category_product')->where("id", $category_id)->update(["category_status" => 0]);
            Session::put("message_update", "Đã HIỂN THỊ danh mục thành công!");
        }
        return redirect("/admin/all-category-product");
    }

    public function action_category_product($category_id, $category_action)
    {
        if ($category_action == "edit") {
            $category_item = DB::table('tbl_category_product')->where("id", $category_id)->get();
            return view("admin.category.edit_category_product", compact('category_item'));
        };
        if ($category_action == "delete") {
            DB::table('tbl_category_product')->where("id", $category_id)->delete();
            Session::put("message_update", "Đã XÓA danh mục sản phẩm thành công!");
            return redirect("/admin/all-category-product");
        }
    }

    public function edit_category_product(Request $request, $category_id)
    {
        $category_data = array();
        $category_data["category_name"] = $request->category_name;
        $category_data["category_desc"] = $request->category_desc;
        DB::table('tbl_category_product')->where("id", $category_id)->update($category_data);
        Session::put("message_update", "UPDATE danh mục sản phẩm thành công!");
        return redirect("/admin/all-category-product");
    }
}
