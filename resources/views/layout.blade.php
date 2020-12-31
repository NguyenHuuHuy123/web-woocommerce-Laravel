<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | T-Teedall</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    {{--    <link href="{{('public/frontend/css/font-awesome.css')}}" rel="stylesheet">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
    <script src="{{asset('public/frontend/js/html5shiv.js')}}"></script>
    <script src="{{asset('public/frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{('public/frontend/img/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precom
    posed" sizes="144x144" href="{{('public/frontend/img/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
          href="{{('public/frontend/img/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
          href="{{('public/frontend/img/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/img/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +84 3438 63 483</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> huuhuyhuuhuy1999@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{URL::to('/trang-chu')}}"><img width="100px" src="{{('public/frontend/img/home/logo-teedall.png')}}" alt=""/></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{URL::to('customer/account')}}"><i class="fa fa-user"></i> Tài khoản</a></li>
                            @if(Session::get("accountCustomer"))
                                <li><a href="{{URL::to('shop/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                            @endif
                            <li>
                                <a href="{{URL::to('shop/cart')}}">
                                    <i class="fa fa-shopping-cart"></i>
                                    Giỏ hàng
                                    <span class="badge badge-pill badge-danger soSanPhamTrongGioHang"
                                          style="background-color: #FE980F">
                                        <?php
                                        $giohang = Session::get("cart");
                                        if (count($giohang)>0){
                                            echo count($giohang);
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </span>
                                </a>
                            </li>

                            <li>
                                @if(Session::get("accountCustomer"))
                                    <div class="accountAndLogout">
                                        <span style="color: #696763"><i class="fa fa-lock" style="margin-right: 5px"></i>{{$allCustomer->find(Session::get("accountCustomer"))->name}}</span>
                                        <ul class="accountAndLogout_item">
                                            <li>
                                                <a href="{{URL::to('customer/account')}}">
                                                    Tài khoản
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{URL::to('customer/logout')}}">
                                                    Đăng xuất
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{URL::to('customer/login')}}"><i class="fa fa-lock"></i>
                                        Đăng nhập
                                    </a>
                                @endif

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{URL::to('/trang-chu')}}" class="active">Trang chủ</a></li>
                            <li class="dropdown"><a href="#">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    @foreach( $allCategory as $category_item)
                                        <li>
                                            <a href="{{URL::to('shop/danh-muc/'.$category_item->id)}}">{{$category_item->category_name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class=""><a href="#">Tin tức</a>
{{--                                <ul role="menu" class="sub-menu">--}}
{{--                                    <li><a href="blog.html">Blog List</a></li>--}}
{{--                                    <li><a href="blog-single.html">Blog Single</a></li>--}}
{{--                                </ul>--}}
                            </li>
                            <li><a href="{{URL::to('shop/cart')}}">Giỏ hàng
                                    <span class="badge badge-pill badge-danger soSanPhamTrongGioHang"
                                          style="background-color: #FE980F">
                                        <?php
                                        $giohang = Session::get("cart");
                                        if (count($giohang)>0){
                                            echo count($giohang);
                                        } else {
                                            echo 0;
                                        }
                                        ?>
                                    </span>
                                </a>
                            </li>
                            <li><a href="#">Liên lạc</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <input type="text" placeholder="Tìm kiếm"/>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

@yield("slide")
@yield("body")


<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2><span>T</span>-TEEDALL</h2>
                        <p>Cửa hàng bán lẻ thiết bị công nghệ uy tín nhất Việt Nam</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>DỊCH VỤ</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Tư vấn sửa chữa</a></li>
                            <li><a href="#">Phân đối sản phẩm</a></li>
                            <li><a href="#">Cộng tác bán hàng</a></li>
                            <li><a href="#">Quảng cáo sản phẩm</a></li>
                            <li><a href="#">Cộng tác sản phẩm</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>SẢN PHẨM</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Máy tính</a></li>
                            <li><a href="#">Điện thoại</a></li>
                            <li><a href="#">Phụ kiện điện thoại</a></li>
                            <li><a href="#">Phụ kiện máy tính</a></li>
                            <li><a href="#">Khác</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>CHÍNH SÁCH</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Chính sách hoàn trả</a></li>
                            <li><a href="#">Chính sách bảo hành</a></li>
                            <li><a href="#">Chính sách cộng tác</a></li>
                            <li><a href="#">Chính sách ưu đãi</a></li>
                            <li><a href="#">Chính sách khác</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>BÀI VIẾT</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">5 Cách khắc phục lỗi điện thoại bị tự động tắt nguồn</a></li>
                            <li><a href="#">Hướng dẫn bảo quản camera điện thoại</a></li>
                            <li><a href="#">Bảo mật thông tin khi sử dụng mạng xã hội</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Nhận tin</h2>
                        <form action="#" class="searchform">
                            <input type="email" placeholder="Nhập email của bạn"/>
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                            <p>Theo dõi thông tin khuyến mãi <br/>của chúng tôi tại email.</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2020.</p>
                <p class="pull-right">Bản quyền thuộc về <span><a target="_blank"
                                                                  href="https://www.facebook.com/HuyIt">Nguyễn Hữu Huy</a></span>
                </p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Thêm sản phẩm thành công!</strong>
    Vào giỏ để xem sản phẩm!
</div> <!-- Thong bao them san pham vao gio hang thanh cong -->

<script src="{{asset('public/frontend/js/jquery.js')}}"></script>
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('public/frontend/js/price-range.js')}}"></script>
<script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.add-to-cart').click(function () {
            var idProduct = $(this).attr('data-idProduct');
            var quatity = 1;
            var url = 'http://localhost/shopbanhanglaravel/ajax/shoppingcard';
            var data = {
                'idProduct': idProduct,
                'quatity': quatity
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post(
                url,
                data,
                function (result) {
                    if (result) {
                        $("#success-alert").fadeTo(500, 1).slideUp(2000, function () {
                            $("#success-alert").slideUp(5000);
                        });
                        $(".soSanPhamTrongGioHang").html(result);
                    }
                },
                'text'
            );

        });

        $('.btn-submit-bill').click(function () {
            var idProduct = $(this).attr('data-idProduct');
            var quatity = $('#value-quatity').val();
            var url = 'http://localhost/shopbanhanglaravel/ajax/shoppingcard';
            var data = {
                'idProduct': idProduct,
                'quatity': quatity
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post(
                url,
                data,
                function (result) {
                    if (result) {
                        $("#success-alert").fadeTo(500, 1).slideUp(2000, function () {
                            $("#success-alert").slideUp(5000);
                        });
                        $(".soSanPhamTrongGioHang").html(result);
                    }
                },
                'text'
            );
        })


        $("#capnhatlaigiohang").click(function () {
            var arrProduct = {};
            for (var i = 0; i < $(".chiTietTungSanPham").length; i++) {
                var elementProduct = $(".chiTietTungSanPham")[i];
                var idProduct = elementProduct.dataset.idproduct;
                var quatity = $(".chiTietTungSanPham td input")[i].value;
                arrProduct[i] = {"idProduct": idProduct, 'quatity': quatity}
                // arrProduct.push();
            }
            console.log(arrProduct);
            var url = 'http://localhost/shopbanhanglaravel/ajax/updateshoppingcard';
            var dataJson = JSON.stringify(arrProduct);
            var data = {"giohang": dataJson};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post(
                url,
                data,
                function (result) {
                    console.log(result);
                    location.reload();
                },
                'text'
            );
        });

        $("#tienhanhthanhtoan").click(function () {
            var arrProduct = {};
            for (var i = 0; i < $(".chiTietTungSanPham").length; i++) {
                var elementProduct = $(".chiTietTungSanPham")[i];
                var idProduct = elementProduct.dataset.idproduct;
                var quatity = $(".chiTietTungSanPham td input")[i].value;
                arrProduct[i] = {"idProduct": idProduct, 'quatity': quatity}
                // arrProduct.push();
            }
            console.log(arrProduct);
            var url = 'http://localhost/shopbanhanglaravel/ajax/updateshoppingcard';
            var dataJson = JSON.stringify(arrProduct);
            var data = {"giohang": dataJson};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post(
                url,
                data,
                function (result) {
                    console.log(result)
                },
                'text'
            );
        });

    });

</script>
</body>
</html>
