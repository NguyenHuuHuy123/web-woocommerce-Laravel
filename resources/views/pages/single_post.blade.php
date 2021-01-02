@extends('layout')
@extends('pages/sidebar')
@section('content')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <div class="single-blog-post">
                <h3>{{$post_item->title}}</h3>
                <div class="post-meta">
                    <ul>
                        <li><i class="fa fa-clock-o"></i> {{$post_item->created_at}}</li>
                        <li><i class="fa fa-calendar"></i> {{$post_item->updated_at}}</li>
                    </ul>
                    <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
                </div>
                <a href="">
                    <img src="{{URL::to($post_item->image)}}" alt="">
                </a>
                {!! $post_item->content !!}
                <div class="pager-area">
                    <ul class="pager pull-right">
                        <li><a href="#">Pre</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div><!--/blog-post-area-->


    </div>
@endsection
