@extends('layout')
@section('title', 'Sản phẩm')
@section('content')
    <!-- main -->
    <div class="main-sp">
        <div class="banner row">
            <a href="#">
                <img class="w-100 rounded-2" src="{{ asset('asset/img/banner_collection.jpg') }}" alt="">
            </a>
        </div>
        <div class="voucher">
            <section class="voucher row my-4">
                <div id="owl-carousel11" class="owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                            <div class="owl-item">
                                <div class="item-voucher position-relative">
                                    <!-- <img src="img/subtract.png" alt="" class="img-voucher"> -->
                                    <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                                        <img id="img-coupon" class="mt-2 ms-1" src="{{ asset('asset/img/coupon_1.jpg') }}"
                                            alt="">
                                        <div class="content-voucher">
                                            <div class="content-top vstack">
                                                <strong class="fs-6">TẶNG BẠN MỚI</strong>
                                                <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                                            </div>
                                            <div class="content-btm hstack">
                                                <label class="vstack fs-6_5 text-primary">Nhập mã
                                                    <strong>HELLO</strong></label>
                                                <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao
                                                    chép</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-voucher position-relative">
                                    <img src="{{ asset('asset/img/subtract.png') }}" alt="" class="img-voucher">
                                    <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                                        <img id="img-coupon" class="mt-2 ms-1" src="{{ asset('asset/img/coupon_1.jpg') }}"
                                            alt="">
                                        <div class="content-voucher">
                                            <div class="content-top vstack">
                                                <strong class="fs-6">TẶNG BẠN MỚI</strong>
                                                <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                                            </div>
                                            <div class="content-btm hstack">
                                                <label class="vstack fs-6_5 text-primary">Nhập mã
                                                    <strong>HELLO</strong></label>
                                                <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao
                                                    chép</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-voucher position-relative">
                                    <img src="{{ asset('asset/img/subtract.png') }}" alt="" class="img-voucher">
                                    <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                                        <img id="img-coupon" class="mt-2 ms-1" src="{{ asset('asset/img/coupon_1.jpg') }}"
                                            alt="">
                                        <div class="content-voucher">
                                            <div class="content-top vstack">
                                                <strong class="fs-6">TẶNG BẠN MỚI</strong>
                                                <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                                            </div>
                                            <div class="content-btm hstack">
                                                <label class="vstack fs-6_5 text-primary">Nhập mã
                                                    <strong>HELLO</strong></label>
                                                <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao
                                                    chép</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="item-voucher position-relative">
                                    <img src="{{ asset('asset/img/subtract.png') }}" alt="" class="img-voucher">
                                    <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                                        <img id="img-coupon" class="mt-2 ms-1" src="{{ asset('asset/img/coupon_1.jpg') }}"
                                            alt="">
                                        <div class="content-voucher">
                                            <div class="content-top vstack">
                                                <strong class="fs-6">TẶNG BẠN MỚI</strong>
                                                <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                                            </div>
                                            <div class="content-btm hstack">
                                                <label class="vstack fs-6_5 text-primary">Nhập mã
                                                    <strong>HELLO</strong></label>
                                                <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao
                                                    chép</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <div class="sp-main">
                <div class="d-flex h1-sp mb-4">
                    <h1 class="me-auto h3">Tất cả sản phẩm</h1>
                    <div class="btn-group me-0">
                        <button type="button" class=" btn btn-primary text-white dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Xắp xếp:
                        </button>
                        <ul class="dropdown-menu sort-options">
                            <li><a class="dropdown-item" href="#" data-sort="name_asc">A-Z</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="name_desc">Z-A</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="price_asc">Giá tăng dần</a></li>
                            <li><a class="dropdown-item" href="#" data-sort="price_desc">Giá giảm dần</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row sp-main-sp-cl justify-content-between">
                    <div class="col-lg-3 d-sm-none d-lg-block">
                        <form action="{{ route('product') }}" method="get">
                            <div class="aside-cata mb-5">
                                <div class="aside-cata mb-5">
                                    <h3 class="fw-bold fs-5 mb-2">Chọn mức giá</h3>
                                    <form id="filter-form">
                                        {{-- Range --}}
                                        <div>
                                            <div id="slider-range"></div>
                                            <label for="amount"></label>
                                            <input type="text" id="amount" readonly=""
                                                style="border:0; color:#184ED7; font-weight:bold;">
                                            <input type="hidden" id="start_price" name="start_price[]" readonly="">
                                            <input type="hidden" id="end_price" name="end_price[]" readonly="">
                                        </div>
                                </div>
                                <h3 class="fw-bold fs-5 mb-2">Danh mục sản phẩm</h3>
                                <ul class="list-unstyled">
                                    @foreach ($get_category as $item)
                                        <li>
                                            <a>
                                                <input type="checkbox" data-filters="category"
                                                    value="{{ $item->id }}" name="category[]" id="">
                                                {{ $item->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="aside-cata mb-5">
                                <h3 class="fw-bold fs-5 mb-2">Chọn màu sắc</h3>
                                <ul class="list-unstyled">
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#14841E" name="color[]" id="">
                                        <div style="background-color:#14841E" class="swatches ms-2"></div>Xanh
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#EA6B60" name="color[]" id="">
                                        <div style="background-color:#EA6B60" class="swatches ms-2"></div>Đỏ
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#88523F" name="color[]" id="">
                                        <div style="background-color:#88523F" class="swatches ms-2"></div>Nâu
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#FEFE74" name="color[]" id="">
                                        <div style="background-color:#FEFE74" class="swatches ms-2"></div>Vàng
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#2229AF" name="color[]" id="">
                                        <div style="background-color:#2229AF" class="swatches ms-2"></div>Xanh lam
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#A41F98" name="color[]" id="">
                                        <div style="background-color:#A41F98" class="swatches ms-2"></div>Tím
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#FCECD7" name="color[]" id="">
                                        <div style="background-color:#FCECD7" class="swatches ms-2"></div>Be
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#b8b8b8" name="color[]" id="">
                                        <div style="background-color:#b8b8b8" class="swatches ms-2"></div>Xám
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#fff" name="color[]" id="">
                                        <div style="background-color:#fff" class="swatches ms-2"></div>Trắng
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <input type="checkbox" value="#000" name="color[]" id="">
                                        <div style="background-color:#000" class="swatches ms-2"></div>Đen
                                    </li>
                                </ul>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Lọc" class="btn btn-primary text-light">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9 col-md-12 row g-2" id="">
                        @foreach ($product_all as $product)
                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                <div class="card">
                                    <div class="img-spfl position-relative card-img-top">
                                        <img src="{{ asset('upload/product/' . $product->image_product[0]->path) }}"
                                            alt="" class="sp w-100">
                                        <div class="img-khung">
                                            <img src="{{ asset('asset/img/title_image_1_tag.png') }}"
                                                class="mt position-absolute bottom-0 w-50" alt="">
                                            <a class="hv" href=""><i
                                                    class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                                        </div>
                                        <div class="row">
                                            <div class="action text-center position-absolute top-50">
                                                <a href="#" class="mx-2"><i
                                                        class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                                                <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr"
                                                        data-bs-toggle="modal" data-bs-target="#modalProduct"></i></a>
                                                <a href="#" class="mx-2"><i
                                                        class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <a href="{{ route('detail', ['id' => $product->id]) }}">
                                            <div class="card-title fw-bold fs-5_5 hv truncate p-0">{{ $product->name }}
                                            </div>
                                        </a>
                                        {{-- <div class="card-text row">
                          <span class="card-text-left col-auto me-auto fs-6_5">Nam</span>
                          <span class="card-text-right col-auto fs-6_5 ">Size S-Freesize</span>
                      </div> --}}
                                        {{-- <div class="color-video d-flex align-items-center py-1">
                          <div style="background-color:#ffffff" class="swatches"></div>
                          <div style="background-color:#000000" class="swatches"></div>
                          <div style="background-color:#15841e" class="swatches"></div>
                          <div class="count-color">
                              + 1
                          </div>
                      </div> --}}
                                        <div class="price-box d-flex align-items-center justify-content-between mb-1">
                                            @if (isset($product->sale_price))
                                                <span
                                                    class="fs-5 fw-bold text-primary">{{ number_format($product->sale_price, 0, ',', '.') }}
                                                    đ<span
                                                        class="fs-6_5 text-gray fw-light text-decoration-line-through ms-3">{{ number_format($product->regular_price, 0, ',', '.') }}
                                                        đ</span></span>
                                                <div class="smart position-relative"><img class=""
                                                        src="{{ asset('asset/img/union.png') }}" alt=""><span
                                                        class="fw-bold text-light zdex position-absolute r5 top-0">-
                                                        {{ round((($product->regular_price - $product->sale_price) / $product->regular_price) * 100) }}%</span>
                                                </div>
                                            @else
                                                <span
                                                    class="fs-5 fw-bold text-primary">{{ number_format($product->regular_price, 0, ',', '.') }}
                                                    đ</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{ $product_all->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
