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
        @if(Session::get('accountCustomer'))

            <!--            Kết thúc gƯớng dẫn đăng ký-->
                {{--            Bắt dầu điền thông tin và tạo tài khoản--}}
                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="shopper-info">
                                <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Thông tin người mua hàng</span></span>
                                </p>
                                <form action="{{URL::to("#")}}" method="post"
                                      name="data_customer">
                                    @csrf
                                    <input class="data_customer" type="text" placeholder="Tên khách hàng"
                                           name="customer_name" value="{{$accountDetailCustomer->name}}">
                                    @if($errors->has('customer_name'))
                                    <span
                                        style='color: #fe720f; '>{{$errors->first('customer_name')}}</span>
                                    @endif
                                    <input class="data_customer" type="number" placeholder="Số điện thoại"
                                           name="customer_phone" min="0" max="9999999999"
                                           value="{{$accountDetailCustomer->phone}}">
                                    @if($errors->has('customer_phone'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_phone')}}</span>
                                    @endif
                                    <input class="data_customer" type="text" placeholder="Địa chỉ"
                                           name="customer_address" value="{{$accountDetailCustomer->address}}">
                                    @if($errors->has('customer_address'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_address')}}</span>
                                    @endif
                                    <input class="data_customer" type="email" placeholder="Email" disabled
                                           name="customer_email" value="{{$accountDetailCustomer->gmail}}">
                                    @if($errors->has('customer_email'))
                                        <span
                                            style='color: #fe720f; '>{{$errors->first('customer_email')}}</span>
                                    @endif
                                    <input class="data_customer" type="password" placeholder="Nhập mật khẩu mới"
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

                                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px">
                                        <span>Lưu thay đổi</span>
                                    </button>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="register-req">
                    <p><span style="vertical-align: inherit;"><span style="vertical-align: inherit;">Bạn chưa đăng ký tài khoản.</span></span>
                    </p>
                </div>
                <!--            HƯớng dẫn đăng ký-->

            @endif
        </div>
    </section>
@endsection

