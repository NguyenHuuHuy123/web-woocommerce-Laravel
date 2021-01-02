@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    TẤT CẢ BÀI VIẾT
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Chỉnh sửa</option>
                            <option value="1">Xóa</option>
                            <option value="2">Ẩn sản phẩm</option>
                            <option value="3">Hiện sản phẩm</option>
                        </select>
                        <button class="btn btn-sm btn-default">Apply</button>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Tìm kiếm</button>
          </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <?php
                    $mess = Session::get("message");
                    if ($mess) {
                        echo '<div class="alert alert-success" role="alert">'.$mess.'</div>';
                        Session::put("message", null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Stt</th>
                            <th>Hình ảnh</th>
                            <th>Tên bài viết</th>
                            <th>Trạng thái</th>
                            <th>Ngày xuất bản</th>
                            <th>Sửa/ Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_post as $key => $item_post)
                            <tr>
                                <td><span class="text-ellipsis">{{ $key + 1 }}</span></td>
                                <td>
                                    <div class="img_product_item">
                                        <img src="{{URL::to($item_post->image)}}" alt="image_product">
                                    </div>
                                </td>
                                <td><span class="text-ellipsis">{{ $item_post->title}}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($item_post->status == 0)
                                            <a href='{{URL::to('/admin/change-status-post/'.$item_post->id.'/'.$item_post->status)}}'><i
                                                    class='status-category-product
                                                status-category-product_up fa fa-thumbs-up'>Công khai</i></a>
                                        @else
                                            <a href='{{URL::to('/admin/change-status-post/'.$item_post->id.'/'.$item_post->status)}}'><i
                                                    class='status-category-product
                                                status-category-product_down fa fa-thumbs-down'>Riêng tư</i></a>
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <span class="text-ellipsis">
                                        {{ $item_post->updated_at}}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        <a href="{{URL::to('/admin/action-post/'.$item_post->id.'/edit')}}"
                                           class="edit-or-delete-category-product">
                                            <i class="fa fa-pencil-square-o text-success" aria-hidden="true"> Edit </i>
                                        </a>
                                        <a href="{{URL::to('/admin/action-post/'.$item_post->id.'/delete')}}"
                                           class="edit-or-delete-category-product confirm-delete">
                                            <i class="fa fa-times text-danger text">Delete</i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
                                <li><a href="">1</a></li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                <li><a href="">4</a></li>
                                <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
    <script>
        var aElementDelete = document.querySelectorAll('.confirm-delete');
        aElementDelete.forEach(function (item) {
            item.addEventListener('click', function(event){
                var result = confirm("Bạn có chắc muốn xóa bài viết này chứ?");
                if (result == false) {
                    event.preventDefault();
                }
            })
        })
    </script>
    <!-- footer -->
@endsection


