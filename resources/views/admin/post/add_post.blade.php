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
                <form role="form" action="{{URL::to('/admin/save-post')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title-post-name">Tiêu đề bài viết</label>
                        <input type="text" class="form-control" id="title-post-name"
                               placeholder="Nhập tên danh mục" name="name_post">
                        @if($errors->has('name_post'))
                            <span
                                style='color: red; display:block'>{{$errors->first('name_post')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content_post">Nội dung bài viết</label>
                        <textarea rows="20" type="text" class="form-control" id="content_post"
                                  placeholder="Nội dung bài viết" name="content_post"></textarea>
                        @if($errors->has('content_post'))
                            <span
                                style='color: red; display:block'>{{$errors->first('content_post')}}</span>
                        @endif
                    </div>
                    <div class="form-group" style="width: 49%; display: inline-block">
                        <label for="file-avatar-post">Hình ảnh bài viết (.jpg/ .png)</label>
                        <input type="file" class="form-control" id="file-avatar-post"
                               placeholder="Nhập tên danh mục" name="img_post">
                    </div>
                    <div class="form-group" style="width: 49%; display: inline-block">
                        <label for="id_post_status">Trạng thái</label>
                        <select class="form-control input-sm m-bot15" name="post_status" id="id_post_status">
                            <option value="0">Công khai</option>
                            <option value="1">Riêng tư</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Lưu bài viết</button>
                    <a class="btn btn-info" href="#">Hủy bỏ</a>
                </form>
            </div>

        </div>
    </section>
@endsection
