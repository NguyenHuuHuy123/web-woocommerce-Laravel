@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất cả sản phẩm
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
                    $message = Session::get("message_update");
                    if ($message) {
                        echo "<span style='color: #209820; text-align: center; display:block'>" . $message . "</span>";
                        Session::put("message_update", null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Giá sản phẩm</th>
                            <th style="width:150px;">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_product as $key => $item_product)
                            <tr>
                                <td>
                                    <div class="img_product_item">
                                        <img src="{{URL::to($item_product->product_image)}}" alt="image_product">
                                    </div>
                                </td>
                                <td><span class="text-ellipsis">{{ $item_product->product_name}}</span></td>
                                <td><span class="text-ellipsis">{{ $item_product->getCategory->category_name}}</span></td>
                                <td><span class="text-ellipsis">{{ $item_product->getBrand->brand_name}}</span></td>
                                <td><span class="text-ellipsis">
                                        @if ($item_product->product_status == 0)
                                            <a href='{{URL::to('/admin/change-status-product/'.$item_product->id.'/'.$item_product->product_status)}}'><i
                                                    class='status-category-product
                                                status-category-product_up fa fa-thumbs-up'>Hiển thị</i></a>
                                        @else
                                            <a href='{{URL::to('/admin/change-status-product/'.$item_product->id.'/'.$item_product->product_status)}}'><i
                                                    class='status-category-product
                                                status-category-product_down fa fa-thumbs-down'>Ẩn</i></a>
                                        @endif

                                    </span>
                                </td>
                                <td><span class="text-ellipsis">{{ $item_product->product_price}} vnđ</span></td>
                                <td>
                                    <span>
                                        <a href="{{URL::to('/admin/action-product/'.$item_product->id.'/edit')}}"
                                           class="edit-or-delete-category-product">
                                            <i class="fa fa-check text-success text-active"> Edit </i>
                                        </a>
                                        <a href="{{URL::to('/admin/action-product/'.$item_product->id.'/delete')}}"
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


