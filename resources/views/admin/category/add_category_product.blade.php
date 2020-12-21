@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            THÊM DANH MỤC SẢN PHẨM
        </header>
        <?php
            $mess = Session::get("message");
            if($mess){
                echo "<span style='color: #209820; text-align: center; display:block'>" . $mess ."</span>";
                Session::put("message", null);
            }
        ?>
        <div class="panel-body">
            <div class="position-center">
                <form role="form" action="{{URL::to('/admin/save-category-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Nhập tên danh mục" name="category_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                                  placeholder="Nhập mô tả" name="category_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Trạng thái</label>
                        <select class="form-control input-sm m-bot15" name="category_status">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Thêm danh mục</button>
                </form>
            </div>

        </div>
    </section>
@endsection
