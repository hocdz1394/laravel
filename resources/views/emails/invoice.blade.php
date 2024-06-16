<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Denny</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/gh/eliyantosarage/font-awesome-pro@main/fontawesome...in.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/themes/base/jquery-ui.min.css">

    <!-- Option 1: Include in HTML -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <div class="main">
      <div class="row justify-content-between mb-5 top-90">
        <div class="col-lg-6 col-12 ps-6">
          <div class="row">
            <div class="col-2"><img class="w-100" src="{{asset('asset/img/correct.png')}}" alt=""></div>
            <div class="col-10">
              <strong class="fs-5">Cảm ơn bạn đã đặt hàng</strong>
              <div class="bill-title mt-1 fs-6_5">
                Một email xác nhận đã được gửi tới {{$order->email}} <br>
                Xin vui lòng kiểm tra email của bạn
              </div>
            </div>
          </div>
          <div class="row mt-4 border">
            <div class="row p-3">
              <div class="col-6">
                <div class="fs-5">Thông tin mua hàng</div>
                @if (isset($order->name))
                  <div class="fs-6_5 text-gray pt-1">{{$order->name}}</div>
                @else
                  <div class="fs-6_5 text-gray pt-1"></div>  
                @endif
                <div class="fs-6_5 text-gray pt-2">{{$order->email}}</div>
                <div class="fs-6_5 text-gray pt-2">{{$order->phone}}</div>
              </div>
              <div class="col-6">
                <div class="fs-5">Địa chỉ nhận hàng</div>
                <div class="fs-6_5 text-gray pt-1">{{$order->address}}</div>
                <div class="fs-6_5 text-gray pt-2">{{$order->phone}}</div>
              </div>
            </div>
            <div class="row p-3">
              <div class="col-6">
                <div class="fs-5">Phương thức thanh toán</div>
                <div class="w-75">
                        @if ($order->payment_method=='cod')
                          <img class="w-25 rounded-3" src="{{asset('asset/img/cod.webp')}}" alt="">
                        @elseif($order->payment_method=='vnpay')
                          <img class="w-25 rounded-3" src="{{asset('asset/img/vnpay.jpeg')}}" alt="">
                        @elseif($order->payment_method=='momo')
                          <img class="w-25 rounded-3" src="{{asset('asset/img/momo.webp')}}" alt="">
                        @endif
                </div>
              </div>
              <div class="col-6">
                <div class="fs-5">Phương thức vận chuyển</div>
                <div class="fs-6_5 text-gray pt-1">Giao hàng tận nơi</div>
              </div>
            </div>
          </div>
          <a class="btn text-light btn-primary hvbg mt-3 end-0" href="{{route('home')}}">Tiếp tục mua hàng</a>
        </div>
        <div class="col-lg-4 col-12 me-6 end-0 bg-lightgray rounded-3 shadow">
          <div class="your-order">
            <h4 class="text-uppercase text-primary fw-bold mt-3">Đơn hàng của bạn</h4>
            <div class="p-3 table-responsive">
              @foreach ($order->detail_order as $item)
                <div class="row py-3 ng-scope border-bottom border-top align-items-center">
                  <div class="col-3 ">
                    @if($item->product->image_product->isNotEmpty())
                      <img class="w-75 img-thumbnail" src="{{ asset('upload/product/'.$item->product->image_product[0]->path) }}" alt="">
                    @endif
                  </div>
                  <div class="col-9">
                    <div class="row">
                      <div class="title-name ng-binding">{{$item->product->name}}</div>
                    </div><br>
                    <div class="total hstack justify-content-between">
                      <div class="sl">Số lượng: <strong class="">{{$item->quantity}}</strong></div>
                        <div class="title ng-binding">{{number_format($item->price,0,',','.')}} đ</div>
                    </div>
                    <div class="total hstack justify-content-between color-video">
                      <div class="sl d-flex gap-2 align-items-center">Màu sắc: <div style="background-color:{{$item->color}}" class="swatche"></div></div>
                      <div class="sl">Size: <strong class="">{{$item->size}}</strong></div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="mt-3 py-3 ng-scope border-bottom">
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Tổng số lượng</div>
              <div class="price-tt">{{$order->total_quantity}} đơn hàng</div>
            </div>
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Tạm tính:</div>
              <div class="price-tt">{{number_format($order->total_money,0,',','.')}}đ</div>
            </div>
            <div class="py-1 hstack justify-content-between">
              <div class="text-total">Phí vận chuyển:</div>
              <div class="price-tt">40,000 đ</div>
            </div>
          </div>
          <div class="py-1 hstack justify-content-between pb-3">
            <div class="text-total fs-4">Tổng cộng:</div>
            <div class="price-tt fs-4 fw-bold text-primary">{{number_format($order->total_money + 40000 ,0,',','.')}}đ</div>
          </div>
        </div>
      </div>
    </div>
    
</body>
