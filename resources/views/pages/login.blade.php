@extends('layout')
@extends('pages/nosidebar')
@section('content')
    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="login-form"><!--login form-->
                        <h2>Đăng nhập</h2>
                        <?php
                        $mess = Session::get("message");
                        if($mess){
                            echo "<span style='color: #FE980F; text-align: left; display:block'>" . $mess ."</span>";
                            Session::put("message", null);
                        }
                        ?>
                        <form action="{{URL::to('customer/check-account-customer')}}" method="post">
                            @csrf
                            <input type="email" placeholder="Nhập email của bạn" name="email">
                            <input type="password" placeholder="Nhập mật khẩu" name="password">
                            <button type="submit" class="btn btn-default">Gửi</button>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
        </div>
    </section>
@endsection

