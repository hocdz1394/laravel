@extends('admin.layout')
@section('title', 'Danh sách đơn hàng')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button d-flex justify-content-between">
            <div class="col-sm-2 me-auto">
              <!-- <a class="btn btn-add btn-sm" href="{{route('add-product')}}" title="Thêm"><i class="fas fa-plus"></i>
                Thêm đơn hàng</a> -->
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
                <th width="" class="">Mã</th>
                <th>Khách hàng</th>
                <th style="width: 200px;">Địa chỉ</th>
                <th width="">Email</th>
                <th width="">Ngày tạo đơn</th>
                <th style="width: 80px;">Thanh toán</th>
                <th width="">Trạng thái thanh toán</th>
                <th width="">Trạng thái </th>
                <th width="">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($get_all as $item)
              <tr>
                <td class="text-center">{{$item->id}}</td>
                <td class="text-center">
                  {{$item->name}}
                </td>
                <td class="text-center">
                  {{$item->address}}
                </td>
                <td class="text-center">{{$item->email}}</td>
                <td class="text-center">{{ $item->created_at->format('d/m/Y') }}
                </td>
                <td style="width:30px;hieght:30px;" class="text-center">
                @if ($item->payment_method=='cod')
                  <img class="w-50" src="{{asset('../../asset/img/cod.webp')}}" alt="">
                @elseif($item->payment_method=='vnpay')
                  <img class="w-50" src="{{asset('../../asset/img/vnpay.jpeg')}}" alt="">
                  @elseif($item->payment_method=='momo')
                  <img class="w-50" src="{{asset('../../asset/img/momo.webp')}}" alt="">
                  @endif
                </td>
                <td class="text-center">
                  <div class="badge badge-secondary disabled rounded-2 btn-sm">Chờ thanh toán</div>
                </td>
                <td class="text-center">

                  <div ng-click="handel_status('{{ $item->status }}', {{ $item->id }})" 
                       ng-class="{
                           'btn btn-sm btn-primary rounded-3': '{{ $item->status }}' == 'Chờ xác nhận',
                           'btn btn-sm btn-dark rounded-3 ': '{{ $item->status }}' == 'Chuẩn bị hàng',
                           'btn btn-sm btn-secondary rounded-3 ': '{{ $item->status }}' == 'Đang vận chuyển',
                           'btn btn-sm btn-success rounded-3': '{{ $item->status }}' == 'Đã giao',
                           'btn btn-sm btn-warning rounded-3': '{{ $item->status }}' == 'Huỷ đơn',
                           'btn btn-sm btn-danger rounded-3': '{{ $item->status }}' == 'Đã huỷ'
                       }">
                      {{ $item->status == 'Chờ xác nhận' ? 'Duyệt đơn hàng' : 
                          ($item->status == 'Chuẩn bị hàng' ? 'Đóng gói' : 
                          ($item->status == 'Đang vận chuyển' ? 'Xuất kho' : 
                          ($item->status == 'Đã giao' ? 'Hoàn thành' :
                          ($item->status == 'Huỷ đơn' ? 'Xác nhận huỷ' : 'Đã huỷ'))))}}
                  </div>
              </td>
                <td class="text-center">
                  <button ng-click="infor_order({{$item->id}})" data-toggle="modal" data-target="#modalDonhang" class="btn btn-info btn-sm info pb-0 px-2"
                    type="button" title="chitiet">
                    <i class='bx bx-info-circle'></i>
                  </button>
                </td>
              </tr>
              @endforeach
            


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>


<!-- MODAL -->
<div class="modal fade pe-0" id="modalDonhang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="tile mb-0">
        <h3 class="tile-title hstack">
          <div class="me-auto">Chi tiết đơn hàng</div> <button type="button" class="btn-close" data-dismiss="modal"
            aria-label="Close"></button>
        </h3>
        <div class="tile-body">
          <div class="main">
            <div class="row justify-content-between mb-5">
              <div class=" col-12 px-7">

                <div class="row border">
                  <div class="your-order mb-1">
                    <h4 class="text-uppercase text-primary fw-bold mt-3">Đơn hàng: @{{data.id}}</h4>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Mã đơn hàng</div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-gray pt-1">@{{data.id}}</div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Tên khách hàng</div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-gray pt-1">@{{data.name}}</div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Số điện thoại</div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-gray pt-1">@{{data.phone}}</div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Địa chỉ giao hàng</div>
                      <div class="fs-6_5 text-gray pt-1"></div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-gray pt-1">@{{data.address}}
                      </div>
                    </div>
                  </div>

                  <div class="row px-3 mt-2">
                    <div class="col-6">Tổng sản phẩm</div>
                    <div class="col-6">
                      <div ng-repeat="sp in data.detail_order" class="p-3 table-responsive">
                          <div class="row py-3 ng-scope border-bottom border-top align-items-center">
                            <div class="col-3 ">
                              {{-- @if($item->product->image_product->isNotEmpty()) --}}
                                <img  class="w-75 img-thumbnail" src="@{{'../../upload/product/'+ sp.product.image_product[0].path }}" alt="">
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
                                <div class="sl d-flex gap-2 align-items-center">Màu sắc: <div style="background-color:@{{sp.color}};width: 18px;height: 18px;border: 1px solid #000;border-radius: 50%;margin-right: 5px;" class="swatche"></div></div>
                                <div class="sl">Size: <strong class="">@{{sp.size}}</strong></div>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Phương thức thanh toán</div>
                      <div class="fs-6_5 text-gray pt-1"></div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-gray pt-1 w-75">
                        <img ng-show="data.payment_method=='cod'" class="w-25" src="{{asset('../../asset/img/cod.webp')}}" alt="">
                        <img ng-show="data.payment_method=='vnpay'" class="w-25" src="{{asset('../../asset/img/vnpay.jpeg')}}" alt="">
                        <img ng-show="data.payment_method=='momo'" class="w-25" src="{{asset('../../asset/img/momo.webp')}}" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Tổng số lượng</div>
                      <div class="fs-6_5 text-gray pt-1"></div>
                    </div>
                    <div class="col-6">
                      <div class="fw-bold text-primary pt-1">@{{data.total_quantity}}
                      </div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Tổng tiền</div>
                      <div class="fs-6_5 text-gray pt-1"></div>
                    </div>
                    <div class="col-6">
                      <div class="fs-6_5 text-primary fw-bold pt-1">@{{data.total_money|number:0}} đ
                      </div>
                    </div>
                  </div>
                  <div class="row px-3 mt-2">
                    <div class="col-6">
                      <div class="fs-5">Tình trạng</div>
                      <div class="fs-6_5 text-gray pt-1"></div>
                    </div>
                    <div class="col-6">
                      <button class="bagde btn-wanning">Đang chờ giao</button>
                    </div>
                  </div>
                </div>


              </div>

            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
@section('viewFunction')
    <script>
      
    </script>
@endsection