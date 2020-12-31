<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facedes\Redriect;
use App\ProductModel;
use App\CategoryModel;
use App\CustomerModel;
use App\OderModel;
use App\DetailOderModel;

session_start();

class AjaxController extends Controller
{
    public function getBrand($idCategory)
    {
        $brand = BrandModel::where("category_id", $idCategory)->get();
        foreach ($brand as $br) {
            echo '<option value="' . $br->id . '">' . $br->brand_name . '</option>';
        }
    }

    public function saveCart(Request $request)
    {
        $idProduct = $request->idProduct;
        $quatity = $request->quatity;
        $giohang = Session::get("cart");
        $giohang[$idProduct] = $quatity;
        Session::put("cart", $giohang);

        /*
         * 1. Kiem tra co ton tai bien session $accountCustomer nếu có thì sẽ thực hiện các hành động sau:
         * - Tìm kiếm trong list oder những hóa đơn mang customer_id = $accountCustomer
         * - Trong danh sach vua tim duoc. Tim kiem trong table detail_oder cac sp có oder_id
         *
         * */

        echo count($giohang);
    }

    public function updateCart(Request $request)
    {
        $objectGioHang = json_decode($request->giohang, true);
        $giohang = Session::get("cart");
        foreach ($objectGioHang as $key => $product) {
            $idProduct = $product["idProduct"];
            $quatity = $product["quatity"];
            $giohang[$idProduct] = $quatity;
        };

        Session::put("cart", $giohang);
        echo "Đã cập nhật sản phẩm thành công";
    }
}
