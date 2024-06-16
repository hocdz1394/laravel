@extends('admin.layout')
@section('title', 'Danh sách người dùng')
@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button d-flex justify-content-between">
            <div class="col-sm-2 me-auto">
              <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#ModalAdd" title="Thêm"><i
                  class="fas fa-plus"></i>
                Thêm người dùng</a>
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
                <th>Tên người dùng</th>
                <th width="">Địa chỉ</th>
                <th width="">Email</th>
                <th width="">Quyền truy cập</th>
                <th width="">Trạng thái</th>
                <th width="" style="width: 150px;">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">Áo mùa đông cao cấp</td>
                <td class="text-center">
                  <img class="img-thumbnail" src="../../img/" alt="" width="70px;">
                </td>
                <td class="text-center">1,234,000đ</td>

                <td class="text-center">
                  <button disabled class="badge btn btn-secondary">Người dùng tồn kho</button>
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
              <tr>
                <td class="text-center">1</td>
                <td class="text-center">Áo mùa đông cao cấp</td>
                <td class="text-center">
                  <img class="img-thumbnail" src="../../img/" alt="" width="70px;">
                </td>
                <td class="text-center">1,234,000đ</td>
                <td class="text-center">
                  <button disabled class="badge btn btn-success">Người dùng mới nhập</button>
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
        <h3 class="tile-title mt-2 hstack gap-2 ">Thêm người dùng <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form ng-submit="editUsers()" novalidate class="was-validated">
            <div class="tile-body row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên người dùng</label>
                <input ng-model="editUser.name" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Email</label>
                <input ng-model="editUser.email" class="form-control" type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                  required>
                <div class="invalid-feedback mb-1 start-0">Vui lòng nhập đúng định dạng email !</div>
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Số điện thoại</label>
                <input ng-model="editUser.phone" class="form-control" type="text" pattern="(84|0[35789])[0-9]{8}\b"
                  required>
                <div class="invalid-feedback mb-1 start-0">Vui lòng bắt đầu từ 0 gồm 10 số !</div>
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Mật khẩu</label>
                <input ng-model="editUser.password" class="form-control" type="password"
                  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                <div class="invalid-feedback mb-1 start-0">Có chữ hoa, chữ thường, kí tự đặt biệt và ít nhất 8 ký tự !
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tỉnh/Thành phố</label>
                <input ng-model="editUser.tinh" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Huyện/Quận</label>
                <input ng-model="editUser.huyen" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Xã/Phường</label>
                <input ng-model="editUser.xa" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ảnh người dùng</label>
                <div id="myfileupload mt-2">
                  <input type="file" onchange="angular.element(this).scope().editFileUser(this)" accept="image/*" />

                </div>
                <img class="" ng-src="" style="max-width: 200px;"><br>

              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Quyền truy cập</label> <br>
                <div class="hstack gap-2">
                  <input type="radio" name="role" ng-model="editUser.role" value="1" id="adminRadio">
                  <label for="adminRadio">Admin</label>
                </div>
                <div class="hstack gap-2">
                  <input type="radio" name="role" ng-model="editUser.role" value="0" id="customerRadio">
                  <label for="customerRadio">Khách hàng</label>
                </div>

              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Điền địa chỉ cụ thể</label>
                <textarea ng-model="editUser.note" class="form-control"></textarea>
              </div>
            </div>
            <button class="btn btn-success" type="submit">Lưu lại</button>
            <a class="btn btn-danger" href="#!qluser">Hủy bỏ</a>
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
        <h3 class="tile-title mt-2 hstack gap-2 ">Chỉnh sửa thông tin người dùng <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form ng-submit="editUsers()" novalidate class="was-validated">
            <div class="tile-body row">
              <div class="form-group col-md-3">
                <label class="control-label">Tên người dùng</label>
                <input ng-model="editUser.name" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Email</label>
                <input ng-model="editUser.email" class="form-control" type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                  required>
                <div class="invalid-feedback mb-1 start-0">Vui lòng nhập đúng định dạng email !</div>
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Số điện thoại</label>
                <input ng-model="editUser.phone" class="form-control" type="text" pattern="(84|0[35789])[0-9]{8}\b"
                  required>
                <div class="invalid-feedback mb-1 start-0">Vui lòng bắt đầu từ 0 gồm 10 số !</div>
              </div>

              <div class="form-group col-md-3">
                <label class="control-label">Mật khẩu</label>
                <input ng-model="editUser.password" class="form-control" type="password"
                  pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
                <div class="invalid-feedback mb-1 start-0">Có chữ hoa, chữ thường, kí tự đặt biệt và ít nhất 8 ký tự !
                </div>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Tỉnh/Thành phố</label>
                <input ng-model="editUser.tinh" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Huyện/Quận</label>
                <input ng-model="editUser.huyen" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Xã/Phường</label>
                <input ng-model="editUser.xa" class="form-control" type="text" required>
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Ảnh người dùng</label>
                <div id="myfileupload mt-2">
                  <input type="file" onchange="angular.element(this).scope().editFileUser(this)" accept="image/*" />

                </div>
                <img class="" ng-src="" style="max-width: 200px;"><br>

              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Quyền truy cập</label> <br>
                <div class="hstack gap-2">
                  <input type="radio" name="role" ng-model="editUser.role" value="1" id="adminRadio">
                  <label for="adminRadio">Admin</label>
                </div>
                <div class="hstack gap-2">
                  <input type="radio" name="role" ng-model="editUser.role" value="0" id="customerRadio">
                  <label for="customerRadio">Khách hàng</label>
                </div>

              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Điền địa chỉ cụ thể</label>
                <textarea ng-model="editUser.note" class="form-control"></textarea>
              </div>
            </div>
            <button class="btn btn-success" type="submit">Lưu lại</button>
            <a class="btn btn-danger" href="#!qluser">Hủy bỏ</a>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection