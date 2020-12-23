@extends('layout')
@extends('pages/nosidebar')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ol>
            </div>
            <?php
            $giohang = Session::get('cart')
            ?>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price"  style="text-align: right; padding-right: 40px">Giá tiền</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total" style="text-align: right; padding-right: 40px">Tổng tiền</td>
                        <td>Xóa</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($giohang)
                        @foreach($giohang as $id=>$quantity)
                            <tr class="chiTietTungSanPham">
                                <td class="cart_product">
                                    <a href="{{URL::to('shop/san-pham/'.$id)}}"><img height="30px" width="auto" src="{{URL::to($allProduct->find($id)->product_image)}}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="{{URL::to('shop/san-pham/'.$id)}}">{{$allProduct->find($id)->product_name}}</a></h4>
                                    <p>Mã sản phẩm ID: {{$id}}</p>
                                </td>
                                <td class="cart_price">
                                    <p  style="text-align: right; padding-right: 40px">{{$allProduct->find($id)->product_price}}</p>
                                </td>
                                <td class="cart_quantity">
                                    <input class="cart_quantity_input" type="number" name="quantity" style="width: 60px" value="{{$quantity}}">
{{--                                    <div class="cart_quantity_button" style="width: 10px">--}}
{{--                                        --}}
{{--                                    </div>--}}
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price" style="text-align: right; padding-right: 40px">{{$quantity * $allProduct->find($id)->product_price}}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{URL::to('shop/cart/delete-product/'.$id)}}"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
            <div style="text-align: right"><a class="btn btn-default check_out" href="{{URL::to('shop/cart')}}" id="capnhatlaigiohang"> > Cập nhật lại giỏ hàng</a></div>
        </div>
    </section>
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Chính sách giao nhận hàng từ Teedall</h3>
                <p>Quý khách vui lòng đọc kỹ phía dưới!</p>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="chose_area">
                        <p style="padding-left: 20px">+ Sau khi quý khách đặt hàng, sẽ có nhân viên gọi điện để xác nhận đơn hàng. Đơn hàng sẽ bắt đầu chuyển đi khi xác nhận thành công</p>
                        <p style="padding-left: 20px">+ Kiểm tra hàng trước khi nhận. Nếu thấy có dấu hiệu đã tháo gỡ khách hàng có thể không nhận và không trả bất kỳ một khoảng phí nào</p>
                        <p style="padding-left: 20px">+ Sản phẩm được bảo hành 1 đổi 1 trong vòng 10 ngày. Trong thời gian đó quý khách có thể đổi mới sp nếu sử dụng sản phẩm gặp vấn đề</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng giỏ hàng <span>$59</span></li>
                            <li>Thuế (5%) <span>$2</span></li>
                            <li>Phí chuyển hàng <span>Free</span></li>
                            <li>Tổng cộng <span style="font-weight: bolder">$61</span></li>
                        </ul>
                        <a class="btn btn-default update" href="">Mua tiếp</a>
                        <a class="btn btn-default check_out" href="">Tiến hành thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

