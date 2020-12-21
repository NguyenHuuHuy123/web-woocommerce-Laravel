@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            THÊM THƯƠNG HIỆU SẢN PHẨM
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
                <form role="form" action="{{URL::to('/admin/save-brand-product')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Nhập tên thương hiệu" name="brand_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                                  placeholder="Nhập mô tả" name="brand_desc"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Danh mục sản phẩm</label>
                        <select class="form-control input-sm m-bot15" name="category_id">
                            @foreach( $all_category_product as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Trạng thái</label>
                        <select class="form-control input-sm m-bot15" name="brand_status">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                </form>
            </div>

        </div>
    </section>
@endsection
