@section('body')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>DANH MỤC SẢN PHẨM</h2>
                <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                    @foreach( $allCategory as $category_item)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="{{URL::to('shop/danh-muc/'.$category_item->id)}}">
                                        {{$category_item->category_name}}
                                    </a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div><!--/category-products-->

                <div class="brands_products"><!--brands_products-->
                    <h2>THƯƠNG HIỆU</h2>
                    <div class="brands-name">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach( $allBrand as $brand_item)
                                <li><a href="{{URL::to('shop/thuong-hieu/'.$brand_item->id)}}"> <span
                                            class="pull-right">({{count($brand_item->getProduct)}})</span>{{$brand_item->brand_name}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div><!--/brands_products-->

                <div class="price-range"><!--price-range-->
                    <h2>Price Range</h2>
                    <div class="well text-center">
                        <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                               data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br/>
                        <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                    </div>
                </div><!--/price-range-->

                <div class="shipping text-center"><!--shipping-->
                    <img src="{{('public/frontend/img/home/shipping.jpg')}}" alt=""/>
                </div><!--/shipping-->

            </div>
        </div>
        {{--            Vi tri chua noi dung content --}}
        @yield("content")
    </div>
</div>
@endsection
