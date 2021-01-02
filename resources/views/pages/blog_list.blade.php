@extends('layout')
@extends('pages/sidebar')
@section('content')
    <div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">BÀI VIẾT MỚI NHẤT</h2>
            @foreach($allPost as $post_item)
                <div class="single-blog-post">
                    <h3>{{$post_item->title}}</h3>
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-clock-o"></i>{{$post_item->created_at}}</li>
                        </ul>
                        <span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
                    </div>
                    <a href="{{('blog/'.$post_item->id)}}">
                        <img src="{{URL::to($post_item->image)}}" alt="">
                    </a>
                    <div style="display:block;text-overflow: Ellipsis;height: 100px;overflow: hidden; white-space: nowrap;" >
                        <p>{!!$post_item->content !!}</p>
                    </div>
                    <a class="btn btn-primary" href="{{('blog/'.$post_item->id)}}">Đọc thêm</a>
                </div>
            @endforeach
            <div class="pagination-area">
                <ul class="pagination">
                    <li><a href="" class="active">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection
