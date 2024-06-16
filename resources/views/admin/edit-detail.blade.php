@extends('admin.layout')
@section('title', 'Chỉnhh sửa chi tiết sản phẩm')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="">
        <h3 class="tile-title mt-2 hstack gap-2 ">Chỉnh sửa thi tiết sản phẩm <div class="text-primary me-auto">
        </h3>
        <div class="tile">
          <form action="{{route('update-detail-manager',['id'=>$reqnum])}}" class="" method="POST">
            @csrf
            <div class="tile-body row">
              <div class="form-group col-md-12">
                <label class="control-label">Tên sản phẩm</label>
                <input class="form-control" value="{{$name}}" disabled  type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập màu</label>
                <input class="form-control" value="{{$getId_detail->color}}" name="color" type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập size</label>
                <input class="form-control" value="{{$getId_detail->size}}" name="size" type="text" required>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Nhập số lượng</label>
                <input class="form-control" value="{{$getId_detail->quantity}}" name="quantity" type="text" required>
              </div>

            </div>
            <div class="footer hstack">
              <div class="me-auto"></div>
              <input type="hidden" name="id_product" value="{{$id_detailk}}">
              <input class="btn btn-success" value="Lưu lại" type="submit">
              <a class="ms-2 btn btn-danger" data-dismiss="modal" href="#">Hủy bỏ</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection
