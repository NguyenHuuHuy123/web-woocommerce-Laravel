@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH SÁCH KHÁCH HÀNG
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <select class="input-sm form-control w-sm inline v-middle">
                            <option value="0">Chỉnh sửa</option>
                            <option value="1">Xóa</option>
                            <option value="2">Ẩn</option>
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
                    echo "<span style='color: #209820; text-align: center; display:block'>" . $mess . "</span>";
                    Session::put("message", null);
                    }
                    ?>
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Thông tin</th>
                            <th>Đơn hàng</th>
                            <th>Xóa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_customer as $key => $item_customer)
                            <tr>
                                <td><span class="text-ellipsis">{{ $item_customer->name}}</span></td>
                                <td><span class="text-ellipsis">{{ $item_customer->phone}}</span></td>
                                <td>
                                    <span class="text-ellipsis">
                                     <a href='{{URL::to('/admin/edit-info-customer/'.$item_customer->id)}}'>
                                         <i class="fa fa-eye" aria-hidden="true"></i> Chi tiết
                                     </a>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">
                                    <a href='{{URL::to('/admin/view-detail-oder/'.$item_customer->getOder->first()->id)}}'>
                                         <i class="fa fa-cart-plus" aria-hidden="true"> Chi tiết </i>
                                     </a>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">
                                       <a href="{{URL::to('/admin/delete-customer/'.$item_customer->id)}}"
                                          class="edit-or-delete-category-product confirm-delete">
                                           <i class="fa fa-trash text-danger text" aria-hidden="true"> Delete </i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <script>
                            var aElementDelete = document.querySelectorAll('.confirm-delete');
                            aElementDelete.forEach(function (item) {
                                item.addEventListener('click', function(event){
                                    var result = confirm("Nếu bạn xóa khách hàng này, đồng nghĩa tất cả thông tin liên qua đến người đó đều mất. Bạn chắc chứ?");
                                    if (result == false) {
                                        event.preventDefault();
                                    }
                                })
                            })
                        </script>
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


