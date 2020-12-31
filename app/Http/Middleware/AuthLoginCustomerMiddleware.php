<?php

namespace App\Http\Middleware;

use App\ProductModel;
use Session;
use Closure;
use App\CustomerModel;
use App\OderModel;
use App\DetailOderModel;

class AuthLoginCustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $checkLoginCustomer = Session::get("accountCustomer");
        if ($checkLoginCustomer) {
            $idOder = OderModel::where("customer_id", $checkLoginCustomer)->first();
            if ($idOder) {
                Session::put("status_oder", $idOder->getStatus->status);
                //Thông tin status đơn hàng - nếu có

                $detailOder = DetailOderModel::where("oder_id", $idOder->id)->get();
                if (count($detailOder) > 0) {
                    $giohang = array();
                    foreach ($detailOder as $item_oder) {
                        $giohang[$item_oder->product_id] = $item_oder->quantity;
                    }
                    if (Session::get("cart")) {
                        $giohang = Session::get("cart");
                        foreach ($giohang as $idProduct => $quantity) {
                            $checkProduct = false;
                            foreach ($detailOder as $key => $item_product) {
                                if ($idProduct == $item_product->product_id) {
                                    DetailOderModel::where("oder_id", $idOder->id)
                                        ->where("product_id", $idProduct)
                                        ->update(["quantity" => $quantity, "total" => $quantity * $item_product->product_price]);
                                    $checkProduct = false;
                                    break;
                                }
                                $checkProduct = true;
                            }
                            if ($checkProduct) {
                                $newProductOder = new DetailOderModel();
                                $newProductOder->oder_id = $idOder->id;
                                $newProductOder->product_id = $idProduct;
                                $newProductOder->product_price = ProductModel::find($idProduct)->product_price;
                                $newProductOder->quantity = $quantity;
                                $newProductOder->total = $quantity * $newProductOder->product_price;
                                $newProductOder->save();
                            }
                        }
                        // Bắt đầu cập nhật oder sản phẩm
                        $tongGioHang = 0;
                        $detailOder = DetailOderModel::where("oder_id", $idOder->id)->get();
                        foreach($detailOder as $product){
                            $tongGioHang = $tongGioHang + $product->product_price*$product->quantity;
                        }
                        OderModel::where("customer_id", $checkLoginCustomer)
                            ->update(['total_cart'=>$tongGioHang,
                                'tax'=>$tongGioHang*5/100,
                                'total'=>$tongGioHang*105/100
                            ]);
                        // Kết thúc cập nhật oder sản phẩm

                        return $next($request);
                    }
                    Session::put("cart", $giohang);
                } else {
                    if(Session::get("cart")){
                        // Thêm sản phẩm mới vào oder detail khi trong DB ko có sp
                        foreach (Session::get("cart") as $idProduct => $quantity) {
                            $newProductOder = new DetailOderModel();
                            $newProductOder->oder_id = $idOder->id;
                            $newProductOder->product_id = $idProduct;
                            $newProductOder->product_price = ProductModel::find($idProduct)->product_price;
                            $newProductOder->quantity = $quantity;
                            $newProductOder->total = $quantity * $newProductOder->product_price;
                            $newProductOder->save();
                        }
                    }

                    // Bắt đầu cập nhật oder sản phẩm
                    $tongGioHang = 0;
                    $detailOder = DetailOderModel::where("oder_id", $idOder->id)->get();
                    foreach($detailOder as $product){
                        $tongGioHang = $tongGioHang + $product->product_price*$product->quantity;
                    }
                    OderModel::where("customer_id", $checkLoginCustomer)
                        ->update(['total_cart'=>$tongGioHang,
                            'tax'=>$tongGioHang*5/100,
                            'total'=>$tongGioHang*105/100
                        ]);
                    // Kết thúc cập nhật oder sản phẩm
                }
            }
        }
        return $next($request);
    }

}


