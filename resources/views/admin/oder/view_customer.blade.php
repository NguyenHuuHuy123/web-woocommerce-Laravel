@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            THÔNG TIN KHÁCH HÀNG
        </header>
        <?php
        $mess = Session::get("message");
        if ($mess) {
            echo "<span style='color: #209820; text-align: center; display:block'>" . $mess . "</span>";
            Session::put("message", null);
        }
        ?>
        <div class="panel-body">
            <div class="position-center">
                <style>
                    .info-customer{
                        width: 100%;
                    }
                    .info-customer tr td,th{
                        border: 1px solid #dddddd !important;
                        text-align: left;
                        padding: 10px;
                    }
                </style>
                <table class="info-customer">
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>{{$detailCustomer->name}}</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Số điện thoại</td>
                        <td>{{$detailCustomer->phone}}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Địa chỉ</td>
                        <td> {{$detailCustomer->address}}</td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>Gmail</td>
                        <td> {{$detailCustomer->gmail}}</td>
                    </tr>
                </table>
                <a href="{{URL::to('/admin/view-detail-oder/'.$detailCustomer->getOder->first()->id)}}" class="btn btn-primary" style="margin-top: 10px ">Xem đơn hàng</a>
            </div>
        </div>
    </section>
@endsection
