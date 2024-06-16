@extends('admin.layout')
@section('title', 'Thêm chi tiết sản phẩm')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <h3 class="tile-title mt-2 hstack gap-2 ">Thêm danh mục <div class="text-primary me-auto">
        </h3>
        <div class="tile">
          <form action="{{route('create-detail-manager',['id'=>$keykeep])}}" class="" method="POST">
            @csrf
            <div class="tile-body row">
              <div class="form-group col-md-12">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" value="{{$namekeep}}" disabled name="color" type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập màu</label>
                <input class="form-control" name="color" type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập size</label>
                <input class="form-control" name="size" type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập số lượng</label>
                <input class="form-control" name="quantity" type="text" required>
              </div>
              <input type="hidden" name="id_product" value="{{$keykeep}}">
            </div>
            <div class="footer hstack">
              <div class="me-auto"></div>
              <button class="btn btn-success" value="Lưu lại" type="submit">Lưu</button>
              <a class="ms-2 btn btn-danger" data-dismiss="modal" href="#">Hủy bỏ</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection
