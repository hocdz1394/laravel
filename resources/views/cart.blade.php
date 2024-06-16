@extends("layout")
@section('title','Giỏ hàng')
@section('content')
<form method="POST" action="{{route('cart.post')}}" class="main-gh row">
  @csrf
  <h1>Giỏ hàng</h1>
  <div class="gh-left col-md-8 col-sm-12">
    {{-- <div class="placehoder">
      <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0"
        aria-valuemax="100">
        <div class="progress-bar" style="width: 75%"></div>
      </div>
      <p class="mt-1 fs-6_5">Bạn cần mua thêm <strong class="text-secondary">500.000đ</strong> để được freeship
      </p>
    </div> --}}
    <div class="table-giohang">

      <table ng-if="cart.length>0" class="table border rounded-2 align-middle">
        <thead>
          <tr>
            <th scope="col-2">Hình ảnh</th>
            <th class="col-3" scope="col">Tên sản phẩm</th>
            <th scope="col-2">Đơn giá</th>
            <th scope="col-2">Số Lượng</th>
            <th scope="col-2">Thành tiền</th>
            <th scope="col-2">Xoá</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="sp in cart">

            <th scope="row"><img class="w-50"  src="{{asset('/')}}upload/product/@{{sp.image}}" alt=""></th>                

            <td class=" col-3 fs-6_5 fw-bold">@{{sp.name}}
            </td>
            {{-- @if (isset(sp['sale_price']))
                <td>{{ number_format(sp['sale_price'], 0, ',', '.') }} đ</td>
            @else
                <td>{{ number_format(sp['regular_price'], 0, ',', '.') }} đ</td>
            @endif --}}
            <td ng-if="sp.sale_price">@{{ sp.sale_price | number:0 }} đ</td>
            <td ng-if="!sp.sale_price">@{{ sp.regular_price| number:0}}  đ</td>
            <td>
              <div class="input-group">
                <div class="qty-input border">
                  <button  class="qty-count qty-count--minus" data-action="minus" ng-click="sp.quantity=sp.quantity-1" type="button">-</button>
                  <input class="product-qty" type="number"  ng-model="sp.quantity" name="product-qty" ng-click="increase()" min="0"  value="@{{sp.quantity}}">
                  <button class="qty-count qty-count--add" data-action="add" ng-click="sp.quantity=sp.quantity+1" type="button">+</button>
                </div>
              </div>
            </td>
            <td>@{{sp.quantity*((sp.sale_price !=null)? sp.sale_price:sp.regular_price)| number:0 }} đ</td>
            <td><a href="jsavascript:void(0)"  ng-click="removeProductById($index)"><i class="bi bi-trash3 hv-trash"></i></a></td>
          </tr>
        </tbody>
      </table>
      <div ng-if="cart.length>0" class="row d-flex flex-row-reverse">
        <div class="col-3">
          <div class="total d-flex justify-content-around">
            <div class="title_total ">Tổng số lượng:</div>
            <strong class="text-primary">@{{totalCartQuantity()}}</strong>
          </div>
          <div class="total d-flex justify-content-around">
            <div class="title_total">Tổng tiền:</div>
            <strong class="text-primary">@{{totalCartMoney()|number: 0}} đ</strong>
          </div>
          {{-- <button type="submit" class="btn btn-primary text-light w-100 my-2" >Thanh toán</button> --}}
          <a type="submit" class="btn btn-primary text-light w-100 my-2" href="{{route('checkout')}}" >Thanh toán</a>
          
        </div>
      </div>

      <div ng-if="cart.length===0" class=" text-center">
        <p class="text-primary">Giỏ hàng hiện đang trống!</p>
        <div class="d-flex justify-content-center">
          <img class="w-25 text-center" src="{{asset('asset/img/cart_empty.png')}}" alt="">
        </div>
        <a class="btn btn-outline-primary" href="{{route('home')}}">Tiếp tục mua hàng</a>
      </div>

    </div>
  </div>
  <div class="gh-right col-md-4 col-sm-12">
    <div class=" bg-lightgray rounded-2">
      <div class="ct-voucher-product mb-4 p-3">
        <div class="title text-black fs-5_5 mb-2 ">Các mã giảm giá có thể áp dụng:</div>
        <div class="ct-vouchers hstack gap-5">
          <div class="ct-voucher-thumb">
            <div class="ct-voucher">HELLO</div>
            <div class="ct-voucher">FREESHIP</div>
            <div class="ct-voucher">SUDES50K</div>
            <div class="ct-voucher">SUDES50</div>
          </div>
        </div>
        <div class="title text-black fs-5_5 my-2 ">Thời gian giao hàng</div>
        <div class="tg hstack gap-3">
          <input class="form-control" type="date" name="" id="">
          <div class="dropdown">
            <button class="btn btn-close-white dropdown-toggle" type="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Chọn thời gian
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">08h00 - 12h00</a></li>
              <li><a class="dropdown-item" href="#"> 14h00 - 18h00</a></li>
              <li><a class="dropdown-item" href="#"> 19h00 - 21h00</a></li>
            </ul>
          </div>
        </div>
        <div class="check-box mt-2 mb-3">
          <input data-bs-toggle="collapse" data-bs-target="#collapseOne" class="" type="checkbox" id="xuat_hoa_don"
            name="xuat_hoa_don">
          <label for="xuat_hoa_don">Xuất hoá đơn công ty</label>
        </div>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <form action="">
              <div class="">
                <label for="" class="">Tên công ty</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="">
                <label for="" class="">Mã số thuế</label>
                <input type="text" name="" id="" class="form-control">
              </div>
              <div class="">
                <label for="" class="">Địa chỉ công ty</label>
                <textarea name="" id="" class="form-control"></textarea>
              </div>

              <div class="">
                <label for="" class="">Email nhận hoá đơn</label>
                <input type="email" name="" id="" class="form-control">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Modal -->
<div class="modal fade" id="checkAuthModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Vui lòng điền thông tin</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="text-center " action="{{ route('loginnp') }}" method="post" novalidate>
          @csrf
          @error('email')
          <p class="text-danger">{{$message}}</p>
          @enderror
          <input type="email" class="form-control mb-3" placeholder="Email" name="email" id="">
          <input type="password" class="form-control mb-3" placeholder="Mật khẩu" name="password"
              id="">
          @error('password')
              <p class="text-danger">{{$message}}</p>
          @enderror
          <input class="btn btn-primary text-light hvbg col-12" type="submit" value="Đăng nhập">
          <a class="hv text-center" data-bs-toggle="collapse" href="#collapseOne">Quên mật khẩu</a>
          <!-- end toggle -->
          <p>Hoặc đăng nhập bằng</p>
          <div class="socal">
              <a href="#" class="btn btn-primary text-light"><i
                      class="fa-brands fa-facebook-f text-light fs-5_5 p-2"></i></i>Facebook</a>
              <a href="#" class="btn btn-danger text-light"><i
                  class="fa-brands fa-google text-light fs-5_5 p-2"></i></i>Google</a>
              </div>
          </form>
          <div id="collapseOne" class="accordion-collapse collapse pt-4" data-bs-parent="#accordionExample">
              <form action="{{route('forgot')}}" method="post">
                  @csrf
                  <div class="accordion-body">
                      <input type="email" class="form-control mb-3"  placeholder="Email" name="email"
                          id="">
                      <input class="btn btn-primary text-light hvbg col-12" type="submit"
                          value="Lấy lại mật khẩu">
                  </div>
              </form>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
        <button type="button" class="btn btn-primary">Đi đến thanh toán</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('viewFunction')
    <script>
      
    </script>
@endsection