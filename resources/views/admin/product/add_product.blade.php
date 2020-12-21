@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            THÊM SẢN PHẨM MỚI
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
                <form role="form" action="{{URL::to('/admin/save-product')}}" method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               placeholder="Nhập tên sản phẩm" name="product_name">
                        @if($errors->has('product_name'))
                            <span
                                style='color: red; text-align: center; display:block'>{{$errors->first('product_name')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Giá sản phẩm</label>
                        <input type="number" class="form-control" id="exampleInputPassword1"
                               placeholder="Giá sản phẩm" name="product_price">
                        @if($errors->has('product_price'))
                            <span
                                style='color: red; text-align: center; display:block'>{{$errors->first('product_price')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Danh mục sản phẩm</label>
                        <select class="form-control input-sm m-bot15" name="category_id" id="categoryProduct">
                            @foreach($allCategory as $key => $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                        <select class="form-control input-sm m-bot15" name="brand_id"  id="brandProduct">
{{--                            @foreach($allBrand as $key => $brand)--}}
{{--                                <option value="{{$brand->id}}">{{$brand->brand_name}}</option>--}}
{{--                            @endforeach--}}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Trạng thái</label>
                        <select class="form-control input-sm m-bot15" name="product_status">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                        <input type="file" class="form-control" id="exampleInputPassword1"
                               name="product_image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                                  placeholder="Nhập mô tả" name="product_desc"></textarea>
                        @if($errors->has('product_desc'))
                            <span
                                style='color: red; text-align: center; display:block'>{{$errors->first('product_desc')}}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                </form>
            </div>
            <script>
                $(document).ready(function(){
                    var idCategory = $('#categoryProduct').val();
                    $.get("http://localhost/shopbanhanglaravel/ajax/category/"+idCategory, function(data){
                        $("#brandProduct").html(data);
                        // alert(data);
                    })
                    $('#categoryProduct').change(function(){
                        var idCategory = $(this).val();
                        $.get("http://localhost/shopbanhanglaravel/ajax/category/"+idCategory, function(data){
                            $("#brandProduct").html(data);
                            // alert(data);
                        })
                    })
                })
            </script>
        </div>
    </section>
@endsection
