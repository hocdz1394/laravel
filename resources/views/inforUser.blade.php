@extends("layout")
@section('title','Thông tin cá nhân')
@section('content')
<div class="main">
  <div class="row mb-5 justify-content-around">
    <div class="d-flex gap-2 align-content-center">
      <div class="col-3">
        <div class="px-4 h-100 w-90 py-5 nav flex-column nav-pills me-3 shadow p2 rounded-2 border-1"
          id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <button class="nav-link hstack gap-3 mb-1 active" id="v-pills-home-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i
              class=" fs-5 bi bi-info-square-fill"></i>Thông tin</button>
          <button class="nav-link hstack gap-3 mb-1" id="v-pills-profile-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
            aria-selected="false"><i class="fs-5 bi bi-cart4"></i>Đơn hàng</button>
          <button class="nav-link hstack gap-3 mb-1" id="v-pills-disabled-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled"
            aria-selected="false"><i class="fs-5 bi bi-person-fill-gear"></i>Cập nhật thông tin</button>
          <button class="nav-link hstack gap-3 mb-1" id="v-pills-messages-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
            aria-selected="false"><i class="bi fs-5 bi-sliders"></i>Cài đặt</button>
          <button class="nav-link hstack gap-3 mb-1" id="v-pills-settings-tab" data-bs-toggle="pill"
            data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
            aria-selected="false"><i class="bi fs-5 bi-box-arrow-in-right"></i>Đăng xuất</button>
        </div>
      </div>
      <div class="col-9 w-75 h-100 rounded-3 shadow">
        <div class=" tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
            tabindex="0">
            <div class=" main pb-5 px-4">
              <h2 class="text-primary fs-4 fw-bold text-uppercase pt-3 mb-3 border-bottom">Thông tin của bạn</h2>
              <div class="row pt-3">
                <div class="col-3 fw-bold">Ảnh của bạn</div>
                <div class="col-7 " style="width: 150px;height: 150px;">
                  <img style="border-radius: 50%; border: 1px solid;" class="w-100" src="upload/user/{{Auth::user()->image}}" alt="">
                </div>
              </div>
              <div class="hstack loginregit gap-5 ">
                <div class="col-2 d-flex fw-bold">Name</div>
                <div class="col-7"><input class="form-control" disabled type="text" value="{{Auth::user()->name}}" id=""></div>
              </div>
              <div class="hstack loginregit gap-5 ">
                <div class="col-2 d-flex fw-bold">Số điện thoại</div>
                <div class="col-7"><input class="form-control" disabled type="text" value="{{Auth::user()->phone}}"  name="" id=""></div>
              </div>
              <div class="hstack loginregit gap-5 ">
                <div class="col-2 d-flex fw-bold">Email</div>
                <div class="col-7"><input class="form-control" disabled type="text" value="{{Auth::user()->email}}" name="" id=""></div>
              </div>
              <div class="hstack loginregit gap-5 align-items-start ">
                <div class="col-2 d-flex fw-bold">Địa chỉ</div>
                <div class="col-7"><input class="form-control" disabled type="text" value="{{Auth::user()->address}}" name="" id="">
                  @if (!isset(Auth::user()->address) && !isset(Auth::user()->phone))
                  <div class="fs-6_5 alert alert-danger">Tài khoản hiện chưa có địa chỉ và số điện thoại vui lòng cập nhật ở phần cập nhật
                    thông tin.</div>
                  @elseif(!isset(Auth::user()->address))
                  <div class="fs-6_5 alert alert-danger">Tài khoản hiện chưa có địa chỉ vui lòng cập nhật ở phần cập nhật
                    thông tin.</div>
                  @elseif(!isset(Auth::user()->phone))
                  <div class="fs-6_5 alert alert-danger">Tài khoản hiện chưa có số điện thoại vui lòng cập nhật ở phần cập nhật
                    thông tin.</div>
                  @endif
                  @if (Session::has('success'))
                  <div class="alert alert-success">{{ Session::get('success') }}</div>
                      @php
                          Session::forget('success');
                      @endphp
                  @endif
                </div>
              </div>

              <div class="mt-5 text-center">Hãy đăng ký thành viên premium để có nhiều ưu đãi từ chúng tôi tại đây
              </div>
              <p class="d-flex mt-2 justify-content-around text-end">
                <a class="btn btn-primary end-0 text-light" href="">Đăng ký ngay</a>
              </p>
            </div>
          </div>
          <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
            tabindex="0">
            <div class="main pb-5 px-4">
              <h2 class="text-primary fs-4 fw-bold text-uppercase pt-3 mb-3 border-bottom">Đơn hàng của bạn</h2>
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr class="text-center">
                      <th>Mã</th>
                      <th>Khách hàng</th>
                      <th style="
                      width: 200px;
                  ">Email</th>
                      <th>Tổng sản phẩm</th>
                      <th>Tổng tiền</th>
                      <th>Tình trạng</th>
                      <th style="
                      width: 132px;">Chức năng</th>
                    </tr>
                  </thead>
                  <tbody>

                    <tr ng-repeat="order in orders">
                      <td class="text-center fs-6_5">@{{order.id}}</td>
                      <td class="text-center fs-6_5">@{{order.name}}</td>
                      <td class="text-center fs-6_5">
                        @{{order.email}}
                      </td>
                      <td class="text-primary text-center fw-bold">@{{order.total_quantity}}</td>
                      <td class="text-primary text-center">@{{order.total_money+40000|number:0}} đ</td>

                      <td class="text-center">
                        <div ng-disabled="order.status == 'Chờ xác nhận' || order.status == 'Huỷ Đơn' || order.status == 'Đã huỷ'"
                        ng-class="{ 
                          'btn btn-sm btn-secondary rounded-3': order.status == 'Đang vận chuyển',
                          'btn btn-sm btn-primary rounded-3': order.status == 'Chờ xác nhận',
                          'btn btn-sm btn-info rounded-3': order.status == 'Chuẩn bị hàng',
                          'btn btn-sm btn-success rounded-3': order.status == 'Đã giao',
                          'btn btn-sm btn-warning rounded-3': order.status == 'Huỷ đơn',
                          'btn btn-sm btn-danger rounded-3': order.status == 'Đã huỷ'
                        }">
                        @{{ order.status }}
                   </div>
                      </td>

                      <td class="text-center" width="40px">
                        <button ng-click="infor_order(order.id)" class="btn btn-warning btn-sm edit" type="button"
                          title="Chi tiết" id="show-emp" data-bs-toggle="modal" data-bs-target="#modalOrders"
                          data-bs-toggle="tooltip" data-bs-placement="top"
                            data-bs-custom-class="custom-tooltip"
                            data-bs-title="Chi tiết đơn hàng."
                          ><i class="text-light fs-5  bi bi-info-circle"></i></button>
                        <button ng-click="cancel_status( order.status,order.id)" class="btn btn-danger btn-sm edit"
                          type="button" title="Xoá"data-bs-toggle="tooltip" data-bs-placement="top"
                          data-bs-custom-class="custom-tooltip"
                          data-bs-title="Huỷ đơn hàng."
                          onclick="return confirm('Bạn có chắc chắn huỷ đơn hàng không.')"
                          ><i class="text-light fs-5 bi bi-x-circle-fill"></i></button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab"
            tabindex="0">
          
              <div class=" main pb-5 px-4">
                <h2 class="text-primary fs-4 fw-bold text-uppercase pt-3 mb-3 border-bottom">Cập nhật thông tin của bạn
                </h2>
                <div class="row pt-3">
                  <div class="col-3 fw-bold">Ảnh của bạn</div>
                  <div class="col-7  " style="width: 150px;height: 150px;">
                    <img style="border-radius: 50%; border: 1px solid;" class="w-100" src="upload/user/{{Auth::user()->image}}" alt="">
                  </div>
                </div>
                <form action="{{route('handel_fromUserImg')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row py-2">
                    <div class="col-3"></div>
                    <div class="col-7"><input class="pt" name="image" type="file" onchange="this.form.submit()" id=""></div>
                  </div>
                  <input type="hidden" value="{{Auth::user()->id}}" name="id_user">
                </form>
                <form action="{{route('handel_fromUser')}}" method="POST" novalidate class="">
                  @csrf
                <div class="hstack loginregit gap-5 ">
                  <div class="col-2 d-flex fw-bold">Name</div>
                  <div class="col-7"><input class="form-control" type="text" value="{{Auth::user()->name}}" name="name"
                      id=""></div>
                </div>
                <div class="hstack loginregit gap-5 ">
                  <div class="col-2 d-flex fw-bold">Số điện thoại</div>
                  <div class="col-7"><input class="form-control" type="text" value="{{Auth::user()->phone}}" name="phone"
                      id="" pattern="(84|0[35789])[0-9]{8}\b" >
                  </div>
                </div>
                <div class="hstack loginregit gap-5 ">
                  <div class="col-2 d-flex fw-bold">Email</div>
                  <div class="col-7"><input class="form-control" type="text" value="{{Auth::user()->email}}" name="email" id="" >
                  </div>
                </div>
                <div class="hstack loginregit gap-5 ">
                  <div class="col-2 d-flex fw-bold">Địa chỉ</div>
                  <div class="col-7"><input class="form-control" type="text" value="{{Auth::user()->address}}" name="address"
                      id="" ></div>
                </div>
                {{-- <div class="hstack loginregit gap-5 ">
                  <div class="col-2 d-flex fw-bold">Mật khẩu</div>
                  <div class="col-7"><input class="form-control" type="password" ng-model="matchedUsers[0].password"
                      name="" id="" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" >
                    <div class="invalid-feedback mb-1 start-0">Có chữ hoa, chữ thường, kí tự đặt biệt và ít nhất 8 ký
                      tự!
                    </div>
                  </div>
                </div> --}}
                <input type="hidden" value="{{Auth::user()->id}}" name="id_user">
                <div class="hstack justify-content-end gap-3 me-7 mt-4 pe-5">
                  <button class="btn btn-success px-4" type="submit">Lưu lại</button>
                  <div class="btn btn-danger">Huỷ bỏ</div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"
            tabindex="0">..dsfdfsfd.</div>
          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"
            tabindex="0">..sac.</div>
        </div>
      </div>
    </div>
  </div>
</div>
{{-- MODAL --}}
<div class="modal fade" id="modalOrders" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Đơn hàng: @{{order.id}}</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-between p-3">

          <div class=" col-12 me-6 end-0 bg-lightgray rounded-3 shadow">
            <div class="your-order">
              <h4 class="text-uppercase text-primary fw-bold mt-3">Đơn hàng của bạn</h4>
              <div class="row mt-4 border">
                <div class="row p-3">
                  <div class="col-6">
                    <div class="fs-5">Thông tin mua hàng</div>
  
                      <div class="fs-6_5 text-gray pt-1">@{{order.name}}</div>
  
                      <div class="fs-6_5 text-gray pt-1"></div>  
                    <div class="fs-6_5 text-gray pt-2">@{{order.email}}</div>
                    <div class="fs-6_5 text-gray pt-2">@{{order.phone}}</div>
                  </div>
                  <div class="col-6">
                    <div class="fs-5">Địa chỉ nhận hàng</div>
                    <div class="fs-6_5 text-gray pt-1">@{{order.address}}</div>
                    <div class="fs-6_5 text-gray pt-2">@{{order.phone}}</div>
                  </div>
                </div>
                <div class="row p-3">
                  <div class="col-6">
                    <div class="fs-5">Phương thức thanh toán</div>
                    <div class="w-75">
                      <img ng-show="order.payment_method=='cod'" class="w-25  rounded-3" src="{{asset('asset/img/cod.webp')}}" alt="">
                      <img ng-show="order.payment_method=='vnpay'" class="w-25  rounded-3" src="{{asset('asset/img/vnpay.jpeg')}}" alt="">
                      <img ng-show="order.payment_method=='momo'" class="w-25  rounded-3" src="{{asset('asset/img/momo.webp')}}" alt="">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="fs-5">Phương thức vận chuyển</div>
                    <div class="fs-6_5 text-gray pt-1">Giao hàng tận nơi</div>
                  </div>
                </div>
              </div>
              <div class="p-3 table-responsive">

                  <div ng-repeat="sp in order.detail_order" class="row py-3 ng-scope border-bottom border-top align-items-center">
                    <div class="col-3 ">
                        <img class="w-75 img-thumbnail" src="@{{'upload/product/'+ sp.product.image_product[0].path }}" alt="">
                    </div>
                    <div class="col-9">
                      <div class="row">
                        <div class="title-name ng-binding">@{{sp.product.name}}</div>
                      </div><br>
                      <div class="total hstack justify-content-between">
                        <div class="sl">Số lượng: <strong class="">@{{sp.quantity}}</strong></div>
                          <div class="title ng-binding">@{{sp.price| number:0}} đ</div>
                      </div>
                      <div class="total hstack justify-content-between color-video">
                        <div class="sl d-flex gap-2 align-items-center">Màu sắc: <div style="background-color:@{{sp.color}}" class="swatche"></div></div>
                        <div class="sl">Size: <strong class="">@{{sp.size}}</strong></div>
                      </div>
                    </div>
                  </div>
                
              </div>
            </div>
            <div class="mt-3 py-3 ng-scope border-bottom">
              <div class="py-1 hstack justify-content-between">
                <div class="text-total">Tổng số lượng</div>
                <div class="price-tt">@{{order.total_quantity}} đơn hàng</div>
              </div>
              <div class="py-1 hstack justify-content-between">
                <div class="text-total">Tạm tính:</div>
                <div class="price-tt">@{{order.total_money|number:0}} đ</div>
              </div>
              <div class="py-1 hstack justify-content-between">
                <div class="text-total">Phí vận chuyển:</div>
                <div class="price-tt">40,000 đ</div>
              </div>
            </div>
            <div class="py-1 hstack justify-content-between pb-3">
              <div class="text-total fs-4">Tổng cộng:</div>
              <div class="price-tt fs-4 fw-bold text-primary">@{{order.total_money + 40000 | number:0}}đ</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

// Khởi tạo tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });

</script>
@endsection
@section('viewFunction')
  <script>
  </script>
@endsection