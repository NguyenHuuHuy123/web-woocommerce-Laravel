@extends('layout')
@extends('pages/nosidebar')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ol>
            </div>
            <?php
            $giohang = Session::get('cart');
            ?>
            @if(Session::get('accountCustomer'))
                <div class="register-req">
                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">
                                <?php
                                $status_oder = Session::get('status_oder');
                                if ($status_oder) {
                                    echo $status_oder;
                                }
                                Session::put('status_oder', null);
                                ?>
                            </span></span>
                    </p>
                </div>
                <div style="text-align: left; padding: 0px">
                    <a class="btn btn-default check_out" id="xoadonhang" style="margin: 0px 20px 0px 0px"> HỦY ĐƠN HÀNG
                    </a>
                    <a class="btn btn-default check_out" id="hoangiaohang" style="margin: 0px 20px 0px 0px"> ĐÃ NHẬN
                        ĐƯỢC HÀNG
                    </a>
                </div>
            @else
            <!--            HƯớng dẫn đăng ký-->

                <div class="register-req">
                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Vui lòng sử dụng Đăng ký và Thanh toán để dễ dàng truy cập vào lịch sử đơn đặt hàng của bạn hoặc sử dụng Thanh toán với tư cách Khách</span></span>
                    </p>
                </div>
                <!--            Kết thúc gƯớng dẫn đăng ký-->
                {{--            Bắt dầu điền thông tin và tạo tài khoản--}}
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="shopper-info">
                                <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Thông tin người mua hàng</span></span>
                                </p>



                                <form action="{{URL::to("customer/create-user-and-save-oder")}}" method="post"
                                      name="data_customer">
                                    @csrf
                                    <input class="data_customer" type="text" placeholder="Tên khách hàng"
                                           name="customer_name">
                                    {{--                                @if($errors->has('customer_name'))--}}
                                    <span
                                        style='color: #fe720f; '>{{$errors->first('customer_name')}}</span>
                                    {{--                                @endif--}}
                                    <input class="data_customer" type="number" placeholder="Số điện thoại"
                                           name="customer_phone" min="0" max="9999999999">
                                    @if($errors->has('customer_phone'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_phone')}}</span>
                                    @endif
                                    <input class="data_customer" type="text" placeholder="Địa chỉ"
                                           name="customer_address">
                                    @if($errors->has('customer_address'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_address')}}</span>
                                    @endif
                                    <input class="data_customer" type="email" placeholder="Email" name="customer_email">
                                    @if($errors->has('customer_email'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_email')}}</span>
                                    @endif
                                    <input class="data_customer" type="password" placeholder="Mật khẩu"
                                           name="customer_password">
                                    @if($errors->has('customer_password'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_password')}}</span>
                                    @endif
                                    <input class="data_customer" type="password" placeholder="Xác nhận mật khẩu"
                                           name="customer_password_confirm">
                                    @if($errors->has('customer_password_confirm'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_password_confirm')}}</span>
                                    @endif
                                    <textarea class="data_customer message_customer" name="oder_description"
                                              placeholder="Ghi chú về đơn đặt hàng của bạn, Ghi chú đặc biệt khi giao hàng"
                                              rows="10"></textarea>
                                    <a class="btn btn-primary" href="{{URL::to('/trang-chu')}}"><span
                                            style="vertical-align: inherit;"><span style="vertical-align: inherit;">Tiếp tục mua hàng</span></span></a>
                                    <button type="submit" class="btn btn-primary" href=""><span
                                            style="vertical-align: inherit;"><span
                                                style="vertical-align: inherit;">Thanh toán</span></span></button>
                                    <?php
                                    $mess = Session::get("message_check_cart");
                                    if($mess){
                                        echo "<h4 style='color: #ff0000; text-align: left; display:block; line-height: 40px'>" . $mess ."</h4>";
                                        Session::put("message_check_cart", null);
                                    }
                                    ?>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{--Kết thúc điền thông tin khách hàng--}}
            <div class="review-payment">
                <h2><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Xem lại &amp; Thanh toán</span></span>
                </h2>
            </div>
            {{--            Ket--}}
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price" style="text-align: right; padding-right: 40px">Giá tiền</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total" style="text-align: right; padding-right: 40px">Tổng tiền</td>
                        <td>Xóa</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($giohang)
                        @foreach($giohang as $id=>$quantity)
                            <tr class="chiTietTungSanPham" data-idProduct="{{$id}}">
                                <td class="cart_product">
                                    <a href="{{URL::to('shop/san-pham/'.$id)}}"><img height="30px" width="auto"
                                                                                     src="{{URL::to($allProduct->find($id)->product_image)}}"
                                                                                     alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4>
                                        <a href="{{URL::to('shop/san-pham/'.$id)}}">{{$allProduct->find($id)->product_name}}</a>
                                    </h4>
                                    <p>Mã sản phẩm ID: {{$id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p style="text-align: right; padding-right: 40px">{{number_format($allProduct->find($id)->product_price)}}
                                        vnd</p>
                                </td>
                                <td class="cart_quantity">
                                    <input min="1" max="10" class="cart_quantity_input" type="number" name="quantity"
                                           style="width: 60px" value="{{$quantity}}">
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"
                                       style="text-align: right; padding-right: 40px">{{number_format($quantity * $allProduct->find($id)->product_price)}}
                                        vnd</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{URL::to('shop/cart/delete-product/'.$id)}}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>

            </div>
            <div class="row" style="margin-bottom: 20px">
                <div class="col-sm-6">
                    <div style="text-align: left; padding: 0px"><a class="btn btn-default check_out"
                                                                   style="margin: 10px 0px 0px 0px"
                                                                   id="capnhatlaigiohang"> > Cập
                            nhật lại
                            giỏ
                            hàng</a></div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <?php
                        $tongGioHang = 0;
                        $bienTam = Session::get('tongGioHang');
                        if ($bienTam) {
                            $tongGioHang = $bienTam;
                        };
                        ?>
                        <ul>
                            <li>Tổng giỏ hàng <span>{{number_format($tongGioHang)}} vnd</span></li>
                            <li>Thuế (5%) <span>{{number_format($tongGioHang*5/100)}} vnd</span></li>
                            <li>Phí chuyển hàng <span>Free</span></li>
                            <li>Tổng cộng <span
                                    style="span-weight: bolder">{{number_format($tongGioHang*105/100)}} vnd</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            {{--            href="{{URL::to('shop/cart')}}"--}}
        </div>
    </section>
@endsection

