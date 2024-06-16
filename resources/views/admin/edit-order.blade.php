@extends('admin.layout')
@section('title', 'Chỉnh sửa đơn hàng')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="title">
        <h3 class="tile-title mt-2 hstack gap-2 ">Thêm danh mục <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form class="" method="POST">
            @csrf
            <div class="tile-body row">
              <div class="form-group col-md-6">
                <label class="control-label">Tên danh mục</label>
                <input class="form-control" value="{{$category->name}}" name="name" type="text" required>
              </div>
              {{-- <div class="form-group col-md-4">
                <label class="control-label">Ảnh danh mục</label>
                <div id="myfileupload">
                  <input type="file" accept="image/*" multiple="multiple" />
                </div>
                <div class="w-50">
                  <img class="w-100 img-thumbnail" src="" style="max-width: 200px;"><br>
                  <br>
                </div>
              </div> --}}
              <div class="form-group col-md-3">
                <label class="control-label">Sethome</label> <br>
                <div class="row">
                  <label class="mb-0  ms-4" for=""><input type="checkbox" class="w-25" ng-model="editProduct.isFlashsale"
                      ng-init="editProduct.isFlashsale = false"></label>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả của chi tiết danh mục</label>
              <textarea ck-editor  class="form-control" name="description" id="mota">{{$category->description}}</textarea>
              </div>

            </div>
            <div class="footer hstack">
              <div class="me-auto"></div>
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
