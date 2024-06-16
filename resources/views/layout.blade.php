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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body ng-app="myApp" ng-controller="myCtrl">
    <div class="container-fluid px-0">
        <!-- header -->
        @include('partials.header')
        <div ng-controller="viewCtrl" class="container top-90">
            <!-- nav danh mục trang -->
            @if (Route::CurrentRouteName() != 'home')
                <nav data-mdb-navbar-init class="navbar navbar-expand-lg bg-body-tertiary mb-4">
                    <div class="container-fluid d-flex align-content-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb align-items-center mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                            class=" fs-5 bi-house-door-fill"></i>Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><a class="fs-6 text-primary"
                                        href="#">@yield('title')</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </nav>
            @endif
            @yield('content')
        </div>
        @include('partials.footer')
    </div>
    <!-- MODAL PRODUCT  -->
    <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="modal-pro-img">
                                <img class="w-90 img-thumbnail" src="asset/product/@{{sp.image_product[0].path}}" alt="">
                            </div>
                            <div class="modal-pro-imgmini d-flex gap-4 w-100 mt-2">
                                <img src="img/aothu4.png" alt="" class="w-25 h-25 img-thumbnail">
                                <img src="img/aothu4.png" alt="" class="w-25 h-25 img-thumbnail">
                                <img src="img/aothu4.png" alt="" class="w-25 h-25 img-thumbnail">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="details-pro">
                                <h1 class="title-product hv fw-bold fs-4">@{{sp.name}}</h1>
                                {{-- <div class="thump-break hstack gap-3 my-2">
                                    <div class="brand">Thương hiệu: <span class="text-primary">Sudes</span></div>
                                    <div class="status">Tình trạng: <span class="text-primary">Còn hàng</span></div>
                                </div> --}}
                                <div class="price-box hstack gap-4 position-relative mb-3">
                                    <strong ng-if="sp.sale_price" class="text-primary h3">@{{sp.sale_price|number:0}}đ</strong>
                                    <label ng-if="sp.regular_price" class="text-decoration-line-through">@{{sp.regular_price|number:0}}</label>
                                </div>
                                <div class="ct-size mb-3">
                                    <div class="text-black mb-1">Kích thước: size S</div>
                                    <a href="#" class="btn btn-primary text-light">S</a>
                                    <a href="#" class="btn btn-default border ">M</a>
                                    <a href="#" class="btn btn-default border">L</a>
                                    <a href="#" class="btn btn-default border">XL</a>
                                </div>
                                <div class="ct-color mb-3">
                                    <div class="text-black mb-1">Màu sắc: Trắng</div>
                                    <div class="color-video d-flex align-items-center py-1">
                                        <div style="background-color:#ffffff" class="swatches"></div>
                                        <div style="background-color:#000000" class="swatches"></div>
                                        <div style="background-color:#15841e" class="swatches"></div>
                                        <div class="count-color">
                                            + 1
                                        </div>
                                    </div>
                                </div>
                                <div class="soluong pt-2">
                                    <div class="text-black mb-1">Số lượng</div>
                                    <div class="row gap-3">
                                        <div class="col-md-3 col-sm-3 col-md-offset-3">
                                            <div class="input-group">
                                                <div class="qty-input border">
                                                    <button class="qty-count qty-count--minus" data-action="minus"
                                                        type="button">-</button>
                                                    <input class="product-qty" type="number" name="product-qty"
                                                        min="0" max="10" value="1">
                                                    <button class="qty-count qty-count--add" data-action="add"
                                                        type="button">+</button>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="col-md-8 btn mb-3 col-sm-8 text-bg-light border hvbgpr"
                                            href="#"><i class="fs-6 bi bi-basket"></i>
                                            Thêm vào
                                            giỏ hàng</a>
                                    </div>
                                    <a href="#" class="col-12 fw-bold btn btn-primary hvbg text-light p-2">MUA
                                        NGAY</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CANVAS  -->
    <div class="offcanvas offcanvas-end " style="justify-items: center;" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header start-0">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Giỏ hàng của bạn</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div ng-repeat="sp in cart" class="row py-3">
                <div class="col-4">
                    <img class="w-100" src="{{ asset('/') }}upload/product/@{{ sp.image }}"
                        alt="">
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="title-name">@{{ sp.name }}</div>
                        <a><i ng-click="removeProductById($index)" class="text-danger fs-5 bi bi-trash3"></i></a>
                    </div>
                    <div class="total hstack">
                        <div class="input-group">
                            <div class="qty-input border">
                                <button class="qty-count qty-count--minus" data-action="minus"
                                    ng-click="sp.quantity=sp.quantity-1" type="button">-</button>
                                <input class="product-qty" type="number" ng-model="sp.quantity" name="product-qty"
                                    ng-click="increase()" min="0" value="@{{ sp.quantity }}">
                                <button class="qty-count qty-count--add" data-action="add"
                                    ng-click="sp.quantity=sp.quantity+1" type="button">+</button>
                            </div>
                        </div>
                        <td class="title">
                            @{{ sp.quantity * ((sp.sale_price != null) ? sp.sale_price : sp.regular_price) | number: 0 }} đ
                        </td>

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header vstack">

                <div class=" d-flex justify-content-between">
                    <p>Tổng số lượng:</p><strong>@{{ totalCartQuantity() }}</strong>
                    <!-- Vị trí này hiển thị -->
                </div>
                <div class=" d-flex justify-content-between">
                    <p>Tổng tiền:</p><strong ng-change="totalPrice()">@{{ totalCartMoney() | number: 0 }} đ</strong>
                </div>
            </div>
        </div>
        <a class="btn btn-primary text-light bottom-0 w-90 m-3" href="{{ route('cart') }}">Thanh toán</a>
    </div>

    <script src="{{ asset('asset/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('asset/js/angular.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.3/jquery-ui.min.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('asset/js/owl.js') }}"></script>
    {{-- Ngăn chặn hành động trên vùng message --}}
    <script>
        document.querySelectorAll('.dropdown-menu').forEach(function(dropdown) {
            dropdown.addEventListener('click', function(event) {
                event.stopPropagation();
            });
        });

        document.querySelector('.btn.btn-xs.btn-secondary').addEventListener('click', function() {
            var dropdownMenu = document.querySelector('.dropdown-menu.show');
            if (dropdownMenu) {
                var dropdown = bootstrap.Dropdown.getInstance(dropdownMenu.closest('.dropdown-toggle'));
                dropdown.toggle();
            }
        });
    </script>
    {{-- Range --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#slider-range").slider({
                orientation: "horizontal",
                range: true,
                min: 100000,
                max: 3000000,
                range: true,
                steps: 1000000,
                values: [100000, 1000000],
                slide: function(event, ui) {
                    $("#amount").val(ui.values[0] + "đ - " + ui.values[1] + "đ");
                    $("#start_price").val(ui.values[0]);
                    $("#end_price").val(ui.values[1]);
                }
            });
            $("#amount").val($("#slider-range").slider("values", 0) + " đ - " + $("#slider-range").slider("values",
                1) + " đ");

        });
    </script>


    {{-- End-range --}}
    {{-- Product-detail --}}
    <script>
        jQuery(document).ready(function() {
            var owl = jQuery('#owl-carousel8');
            jQuery('.img-thumbnail').on('click', function() {
                // Lấy vị trí của hình ảnh được click
                jQuery('.img-thumbnail').removeClass('activeThumbnail');
                jQuery(this).addClass('activeThumbnail');
                var imgIndex = jQuery('.img-thumbnail').index(this);
                // Hiển thị các phần tử tương ứng trong Owl Carousel
                owl.trigger('to.owl.carousel', imgIndex);
            });
        });
    </script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('myCtrl', function($scope, $http) {
            $scope.showPro = function(id) {
                $http.get('/api/product/'+ id).then(function(response) {
                    $scope.sp = response.data;
                })
            }

            $scope.quantity = 1;
            $scope.cart = {!! json_encode(session('cart')) !!} || [];
            $scope.addToCart = function(id_product, quantity, color, size, image) {
                var data = {
                    id_product: id_product,
                    quantity: quantity,
                    color: color,
                    size: size,
                    image: image
                }
                // console.log(data);1
                $http.post('/api/cart', data)
                    .then(function(response) {
                        // console.log(response.data.data);
                        $scope.cart = response.data.data;
                        alert(response.data.message);
                    });
            };
            $scope.totalCartMoney = function() {
                var total = 0;
                $scope.cart.forEach(sp => {
                    total += sp.quantity * ((sp.sale_price != null) ? sp.sale_price : sp.regular_price);
                });
                return total;
            }
            $scope.totalCartQuantity = function() {
                var total = 0;
                $scope.cart.forEach(sp => {
                    total += sp.quantity;
                });
                return total;
            }

            $scope.removeProductById = function(index) {
                var xn = confirm('Bạn muốn xoá sản phẩm này');
                if (xn == true) {
                    $http.delete('/api/cart/' + index).then(function(response) {
                        $scope.cart = response.data.data
                    });
                } else {
                    console.log("Hủy bỏ xóa sản phẩm.");
                }
            };
            $scope.updateQuantity = function(id, quantity) {
                $http.put('/api/cart/', {
                    quantity,
                    quantity
                }).then(function(response) {
                    $scope.cart = response.data.data;
                })
            }
            

            //Infor user
            $scope.orders = [];
            $scope.getUserOrders = function() {
                $http.get('/api/manager-order/orders').then(function(response) {
                    $scope.orders = response.data;
                    console.log($scope.orders);
                }, function(error) {
                    console.error('Error fetching data:', error);
                });
            }
            $scope.getUserOrders();
            //Inder detail user
            $scope.infor_order = function(id) {
                $http.get('/api/manager-order/infor/' + id).then(function(response) {
                    $scope.order = response.data;
                    console.log($scope.data);
                }, function(error) {
                    console.error('Error fetching data:', error);
                });
            };

            $scope.cancel_status = function(status, id) {
                $http.post('/api/manager-order/cancel_status/', {
                    status: status,
                    id: id
                }).then(function(response) {
                    $scope.data = response.data;
                    console.log($scope.data);
                }, function(error) {
                    console.error('Error fetching data:', error);
                });
            };

            //MESSAGE ZONE
            $scope.messages = [];
            $scope.newMessage = '';

            // Fetch messages
            $scope.get_message = function(id) {
                $http.get('/api/messages/' + id).then(function(response) {
                    $scope.messages = response.data;
                    console.log($scope.messages);
                }, function(error) {
                    console.error('Error fetching messages:', error);
                });
            }

            $scope.handel_message = function(message, sender_id) {
                // if ($scope.newMessage.trim() === '') return;
                var data = {
                    message: $scope.newMessage,
                    sender_id: sender_id
                }
                console.log(data);
                $http.post('/api/messages', data).then(function(response) {
                    $scope.messages.push(response.data);
                    $scope.newMessage = '';
                }, function(error) {
                    console.error('Error sending message:', error);
                });
            }
        });
        var viewFunction = function($scope) {};
    </script>
    @yield('viewFunction')
    <script>
        app.controller('viewCtrl', viewFunction)
    </script>
</body>

</html>
