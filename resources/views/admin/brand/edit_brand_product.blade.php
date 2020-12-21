@extends("admin_layout")
@section("content-admin")
<section class="panel wrapper">
    <header class="panel-heading">
        SỬA THƯƠNG HIỆU SẢN PHẨM
    </header>
    <div class="panel-body">
        <div class="position-center">
{{--            @foreach($brand_item as $value)--}}
            <form role="form" action="{{URL::to('/admin/edit-brand-product/'.$brand_item['id'])}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"
                           placeholder="Nhập tên danh mục" name="brand_name"
                           value="{{ $brand_item['brand_name'] }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Danh mục sản phẩm</label>
                    <select class="form-control input-sm m-bot15" name="category_id">
                        @foreach( $all_category_product as $category)
                            @if( $brand_item['category_id'] == $category->id )
                                <option value="{{$category->id}}" selected>{{$category->category_name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                    <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                              placeholder="Nhập mô tả"
                              name="brand_desc">{{ $brand_item['brand_desc'] }}</textarea>
                </div>
                <button type="submit" class="btn btn-info">Cập nhật thương hiệu</button>
            </form>
{{--            @endforeach--}}
        </div>


    </div>
</section>
@endsection
