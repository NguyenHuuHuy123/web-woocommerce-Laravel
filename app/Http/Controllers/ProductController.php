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

class ProductController extends Controller
{
    public function add_product()
    {
        $allCategory = DB::table('tbl_category_product')->get();
        return view("admin.product.add_product", ["allCategory" => $allCategory]);
    }

    public function save_product(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_desc' => 'required',
        ], [
            'product_name.required' => 'Không được để trống tên sản phẩm',
            'product_price.required' => 'Không được để trống giá sản phẩm',
            'product_desc.required' => 'Không được để trống mô tả sản phẩm',
        ]);
        $data = array();
        $data["product_name"] = $request->product_name;
        $data["product_price"] = $request->product_price;
        $data["category_id"] = $request->category_id;
        $data["brand_id"] = $request->brand_id;
        $data["product_status"] = $request->product_status;
        $data["product_desc"] = $request->product_desc;

        if ($request->hasFile("product_image")) { // Kiểm tra có tải ảnh lên chưa
            $file_image = $request->product_image;  // Nếu có -> gán biến giá trị file tải lên
            $file_image_name = rand(1, 100) . '-' . $file_image->getClientOriginalName();
            $file_image->move("public/upload/product", $file_image_name);  //Lấy giá trị tên + đuôi
            // Hàm move có chức năng di chuyên ảnh trong bộ nhớ tạm vào thư mục của local.
            $data["product_image"] = "/public/upload/product/" . $file_image_name;
            DB::table("tbl_product")->insert($data);
            Session::put("message", "THÊM sản phẩm thành công!");
            return redirect("/admin/add-product");
        }

        DB::table("tbl_category_product")->insert($data);
        Session::put("message", "THÊM sản phẩm thành công!");
        return redirect("/admin/add-product");
    }


    public function all_product()
    {
        $all_product = ProductModel::all();
        return view("admin.product.all_product", compact('all_product'));
    }

    public function change_status_product($product_id, $product_status)
    {
        if ($product_status == 0) {
            DB::table('tbl_product')->where("id", $product_id)->update(["product_status" => 1]);
            Session::put("message_update", "Đã ẨN HIỂN THỊ sản phẩm thành công!");
        };
        if ($product_status == 1) {
            DB::table('tbl_product')->where("id", $product_id)->update(["product_status" => 0]);
            Session::put("message_update", "Đã HIỂN THỊ sản phẩm thành công!");
        }
        return redirect("/admin/all-product");
    }

    public function action_product($product_id, $product_action)
    {
        if ($product_action == "edit") {
            $all_brand = DB::table("tbl_brand_product")->get();
            $all_category = DB::table("tbl_category_product")->get();
            $product_item = DB::table('tbl_product')->where("id", $product_id)->get();
            return view("admin.product.edit_product", ['product_item' => $product_item, 'all_brand' => $all_brand, 'all_category' => $all_category]);
        };
        if ($product_action == "delete") {
            DB::table('tbl_product')->where("id", $product_id)->delete();
            Session::put("message_update", "Đã XÓA sản phẩm thành công!");
            return redirect("/admin/all-product");
        }
    }

    public function edit_product(Request $request, $product_id)
    {
        $product_data = array();
        $product_data["product_name"] = $request->product_name;
        $product_data["product_price"] = $request->product_price;
        $product_data["category_id"] = $request->category_id;
        $product_data["brand_id"] = $request->brand_id;
        $product_data["product_desc"] = $request->product_desc;

        if ($request->hasFile('product_image')) {
            $file_image = $request->product_image;
            $file_image_name = rand(1, 100) . $file_image->getClientOriginalName();
            $file_image->move("public/upload/product", $file_image_name);
            $product_data["product_image"] = "/public/upload/product/" . $file_image_name;
            DB::table('tbl_product')->where("id", $product_id)->update($product_data);
            Session::put("message_update", "UPDATE sản phẩm thành công!");
            return redirect("/admin/all-product");
        }

        DB::table('tbl_product')->where("id", $product_id)->update($product_data);
        Session::put("message_update", "UPDATE sản phẩm thành công!");
        return redirect("/admin/all-product");
    }
}

