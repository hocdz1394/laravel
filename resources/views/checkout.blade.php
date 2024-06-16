@extends("layout")
@section('title','Thanh toán')
@section('content')
<div class="main top-90">
  <form class="needs-validation" novalidate action="{{route('checkout.post')}}" method="POST">
    @csrf
    <div class="row justify-content-between mb-5">
      <div class="col-lg-6 col-12 ps-6">
        <div class="checkbox-form">
          <h4 class="text-uppercase text-primary fw-bold">Thanh toán</h4>
          <div class="row loginregit">
            <div class="col-md-12">
              <div class="checkout-form-list mb-4 ">
                <label>Họ và tên<span class="text-danger">*</span></label>
                <input class="form-control" placeholder="Nhập họ tên" name="name" value="{{(Auth::check())?Auth::user()->name:''}}" type="text" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="checkout-form-list mb-4">
                <label>Số điện thoại <span class="text-danger">*</span></label>
                <input class="form-control" type="text" placeholder="Số điện thoại" value="{{(Auth::check())?Auth::user()->phone:''}}" name="phone"
                  pattern="(84|0[35789])[0-9]{8}\b" required>
                <div class="invalid-feedback mb-1 start-0">Vui lòng bắt đầu từ 0 hoặc 840 !</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="checkout-form-list mb-4">
                <label>Địa chỉ email </label>
                <input type="email" class="form-control mb-3" placeholder="Email" name="email" value="{{(Auth::check())?Auth::user()->email:''}}"
                  pattern="[^@\s]+@[^@\s]+\.[^@\s]+" >
                <div class="invalid-feedback mb-1 start-0">Vui lòng nhập đúng định dạng email !</div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="checkout-form-list mb-4">
                <label>Địa chỉ<span class="text-danger">*</span></label>
                <input type="text" class="form-control mb-5" placeholder="Điền địa chỉ" name="address" value="{{(Auth::check())?Auth::user()->address:''}}">
                {{-- <div class="hstack gap-4">
                  <input type="text" class="form-control w-50" placeholder="Điền huyện" name="huyen">
                  <input type="text" class="form-control w-50" placeholder="Điền xã" name="xa">
                </div> --}}
              </div>
            </div>
            <div class="checkout-form-list mb-4">
              <label>Ghi chú</label>
              <textarea id="checkout-mess" class="form-control h-100" name="note"
                placeholder="Ghi chú về đơn hàng của bạn."></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12 me-6 end-0 bg-lightgray rounded-3 shadow">
        <div class="p-4">
          <div class="your-order">
            <h4 class="text-uppercase text-primary fw-bold mt-3">Đơn hàng của bạn</h4>
            <div class="p-3 table-responsive">
              <div ng-repeat="sp in cart" class="row py-3 ng-scope border-bottom border-top">
                <div class="col-3">
                  <img class="w-100" src="{{asset('/')}}upload/product/@{{sp.image}}" alt="">
                </div>
                <div class="col-9">
                  <div class="row">
                    <div class="title-name ng-binding">@{{sp.name}}</div>
                  </div><br>
                  <div class="total hstack justify-content-between">
                    <div class="sl">Số lượng: <strong class="">@{{sp.quantity}}</strong></div>

                    <div class="title ng-binding" ng-if="sp.sale_price">@{{ sp.sale_price | number:0 }} đ</div>
                    <div class="title ng-binding" ng-if="!sp.sale_price">@{{ sp.regular_price| number:0}}  đ</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" disabled class="form-control" placeholder="Nhập mã giảm giá "
                aria-label="Nhập mã giảm giá " aria-describedby="button-addon2" required>
              <button disabled class="btn btn-outline-primary" type="button" id="button-addon2">Button</button>
            </div>
            <div class="section__content border rounded-2">
              <div class="content-box">
                <div class="content-box__row">
                  <div class="p-2 border-bottom d-flex">
                    <input name="payment" id="cod" class="m-2" type="radio" value="cod">
                    <label for="cod" class="radio__label text-center d-flex w-90 justify-content-between align-items-center">
                      <span class="">Thu hộ (COD)</span>
                      <i class="fa-solid fa-money-bill text-primary"></i>
                    </label>
                  </div>
                </div>
                <div class="content-box__row">
                  <div class="p-2 border-bottom d-flex">
                    <input name="payment" id="vnpay" class="m-2" type="radio" value="vnpay">
                    <label for="vnpay" class="radio__label text-center d-flex w-90 justify-content-between align-items-center">
                      <span class="">Chuyển khoản VN pay</span>
                      <i class="fa-solid fa-money-bill text-primary"></i>
                    </label>
                  </div>
                </div>
                <div class="content-box__row">
                  <div class="p-2 d-flex">
                    <input name="payment" id="momo" class="m-2" type="radio" value="momo">
                    <label for="momo" class="radio__label text-center d-flex w-90 justify-content-between align-items-center">
                      <span class="">Thanh Toán bằng Momo</span>
                      <i class="fa-solid fa-money-bill text-primary"></i>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-3 py-3 ng-scope border-bottom border-top">
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Tổng số lượng: </div>
              <div class="price-tt">@{{totalCartQuantity()}}</div>
            </div>
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Tạm tính:</div>
              <div class="price-tt">@{{totalCartMoney()|number:0}} đ</div>
            </div>
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Phí vận chuyển:</div>
              <div class="price-tt">40,000đ</div>
            </div>
          </div>
          <div class="py-1 hstack justify-content-between">
            <div class="text-total fs-4">Tổng cộng:</div>
            <div class="price-tt fs-4 fw-bold text-primary">@{{totalCartMoney() + 40000|number:0}} đ</div>
          </div>
          <div class="py-1 hstack justify-content-between my-3">
            <div class="text-total fs-6"><a class="text-primary d-flex gap-2 align-items-center" href="{{route('cart')}}"><i
                  class="fa-solid fa-chevron-left text-primary fs-5"></i>Quay về giỏ hàng</a></div>
            <button type="submit" class="btn text-light btn-primary">Đặt hàng</button>
          </div>
        </div>
      </div>
    </div>
    
  </form>
</div>
@endsection
