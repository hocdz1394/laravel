@extends('layout')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="ct main row mb-5 top-90">
        <div class="main-left col-12 col-md-12 col-lg-6">
            <div class="row">
                <div
                    class="main-left-left col-md-3 col-xl-2 col-12 order-2 order-md-1 gap-1 d-md-flex flex-wrap d-md-block d-sm-none">
                    @foreach ($product->image_product->take(4) as $item)
                            <a href="#"><img class="img-thumbnail" src="{{ asset('upload/product/' . $item->path) }}"
                                    alt=""></a>
                    @endforeach
                </div>
                <div class="main-left-right col-md-9 col-xl-10 col-12 order-1 order-md-2">
                    <div id="owl-carousel8" class="owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($product->image_product->take(4) as $item)
                                        <div class="owl-item">
                                            <img src="{{ asset('upload/product/' . $item->path) }}" alt="">
                                        </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="" method="POST" class="main-right col-12 col-md-12 col-lg-6">
            @csrf
            <div class="details-pro">
                <h1 class="title-product hv fs-3">{{ $product->name }}</h1>
                <div class="thump-break hstack gap-6 my-3">
                    <div class="brand">Thương hiệu: <span class="text-primary">Denny</span></div>
                    <div class="status">Tình trạng: <span class="text-primary">Còn hàng</span></div>
                </div>
                <div class="price-box hstack gap-4 position-relative mb-3">
                    @if (isset($product->sale_price))
                        <strong class="text-primary h3">{{ number_format($product->sale_price, 0, ',', '.') }} đ</strong>
                        <label class="text-decoration-line-through">{{ number_format($product->regular_price, 0, ',', '.') }}
                            đ</label>
                    @else
                        <strong class="text-primary h3">{{ number_format($product->regular_price, 0, ',', '.') }} đ</strong>
                    @endif
                    @if (isset($product->sale_price))
                        <div class="save ">
                            <img style="z-index: -1;" class="position-absolute top-0 me-6"
                                src="{{ asset('/') }}asset/img/union_-3.png" alt="">
                            <span class="zdex text-light ms-2 p-2 fs-6">Tiết kiệm:
                                {{ number_format($product->regular_price - $product->sale_price, 0, ',', '.') }} đ</span>
                        </div>
                    @endif
                </div>
                <div class="ct-voucher-product mb-4">
                    <div class="title text-black fs-5_5 mb-1">Các mã giảm giá có thể áp dụng:</div>
                    <div class="ct-vouchers hstack gap-5">
                        <div class="ct-voucher-thumb">
                            <div class="ct-voucher">HELLO</div>
                            <div class="ct-voucher">FREESHIP</div>
                            <div class="ct-voucher">SUDES50K</div>
                            <div class="ct-voucher">SUDES50</div>
                        </div>
                    </div>
                </div>
                <div class="ct-size mb-3">
                    <div class="text-black mb-1">Kích thước: Size</div>
                    @foreach ($product->detail_product->take(4) as $detail)
                        <div ng-model="size" onclick="selectSize(this)" class="btn btn-default border">{{ $detail->size }}</div>
                    @endforeach
                    @php
                        $imagePath = isset($product->image_product[0]->path) ? $product->image_product[0]->path : '';
                    @endphp
                        <input ng-model="image" type="hidden"  name="image" value="{{$imagePath}}">
                </div>
                <div class="ct-color mb-3">
                    <div class="text-black mb-1">Màu sắc: </div>
                    <div class="color-video d-flex align-items-center py-1">
                        @foreach ($product->detail_product->take(4) as $detail)
                            <div ng-model="color" style="background-color:{{ $detail->color }}"  onclick="selectColor(this)" class="swatches"></div>
                            {{-- <input type="hidden"  name="color" value="{{ $detail->id }}"> --}}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="soluong">
                <div class="text-black mb-1">Số lượng</div>
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-md-offset-3">
                        <div class="input-group">
                            
                                @php
                                    $totalqt=0;
                                @endphp
                            @foreach ($product->detail_product as $qt)
                                @php
                                    $totalqt += $qt->quantity;
                                @endphp
                            @endforeach
                            <input name="quantity" ng-model="quantity" class="form-control input-number" value="1" min="1" max="{{$totalqt}}"  type="number">
                            
                        </div>
                    </div>
                    <a ng-click="addToCart({{ $product->id }}, quantity, color, size, image)" class="col-md-9 btn mb-3 col-sm-9 text-bg-light border hvbgpr" href="javascript:void(0)"><i
                            class="fs-6 bi bi-basket"></i>
                        Thêm vào
                        giỏ hàng</a>
                </div>
                <a href="javascript:void(0)"  class="col-12 fw-bold btn btn-primary hvbg text-light p-2">MUA NGAY</a>
                <div class="chinhsach-pro row my-4">
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_1.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_2.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_3.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_4.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_5.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                    <div class="col-md-4 hstack gap-2 p-3 justify-content-sm-center">
                        <img src="{{ asset('asset/img/chinhsach_6.jpg') }}" alt="">
                        <span class="fs-6_5">Đổi trả cực dễ chỉ cần số điện thoại</span>
                    </div>
                </div>
                <div class="lienquan">
                    <div class="text-black mb-1 fw-bold mb-2">Bạn có thể phối cùng</div>
                    <div id="owl-carousel9" class="owl-carousel owl-theme owl-loaded">
                        <div class="owl-stage-outer">
                            <div class="owl-stage">
                                @foreach ($recmd_pro as $item)
                                    <div class="owl-item">
                                        <div class="card">
                                            <div class="img-spfl position-relative card-img-top">
                                                <img src="{{ asset('upload/product/' . $item->image_product[0]->path) }}" alt=""
                                                    class="sp">
                                                <div class="img-khung">
                                                    <img src="{{ asset('/') }}asset/img/title_image_1_tag.png"
                                                        class="mt position-absolute bottom-0 w-50" alt="">
                                                    <a class="hv" href=""><i
                                                            class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                                                </div>
                                                <div class="row">
                                                    <div class="action text-center position-absolute top-50">
                                                        <a href="#" class="mx-2"><i
                                                                class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                                                        <a href="#" class="mx-2"><i
                                                                class="bi bi-eye-fill ic ic2 hvbgpr"></i></a>
                                                        <a href="#" class="mx-2"><i
                                                                class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-title fw-bold fs-6 hv truncate">{{ $item->name }}
                                                </div>
                                                <div class="card-text row">
                                                    <span class="card-text-left col-auto me-auto fs-6_5">Nam</span>
                                                    <span class="card-text-right col-auto fs-6_5 ">Size S-Freesize</span>
                                                </div>
                                            </div>
                                            <div class="ms-2 price-box d-flex align-items-center justify-content-between mb-1">
                                                @if (isset($item->sale_price))
                                                <span class=" fs-5_5 fw-bold text-primary">{{number_format($item->sale_price,0,',','.') }} đ<span
                                                    class="fs-7 text-gray fw-light text-decoration-line-through start-0">{{number_format($item->regular_price,0,',','.') }} đ</span></span>
                                                    <div class="smart position-relative"><img class=""
                                                            src="{{ asset('asset/img/union.png')}}"
                                                            alt=""><span
                                                            class="fw-bold text-light zdex position-absolute r5 top-0">- {{round((($item->regular_price-$item->sale_price)/$item->regular_price)*100)}}%
                                                        </span></div>
                                                @else
                                                <span class="fs-5_5 fw-bold text-primary">{{number_format($item->regular_price,0,',','.') }} đ</span>
                                                
                                                @endif
                                            
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>
    <!-- hướng dẫn -->
    <div class="tabhd">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Thông tin sản
                    phẩm</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Hướng dẫn mua
                    hàng</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Đánh giá sản
                    phẩm</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mb-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                {!! $product->description !!}
                <div class="hinhmota vstack">
                    <div class="col-md-6 col-sm-12">
                        <img class="w-100" src="asset/img/motasp1.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img class="w-100" src="asset/img/motasp2.jpg" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img class="w-100" src="asset/img/motasp3.png" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img class="w-100" src="asset/img/motasp4.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                tabindex="0">
                <div class="rte my-2">
                    <p><strong>Bước 1:</strong>&nbsp;Truy cập website và lựa chọn sản phẩm&nbsp;cần mua</p>
                    <p><strong>Bước 2:</strong>&nbsp;Click và sản phẩm muốn mua, màn hình hiển thị ra pop up với các lựa
                        chọn
                        sau</p>
                    <p>Nếu bạn muốn tiếp tục mua hàng: Bấm vào phần tiếp tục mua hàng để lựa chọn thêm sản phẩm vào giỏ hàng
                    </p>
                    <p>Nếu bạn muốn xem giỏ hàng để cập nhật sản phẩm: Bấm vào xem giỏ hàng</p>
                    <p>Nếu bạn muốn đặt hàng và thanh toán cho sản phẩm này vui lòng bấm vào: Đặt hàng và thanh toán</p>
                    <p><strong>Bước 3:</strong>&nbsp;Lựa chọn thông tin tài khoản thanh toán</p>
                    <p>Nếu bạn đã có tài khoản vui lòng nhập thông tin tên đăng nhập là email và mật khẩu vào mục đã có tài
                        khoản trên hệ thống</p>
                    <p>Nếu bạn chưa có tài khoản và muốn đăng ký tài khoản vui lòng điền các thông tin cá nhân để tiếp tục
                        đăng ký tài khoản. Khi có tài khoản bạn sẽ dễ dàng theo dõi được đơn hàng của mình</p>
                    <p>Nếu bạn muốn mua hàng mà không cần tài khoản vui lòng nhấp chuột vào mục đặt hàng không cần tài khoản
                    </p>
                    <p><strong>Bước 4:</strong>&nbsp;Điền các thông tin của bạn để nhận đơn hàng, lựa chọn hình thức thanh
                        toán và vận chuyển cho đơn hàng của mình</p>
                    <p><strong>Bước 5:</strong>&nbsp;Xem lại thông tin đặt hàng, điền chú thích và gửi đơn hàng</p>
                    <p>Sau khi nhận được đơn hàng bạn gửi chúng tôi sẽ liên hệ bằng cách gọi điện lại để xác nhận lại đơn
                        hàng
                        và địa chỉ của bạn.</p>
                    <p>Trân trọng cảm ơn.</p>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                tabindex="0">
                <div class="alert alert-info alert-dismissible mt-3 section w-100" role="alert">
                    Bạn tiến hàng mua và cài app <a style="color: red" target="_blank" href=""
                        title="Đánh giá sản phẩm">Đánh
                        giá sản phẩm</a> mới sử dụng được tính năng này!
                </div>
            </div>
        </div>
    </div>
    <script>


    </script>
    {{-- <script>
        var selectedDiv = null;
        function selectSize(element) {
            // Lấy giá trị từ thẻ div đã nhấp vào
            var selectedSize = element.textContent.trim();
            // Kiểm tra nếu có div đã chọn trước đó, thì loại bỏ lớp CSS đã chọn
            if(selectedDiv !== null) {
                selectedDiv.classList.remove('btn-primary', 'text-light');
                selectedDiv.classList.add('btn-default', 'border');
            }
            // Thêm lớp CSS đã chọn cho div mới
            element.classList.remove('btn-default', 'border');
            element.classList.add('btn-primary', 'text-light');
            // Lấy thẻ input tương ứng và cập nhật giá trị của nó
            var inputField = element.nextElementSibling;
            inputField.value = selectedSize;
            console.log(inputField);
            selectedDiv = element;
        }
        var selectedTagDiv = null;
        function selectColor(element) {
            // Lấy giá trị từ thẻ div đã nhấp vào
            var selectedColor = rgbToHex(element.style.backgroundColor);
            // Kiểm tra nếu có div đã chọn trước đó, thì loại bỏ lớp CSS đã chọn
            if(selectedTagDiv !== null) {
                selectedTagDiv.classList.remove('swatchesAvtive');
            }
            // Thêm lớp CSS đã chọn cho div mới
            element.classList.add('swatchesAvtive');
            // Lấy thẻ input tương ứng và cập nhật giá trị của nó
            var inputField = element.nextElementSibling;
            inputField.value = selectedColor;
            console.log(inputField);
            selectedTagDiv = element;
        }
        function rgbToHex(rgb) {
            if (!rgb || rgb === 'transparent') return '';
            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ('0' + parseInt(x).toString(16)).slice(-2);
            }
            return '#' + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }
    </script> --}}

    
    
@endsection
@section('viewFunction')
    <script>
        viewFuncion = function($cope){
            $scope.quantity = 1;
        }
        // AngularJS function to handle size selection
        var selectedDiv = null;
        function selectSize(element) {
            var selectedSize = element.textContent.trim();
            if (selectedDiv !== null) {
                selectedDiv.classList.remove('btn-primary', 'text-light');
                selectedDiv.classList.add('btn-default', 'border');
            }
            element.classList.remove('btn-default', 'border');
            element.classList.add('btn-primary', 'text-light');
            // Assign selected size to the scope variable
            var scope = angular.element(element).scope();
            scope.$apply(function () {
                scope.size = selectedSize;
            });
            selectedDiv = element;
        }
    
        // Function to handle color selection
        var selectedTagDiv = null;
        function selectColor(element) {
            var selectedColor = rgbToHex(element.style.backgroundColor);
            if (selectedTagDiv !== null) {
                selectedTagDiv.classList.remove('swatchesAvtive');
            }
            element.classList.add('swatchesAvtive');
            // Assign selected color to the scope variable
            var scope = angular.element(element).scope();
            scope.$apply(function () {
                scope.color = selectedColor;
            });
            selectedTagDiv = element;
        }
    
        // Function to convert RGB to HEX color
        function rgbToHex(rgb) {
            if (!rgb || rgb === 'transparent') return '';
            rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
            function hex(x) {
                return ('0' + parseInt(x).toString(16)).slice(-2);
            }
            return '#' + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
        }
        
    </script>
@endsection