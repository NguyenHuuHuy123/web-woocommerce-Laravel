@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất cả thương hiệu
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Chỉnh sửa</option>
                            <option value="1">Xóa</option>
                            <option value="2">Ẩn thương hiệu</option>
                            <option value="3">Hiện thương hiệu</option>
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
                    $message = Session::get("message_update");
                    if ($message) {
                        echo "<span style='color: #209820; text-align: center; display:block'>" . $message . "</span>";
                        Session::put("message_update", null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th style="width:20px;">
                                <label class="i-checks m-b-none">
                                    <input type="checkbox"><i></i>
                                </label>
                            </th>
                            <th>Tên thương hiệu</th>
                            <th>Mô tả ngắn</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th style="width:150px;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_brand_product as $key => $item_brand)
                            <tr>
                                <td><label class="i-checks m-b-none">
                                        <input type="checkbox" name="post[]"><i></i></label></td>
                                <td> {{ $item_brand->brand_name }}</td>
                                <td><span class="text-ellipsis">{{ $item_brand->brand_desc }}</span></td>
                                <td>
                                    <span class="text-ellipsis">{{$item_brand->getCategory->category_name}}</span>
                                </td>
                                <td><span class="text-ellipsis">

                                        @if ($item_brand->brand_status == 0)
                                            <a href='{{URL::to('/admin/change-status-brand-product/'.$item_brand->id.'/'.$item_brand->brand_status)}}'><i
                                                    class='status-category-product
                                                status-category-product_up fa fa-thumbs-up'>Hiển thị</i></a>
                                        @else
                                            <a href='{{URL::to('/admin/change-status-brand-product/'.$item_brand->id.'/'.$item_brand->brand_status)}}'><i
                                                    class='status-category-product
                                                status-category-product_down fa fa-thumbs-down'>Ẩn</i></a>
                                        @endif

                                    </span></td>
                                <td>
                                    <span>
                                        <a href="{{URL::to('/admin/action-brand-product/'.$item_brand->id.'/edit')}}"
                                           class="edit-or-delete-category-product">
                                            <i class="fa fa-check text-success text-active"> Edit </i>
                                        </a>
                                        <a href="{{URL::to('/admin/action-brand-product/'.$item_brand->id.'/delete')}}"
                                           class="edit-or-delete-category-product">
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
    <!-- footer -->
@endsection


