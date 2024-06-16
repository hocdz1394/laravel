@extends('admin.layout')
@section('title', 'Danh sách bài viết')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button d-flex justify-content-between">
            <div class="col-sm-2 me-auto">
              <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#ModalAdd" title="Thêm"><i
                  class="fas fa-plus"></i>
                Thêm bài viết</a>
            </div>
            <div class="col-sm-3">
              <form class="d-flex ng-pristine ng-valid" role="search">
                <input class="form-control me-2 mb-1 h-25" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
              </form>
            </div>
          </div>
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr class="text-center">
                <th width="" class="">Id</th>
                <th>Tên bài viết</th>
                <th width="">Ảnh</th>
                <th width="">Tác giả
                </th>
                <th width="">Ngày viết bài </th>
                <th width="">Thể loại</th>
                <th width="" style="width: 150px;">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">5 cách phối đồ với áo varsity giúp bạn trông cực chất</td>
                <td class="text-center">
                  <img class="img-thumbnail" src="../../img/" alt="" width="70px;">
                </td>
                <td class="text-center">nguyquochoc</td>

                <td class="text-center">
                  2024-04-19 05:00:59
                </td>
                <td>Xu hướng</td>
                <td class="text-center">

                  <button class="btn btn-danger btn-sm" type="button" title="Xóa">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-warning btn-sm" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                    data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">Áo mùa đông cao cấp</td>
                <td class="text-center">
                  <img class="img-thumbnail" src="../../img/" alt="" width="70px;">
                </td>
                <td class="text-center">1,234,000đ</td>
                <td class="text-center">
                  <button disabled class="badge btn btn-success">Bài Viết mới nhập</button>
                </td>
                <td></td>
                <td class="text-center">

                  <button class="btn btn-danger btn-sm" type="button" title="Xóa">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                  <button class="btn btn-warning btn-sm" type="button" title="Sửa" id="show-emp" data-toggle="modal"
                    data-target="#ModalUP">
                    <i class="fas fa-edit"></i>
                  </button>
                </td>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>

<!--
MODAL THÊM
-->
<div class="modal fade py-4" id="ModalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
  data-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">
      <div class="col-md-12 scrolling">
        <h3 class="tile-title mt-2 hstack gap-2 ">Thêm bài viết <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form ng-submit="editNews()" novalidate class="was-validated">
            <div class="tile-body row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên bài viết</label>
                <input ng-model="editNew.titles" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tác giả</label>
                <input ng-model="editNew.author" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Thể loại</label> <br>
                <div class="row">
                  <label class="mb-0" for=""><input type="checkbox" ng-model="editNew.trend"
                      ng-init="editNew.trend = false"> Xu hướng</label>
                </div>
                <div class="row">
                  <label class="mb-0" for=""><input type="checkbox" ng-model="editNew.style"
                      ng-init="editNew.style = false"> phong cách</label>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ảnh bài viết</label>
                <div id="myfileupload">
                  <input type="file" id="editNewImage" onchange="angular.element(this).scope().uploadFileEdit(this)"
                    accept="image/*" />
                </div>

                <img class="w-75 img-thumbnail" ng-src="../../img/" style="max-width: 200px;"><br>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả của chi tiết bài viết</label>
                <textarea ck-editor ng-model="editNew.contents" class="form-control" name="mota" id="mota"></textarea>
              </div>

            </div>
            <button class="btn btn-success" type="submit">Lưu lại</button>
            <a class="btn btn-danger" href="#!qlnews">Hủy bỏ</a>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<!--
MODAL CHỈNH SỬA
-->
<div class="modal fade py-4" id="ModalUP" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
  data-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">
      <div class="col-md-12 scrolling">
        <h3 class="tile-title mt-2 hstack gap-2 ">Chỉnh sửa bài viết <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form ng-submit="editNews()" novalidate class="was-validated">
            <div class="tile-body row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên bài viết</label>
                <input ng-model="editNew.titles" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tác giả</label>
                <input ng-model="editNew.author" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Thể loại</label> <br>
                <div class="row">
                  <label class="mb-0" for=""><input type="checkbox" ng-model="editNew.trend"
                      ng-init="editNew.trend = false"> Xu hướng</label>
                </div>
                <div class="row">
                  <label class="mb-0" for=""><input type="checkbox" ng-model="editNew.style"
                      ng-init="editNew.style = false"> phong cách</label>
                </div>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ảnh bài viết</label>
                <div id="myfileupload">
                  <input type="file" id="editNewImage" onchange="angular.element(this).scope().uploadFileEdit(this)"
                    accept="image/*" />
                </div>

                <img class="w-75 img-thumbnail" ng-src="../../img/" style="max-width: 200px;"><br>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả của chi tiết bài viết</label>
                <textarea ck-editor ng-model="editNew.contents" class="form-control" name="mota" id="mota"></textarea>
              </div>

            </div>
            <button class="btn btn-success" type="submit">Lưu lại</button>
            <a class="btn btn-danger" href="#!qlnews">Hủy bỏ</a>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection