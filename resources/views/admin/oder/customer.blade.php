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
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Xem/sửa</th>
                            <th>Lịch sử mua hàng</th>
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
                                         Sửa
                                     </a>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">
                                    <a href='{{URL::to('/admin/view-oder/'.$item_customer->id)}}'>
                                         Chi tiết
                                     </a>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">
                                       <a href="{{URL::to('/admin/delete-customer/'.$item_customer->id)}}"
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


