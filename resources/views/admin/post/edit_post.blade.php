@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            THÊM BÀI VIẾT MỚI
        </header>
        <div class="panel-body">
            <div class="position-center">
                <?php
                $mess = Session::get("message");
                if ($mess) {
                    echo '<div class="alert alert-success" role="alert">'.$mess.'</div>';
                    Session::put("message", null);
                }
                ?>
                <form role="form" action="{{URL::to('/admin/edit-post/'.$post->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title-post-name">Tiêu đề bài viết</label>
                        <input type="text" class="form-control" id="title-post-name"
                               placeholder="Nhập tên danh mục" name="name_post" value="{{$post->title}}">
                        @if($errors->has('name_post'))
                            <span
                                style='color: red; display:block'>{{$errors->first('name_post')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content_post">Nội dung bài viết</label>
                        <textarea rows="20" type="text" class="form-control" id="content_post"
                                  placeholder="Nội dung bài viết" name="content_post"> {!!$post->content !!}</textarea>
                        @if($errors->has('content_post'))
                            <span
                                style='color: red; display:block'>{{$errors->first('content_post')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="file-avatar-post">Hình ảnh bài viết (.jpg/ .png)</label>
                        <input type="file" class="form-control" id="file-avatar-post"
                               placeholder="Nhập tên danh mục" name="img_post">
                        <img src="{{URL::to($post->image)}}" alt="hinh-anh-bai-viet" width="200px">
                    </div>
                    <button type="submit" class="btn btn-info">Lưu bài viết</button>
                    <a class="btn btn-info" href="#">Hủy bỏ</a>
                </form>
            </div>
        </div>
    </section>
@endsection
