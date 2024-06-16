@extends('admin.layout')
@section('title', 'Thêm sản phẩm')
@section('content')

    <div class="row">
        <div class="tile">
            
            <form action="{{route('add-product') }}" novalidate method="POST" class="">
                @csrf
                <div class="tile-body row">
                    <div class="form-group col-md-3">
                        <label class="control-label">Tên sản phẩm</label>
                        <input class="form-control" value="{{old('name')}}" name="name" type="text" required>
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="exampleSelect1" class="control-label">Danh mục</label>
                        <select class="form-control" name="id_categories" id="exampleSelect1" required="required">
                            <option selected value="">Chọn danh mục</option>
                            @foreach ($get_category as $item)
                                <option  value="{{$item->id}}"  {{ old('id_categories') == $item->id ? 'selected' : '' }} >{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('id_categories')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class=" form-group col-md-3">
                        <label class="control-label">Giá thường</label>
                        <input class="form-control"  value="{{old('regular_price')}}" name="regular_price" type="text" required>
                        @error('regular_price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Giá sale</label>
                        <input class="form-control" name="sale_price" type="text" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">Trạng thái</label> <br>
                        <div class="row">
                            <label class="mb-0" for="">
                                <input name="flash_sale" value="1" type="checkbox" >Flash sale</label>
                        </div>
                        <div class="row">
                            <label class="mb-0" for="">
                                <input name="feature" value="1" type="checkbox">Sản phẩm nổi bật</label>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="control-label">Thể loại</label> <br>
                        <div class="hstack gap-2"><input type="radio" {{old('gender')=="Nam" ? "checked" : ''}} name="gender" value="Nam" id="">
                            <div class="">Nam</div>
                        </div>
                        <div class="hstack gap-2"><input type="radio" {{old('gender')=="Nữ" ? "checked" : ''}}  name="gender" value="Nữ" id="">
                            <div class="">Nữ</div>
                        </div>
                        <div class="hstack gap-2"><input type="radio" {{old('gender')=="Unisex" ? "checked" : ''}}  name="gender" value="Unisex" id="">
                            <div class="">Unisex</div>
                        </div>
                        @error('gender')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="control-label">Mô tả của chi tiết sản phẩm</label>
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        <textarea ck-editor class="form-control" name="description" id="mota"></textarea>
                    </div>
                </div>
                <div class="footer hstack">
                    <div class="me-auto"></div>
                    <button class="btn btn-success" type="submit">Lưu lại</button>
                    <a class="ms-2 btn btn-danger" data-dismiss="modal" href="#">Hủy bỏ</a>
                </div>
            </form>
        </div>
    </div>
    </main>

@endsection
