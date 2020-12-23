@extends('layout')
@section('slide')
{{--    <div class="col-sm-9 padding-right">--}}
        <section id="slider"><!--slider-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#slider-carousel" data-slide-to="1"></li>
                                <li data-target="#slider-carousel" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free E-Commerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{('public/frontend/img/home/girl1.jpg')}}"
                                             class="girl img-responsive"
                                             alt=""/>
                                        <img src="{{('public/frontend/img/home/pricing.png')}}" class="pricing" alt=""/>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>100% Responsive Design</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{('public/frontend/img/home/girl2.jpg')}}"
                                             class="girl img-responsive"
                                             alt=""/>
                                        <img src="{{('public/frontend/img/home/pricing.png')}}" class="pricing" alt=""/>
                                    </div>
                                </div>

                                <div class="item">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>Free Ecommerce Template</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor
                                            incididunt ut labore et dolore magna aliqua. </p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{('public/frontend/img/home/girl3.jpg')}}"
                                             class="girl img-responsive"
                                             alt=""/>
                                        <img src="{{('public/frontend/img/home/pricing.png')}}" class="pricing" alt=""/>
                                    </div>
                                </div>

                            </div>

                            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section><!--/slider-->
{{--    </div>--}}
@endsection


@extends('pages/sidebar')
@section('content')
    <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">SẢN PHẨM NỔI BẬT</h2>
            @foreach($allProduct->take(6) as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a class="img-product-features" href="{{URL::to('/shop/san-pham/'.$product->id)}}">
                                    <img src="{{URL::to($product->product_image)}}" alt=""/>
                                </a>
                                <h2>{{$product->product_price}} vnđ</h2>
                                <p>{{$product->product_name}}</p>
                                <button class="btn btn-default add-to-cart" data-idProduct="{{$product->id}}"><i
                                        class="fa fa-shopping-cart"></i>Thêm vào
                                    giỏ
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--features_items-->
        <div class="category-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    @foreach($allCategory as $key=> $category)
                        <li <?php if ($key == 0) {
                            echo 'class="active"';
                        } ?> ><a href="#{{"id-category-".$category->id}}"
                                 data-toggle="tab">{{$category->category_name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="tab-content">
                @foreach($allCategory as $key=> $category)
                    <div class="tab-pane fade <?php if ($key == 0) {
                        echo "active";
                    } ?> in" id="{{"id-category-".$category->id}}">
                        @foreach($category->getProduct->take(4) as $product_item)
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a class="img-product-features"
                                               href="{{URL::to('/shop/san-pham/'.$product_item->id)}}">
                                                <img src="{{URL::to($product_item->product_image)}}" alt=""/>
                                            </a>
                                            <h2>{{$product_item->product_price}} vnđ</h2>
                                            <p>{{$product_item->product_name}}</p>
                                            <button class="btn btn-default add-to-cart"
                                                    data-idProduct="{{$product_item->id}}"><i
                                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>
        </div><!--/category-tab-->
    </div>
@endsection
