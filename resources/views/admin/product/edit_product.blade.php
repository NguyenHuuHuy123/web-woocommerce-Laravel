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
                @foreach($product_item as $product)
                    <form role="form" action="{{URL::to('/admin/edit-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Nhập tên sản phẩm" name="product_name"
                                   value="{{ $product->product_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Giá sản phẩm</label>
                            <input type="number" class="form-control" id="exampleInputPassword1"
                                   placeholder="Giá sản phẩm" name="product_price"
                                   value="{{ $product->product_price }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Danh mục sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="category_id">

                                @foreach($all_category as $category)
                                    @if($product->category_id == $category->id)
                                        <option value="{{$category->id}}"
                                                selected>{{$category->category_name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Thương hiệu sản phẩm</label>
                            <select class="form-control input-sm m-bot15" name="brand_id">
                                @foreach($all_brand as $brand)
                                    @if($product->brand_id == $brand->id)
                                        <option value="{{$brand->id}}"
                                                selected>{{$brand->brand_name}}</option>
                                    @else
                                        <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                            <input type="file" class="form-control" id="exampleInputPassword1"
                                   name="product_image">
                            <img src="{{URL::to($product->product_image )}}" alt="hinhanhsanpham"
                                 style="width: 100px; height: auto; margin: 10px 0px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                                      placeholder="Nhập mô tả"
                                      name="product_desc">{{ $product->product_desc }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                @endforeach
            </div>

        </div>
    </section>
@endsection
