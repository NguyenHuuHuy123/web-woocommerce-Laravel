@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DANH SÁCH CÁC ĐƠN HÀNG
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Khách hàng</th>
                            <th>Chi tiết đơn hàng</th>
                            <th>Tổng cộng</th>
                            <th>Trạng thái</th>
                            <th>Ngày đặt hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $all_oder as $key => $item_oder)
                            <tr>
                                <td><span class="text-ellipsis">{{ $item_oder->id}} </span></td>
                                <td><span class="text-ellipsis">{{ $item_oder->getCustomer->name}}</span></td>
                                <td><span class="text-ellipsis">
                                        <a href='{{URL::to('/admin/view-detail-oder/'.$item_oder->id)}}'>
                                         Xem
                                     </a>
                                    </span></td>
                                <td><span class="text-ellipsis">{{ number_format($item_oder->total) }}</span></td>
                                <td><span class="text-ellipsis">
                                        <form style="width: 200px; display: flex" action="{{URL::to('/admin/update-status-oder/'.$item_oder->id)}}">
                                             <select class="form-control input-sm m-bot15" name="oder_status">
                                                 @foreach($statusAll as $key=>$value)
                                                     <option value="{{$key+1}}"
                                                     <?php if ($item_oder->status == $key + 1) {
                                                         echo "selected";
                                                     } ?>
                                                     >{{$value->status}}</option>
                                                 @endforeach
                                            </select>
                                            <button class="btn btn-primary btn-sm btn-update"
                                                    style="background-color: <?php
                                                    if ($item_oder->status == 1) echo "#e6b105";
                                                    if ($item_oder->status == 2) echo "#5cb733";
                                                    if ($item_oder->status == 3) echo "#4e4e4d";
                                                    if ($item_oder->status == 4) echo "#5e00bb";
                                                    if ($item_oder->status == 5) echo "#50ff00";
                                                    if ($item_oder->status == 6) echo "#ff0000";
                                                    ?> "
                                                    type="submit">Update</button>
                                        </form>
                                    </span>
                                </td>
                                <td><span class="text-ellipsis">{{ $item_oder->created_at}}</span></td>
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


