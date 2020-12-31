@extends("admin_layout")
@section("content-admin")
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    CHI TIẾT ĐƠN HÀNG SỐ {{$oder->id}} : {{$oder->getCustomer->name}}
                </div>
                <div class="row w3-res-tb">
                    <form class="col-sm-3" action="{{URL::to('/admin/update-status-oder/'.$oder->id)}}">
                        <h4 style="line-height: 30px">Tình trạng đơn hàng</h4>
                        <select class="input-sm form-control w-sm inline v-middle" name="oder_status" style="width: 200px">
                            @foreach($statusAll as $key=>$value)
                                <option value="{{$key+1}}"
                                <?php if($oder->status == $key+1){ echo "selected";} ?>
                                >{{$value->status}}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm btn-update"
                                style="background-color: <?php
                                if($oder->status == 1) echo "#e6b105";
                                if($oder->status == 2) echo "#5cb733";
                                if($oder->status == 3) echo "#4e4e4d";
                                if($oder->status == 4) echo "#5e00bb";
                                if($oder->status == 5) echo "#50ff00";
                                if($oder->status == 6) echo "#ff0000";
                                ?> "
                        >Update</button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá cả</th>
                            <th>Số lượng</th>
                            <th width="200px">Tổng tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $detailOder as $detailOder_item)
                            <tr>
                                <td><span class="text-ellipsis">{{ $detailOder_item->getProduct->product_name }}</span>
                                </td>
                                <td><span
                                        class="text-ellipsis">{{ number_format($detailOder_item->product_price) }}</span>
                                </td>
                                <td><span class="text-ellipsis">{{ $detailOder_item->quantity }}</span></td>
                                <td><span class="text-ellipsis">{{ number_format($detailOder_item->total) }}</span></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><b >TỔNG GIÁ TIỀN</b></td>
                            <td></td>
                            <td></td>
                            <td><b >{{number_format($oder->total_cart)}}</b></td>
                        </tr>
                        <tr>
                            <td><b>THUẾ 5%</b></td>
                            <td></td>
                            <td></td>
                            <td><b >{{number_format($oder->tax)}}</b></td>
                        </tr>
                        <tr>
                            <td><b>CÒN LẠI</b> </td>
                            <td></td>
                            <td></td>
                            <td><b style="color: #ff0000" >{{number_format($oder->total) }} vnd</b></td>
                        </tr>
                        <tr>
                            <td><b>MÔ TẢ ĐƠN HÀNG: </b></td>
                            <td><span >{{$oder->description}}</span></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- footer -->
@endsection


