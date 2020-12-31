@extends('layout')
@section('slide')
    <section id="advertisement">
        <div class="container">
            <img src="{{URL::to('/public/frontend/img/shop/advertisement.jpg')}}">
        </div>
    </section>
@endsection

@extends('pages/sidebar')
@section('content')
{{--    <div class="col-sm-9 padding-right">--}}
        <div class="features_items"><!--features_items-->
            <h2 class="title text-center">{{$titleProduct}}</h2>
            @foreach($filterProduct as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a class="img-product-features" href="{{URL::to('/shop/san-pham/'.$product->id)}}">
                                    <img src="{{URL::to($product->product_image)}}" alt=""/>
                                </a>
                                <h2>{{number_format($product->product_price)}}</h2>
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
{{--    </div>--}}
@endsection
