@extends('layout')
@extends('pages/sidebar')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{URL::to($detailProduct->product_image)}}" alt="">
                    <h3>ZOOM</h3>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{$detailProduct->product_name}}</h2>
                    <p>Mã sản phẩm ID: {{$detailProduct->id}}</p>
                    <span>
                    <form action="" id="form-cart" name="form-cart">
                        <span>{{$detailProduct->product_price}} vnd</span>
                        <div>Số lượng:</div>
                        <input type="number" value="1" min="1" max="10" id="value-quatity">
                        <button type="button" class="btn btn-fefault cart btn-submit-bill"
                                data-idProduct="{{$detailProduct->id}}">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ
                        </button>
                    </form>
                </span>
                    <p><b>Danh mục:</b> {{$detailProduct->getCategory->category_name}}</p>
                    <p><b>Thương hiệu:</b> {{$detailProduct->getBrand->brand_name}}</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class=""><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
                    <li class=""><a href="#companyprofile" data-toggle="tab">Thương hiệu</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details">
                    <div class="col-sm-12">
                        <p>{{$detailProduct->product_desc}}</p>
                    </div>
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    <div class="col-sm-12">
                        <p>{{$detailProduct->getBrand->brand_desc}}</p>
                    </div>
                </div>

                <div class="tab-pane fade active in" id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris
                            nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <p><b>Nhập nhận xét của bạn</b></p>

                        <form action="#">
										<span>
											<input type="text" placeholder="Tên của bạn">
											<input type="email" placeholder="Email của bạn">
										</span>
                            <textarea name=""></textarea>
                            <button type="button" class="btn btn-default pull-right">
                                Gửi nhận xét
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Sản phẩm đề xuất</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($allProduct->skip(0)->take(3) as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a class="img-product-features"
                                               href="{{URL::to('/shop/san-pham/'.$product->id)}}">
                                                <img src="{{URL::to($product->product_image)}}" alt="">
                                            </a>
                                            <h2>{{$product->product_price}} vnđ</h2>
                                            <p>{{$product->product_name}}</p>
                                            <button type="button" class="btn btn-default add-to-cart"
                                                    data-idProduct="{{$product->id}}"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="item">
                        @foreach($allProduct->skip(4)->take(3) as $product)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a class="img-product-features"
                                               href="{{URL::to('/shop/san-pham/'.$product->id)}}">
                                                <img src="{{URL::to($product->product_image)}}" alt="">
                                            </a>
                                            <h2>{{$product->product_price}} vnđ</h2>
                                            <p>{{$product->product_name}}</p>
                                            <button type="button" class="btn btn-default add-to-cart"
                                                    data-idProduct="{{$product->id}}"
                                                    data-quantityProduct="{{$product->id}}"><i
                                                    class="fa fa-shopping-cart"></i> Thêm vào giỏ
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->
    </div>
@endsection
