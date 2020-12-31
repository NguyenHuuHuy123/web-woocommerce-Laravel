<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryModel;
use App\BrandModel;
use App\ProductModel;

use App\CustomerModel;
use App\OderModel;
use App\DetailOderModel;

use Session;

class CustomerController extends Controller
{
    public function createUserAndSaveOder(Request $request){

        $giohang = Session::get("cart");
        //Hien thi thong bao neu trong gio khong co san pham
        if (count($giohang) == 0){
            Session::put("message_check_cart", 'Bạn phải có ít nhất một sản phẩm trong giỏ.');
            return redirect("/shop/checkout");
        }

        //Kiểm tra thông tin khách hàng nhập vào và lưu vào db
        $request->validate([
            'customer_name'=>'required|min:2|max:50',
            'customer_phone'=>'required|min:10|max:10',
            'customer_email'=>'required|min:10|max:100',
            'customer_address'=>'required|min:7|max:300',
            'customer_password'=>'required|min:6|max:50',
            'customer_password_confirm'=>'same:customer_password',
        ],[
            'customer_name.required'=> "Không được để trống tên",
            'customer_phone.required'=> "Không được để trống số điện thoại",
            'customer_email.required'=> "Không được để trống địa chỉ email",
            'customer_address.required'=>'Bạn không được để trống địa chỉ, chúng tôi cần nó để giao hàng.',
            'customer_password.required'=> "Bạn không được để trống mật khẩu. Bạn sẽ sử dụng mật khẩu này để theo dõi giỏ hàng",
            'customer_password_confirm.same'=> "Mật khẩu xác nhận chưa khớp",
        ]);

        $customer = new CustomerModel();
        $customer->name = $request->customer_name;
        $customer->phone = $request->customer_phone;
        $customer->gmail = $request->customer_email;
        $customer->address = $request->customer_address;
        $customer->password = md5($request->customer_password);
        $customer->save();

        // Thong tin gio hang SESSION
        $allProduct = ProductModel::all();

        $tongGioHang = 0;
        foreach($giohang as $idProduct => $quantity){
            $giaTien = $allProduct->find($idProduct)->product_price;
            $tongGioHang = $tongGioHang + $giaTien*$quantity;
        };

        //Thong tin don hang
        if($tongGioHang != 0){
            $oder = new OderModel();
            $oder->customer_id = $customer->id;
            $oder->total_cart = $tongGioHang;
            $oder->tax = $tongGioHang*5/100;
            $oder->total = $tongGioHang*105/100;
            $oder->description= $request->oder_description;
            $oder->status = 1;
            $oder->save();
        }


        /* TRẠNG THÁI ĐƠN HÀNG
         * 1: Đơn hàng đã được gửi đi, đang chờ xác nhận
         * 2: Đơn hàng đang được ship đến chỗ người nhận
         * 3: Đã nhận hàng thành công
         * 4: Nhận hàng thất bại
         * 5: Tạm hoãn giao hàng
         * 6: Hủy đơn hàng
         *
         * */

        //Lưu thông tin chi tiet đơn hàng vào DB
        foreach($giohang as $idProduct=>$quantity){
            $detailOder = new DetailOderModel();
            $detailOder->oder_id = $oder->id;
            $detailOder->product_id = $idProduct;
            $detailOder->product_price = $allProduct->find($idProduct)->product_price;
            $detailOder->quantity = $quantity;
            $detailOder->total = $idProduct*$detailOder->product_price;
            $detailOder->save();
        }

        Session::put("accountCustomer", $customer->id);
        return redirect("/shop/checkout");
    }

    public function login(){
        return view('pages.login');
    }
    public function logout(){
        Session::put("accountCustomer", null);
        Session::put("cart", array());
        return view('pages.login');
    }

    public function checkAccountCustomer(Request $request){
        $accountCustomer = CustomerModel::where("gmail",$request->email)->first();
        if($accountCustomer){
            if($accountCustomer->password== md5($request->password)){
                Session::put("accountCustomer", $accountCustomer->id);
                Session::put("cart", null);
                return redirect("/shop/checkout");
            }
        }
        Session::put("message", 'Email hoặc mật khẩu chưa chính xác!');
        return redirect("/customer/login");
    }

    public function account(){
        $checkLoginCustomer = Session::get('accountCustomer');
        if($checkLoginCustomer){
            $accountCustomer = CustomerModel::find($checkLoginCustomer);
            return view('pages.account',['accountDetailCustomer'=>$accountCustomer]);
        } else {
            return view('pages.account');
        }
    }


}
