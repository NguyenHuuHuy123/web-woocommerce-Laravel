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
