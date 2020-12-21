@extends("admin_layout")
@section("content-admin")
    <section class="panel wrapper">
        <header class="panel-heading">
            SỬA DANH MỤC SẢN PHẨM
        </header>
        <div class="panel-body">
            <div class="position-center">
                @foreach($category_item as $key => $value)
                    <form role="form" action="{{URL::to('/admin/edit-category-product/'.$value->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Nhập tên danh mục" name="category_name"
                                   value="{{ $value->category_name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea rows="5" type="text" class="form-control" id="exampleInputPassword1"
                                      placeholder="Nhập mô tả"
                                      name="category_desc">{{ $value->category_desc }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Cập nhật danh mục</button>
                    </form>
                @endforeach
            </div>

        </div>
    </section>
@endsection
