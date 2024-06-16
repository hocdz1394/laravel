@extends("layout")
@section('title','Sale')
@section('content')
<div class="main-sp">
  <div class="banner row">
    <a href="#">
      <img class="w-100 rounded-2" src="{{asset('asset/img/sale1.jpg')}}" alt="">
    </a>
  </div>
  <div class="voucher">
    <section class="voucher row my-4">
      <div id="owl-carousel11" class="owl-carousel owl-theme owl-loaded">
        <div class="owl-stage-outer">
          <div class="owl-stage">
            <div class="owl-item">
              <div class="item-voucher position-relative">
                <!-- <img src="/img/subtract.png" alt="" class="img-voucher"> -->
                <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                  <img id="img-coupon" class="mt-2 ms-1" src="{{asset('asset/img/coupon_1.jpg')}}" alt="">
                  <div class="content-voucher">
                    <div class="content-top vstack">
                      <strong class="fs-6">TẶNG BẠN MỚI</strong>
                      <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                    </div>
                    <div class="content-btm hstack">
                      <label class="vstack fs-6_5 text-primary">Nhập mã <strong>HELLO</strong></label>
                      <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao chép</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="owl-item">
              <div class="item-voucher position-relative">
                <img src="{{asset('asset/img/subtract.png')}}" alt="" class="img-voucher">
                <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                  <img id="img-coupon" class="mt-2 ms-1" src="{{asset('asset/img/coupon_1.jpg')}}" alt="">
                  <div class="content-voucher">
                    <div class="content-top vstack">
                      <strong class="fs-6">TẶNG BẠN MỚI</strong>
                      <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                    </div>
                    <div class="content-btm hstack">
                      <label class="vstack fs-6_5 text-primary">Nhập mã <strong>HELLO</strong></label>
                      <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao chép</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="owl-item">
              <div class="item-voucher position-relative">
                <img src="{{asset('asset/img/subtract.png')}}" alt="" class="img-voucher">
                <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                  <img id="img-coupon" class="mt-2 ms-1" src="{{asset('asset/img/coupon_1.jpg')}}"" alt="">
                  <div class="content-voucher">
                    <div class="content-top vstack">
                      <strong class="fs-6">TẶNG BẠN MỚI</strong>
                      <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                    </div>
                    <div class="content-btm hstack">
                      <label class="vstack fs-6_5 text-primary">Nhập mã <strong>HELLO</strong></label>
                      <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao chép</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="owl-item">
              <div class="item-voucher position-relative">
                <img src="{{asset('asset/img/subtract.png')}}" alt="" class="img-voucher">
                <div class="khung-voucher d-flex gap-4 position-absolute top-0 p-2">
                  <img id="img-coupon" class="mt-2 ms-1" src="{{asset('asset/img/coupon_1.jpg')}}"" alt="">
                  <div class="content-voucher">
                    <div class="content-top vstack">
                      <strong class="fs-6">TẶNG BẠN MỚI</strong>
                      <span class="fs-7">Giảm 15% cho đơn hàng đầu tiên từ 699K</span>
                    </div>
                    <div class="content-btm hstack">
                      <label class="vstack fs-6_5 text-primary">Nhập mã <strong>HELLO</strong></label>
                      <a href="#" class="btn btn-primary text-light rounded-5 hvbg fs-7">Sao chép</a>
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
      <div class="titleSale text-center">
        <p class="fs">Chương trình bắt đầu sau: 2 giờ 29 phút 3s</p>
        <div class="inb justify-content-center  hstack gap-4">
          <a href="" class="btn text-light btn-primary rounded-5 px-3 ">Quần</a>
          <a href="" class="btn btn-outline-primary rounded-5 px-3 ">Áo</a>
        </div>
        <h1 class="fw-bold pt-5 pb-3">Quần</h1>
      </div>
      <div class="row sp-main-sp-cl justify-content-between">

        <div class="col-lg-12 col-md-12 row g-2">
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-xl-3 col-sm-6">
            <div class="card">
              <div class="img-spfl position-relative card-img-top">
                <img src="{{asset('upload/product/newpro1.png')}}" alt="" class="sp w-100">
                <div class="img-khung">
                  <img src="{{asset('asset/img/title_image_1_tag.png')}}" class="mt position-absolute bottom-0 w-50" alt="">
                  <a class="hv" href=""><i
                      class="bi bi-qr-code-scan position-absolute top-0 m-4 text-primary zdex hv"></i></a>
                </div>
                <div class="row">
                  <div class="action text-center position-absolute top-50">
                    <a href="#" class="mx-2"><i class="bi bi-sliders ic ic1 hvbgpr"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-eye-fill ic ic2 hvbgpr" data-bs-toggle="modal"
                        data-bs-target="#modalProduct"></i></a>
                    <a href="#" class="mx-2"><i class="bi bi-heart-fill ic ic3 hvbgpr"></i></a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="card-title fw-bold fs-5_5 hv truncate">Áo Sơ Mi Nam Tay Dài Kẻ Sọc Seesucker Form
                </div>
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
                  <span class="fs-5 fw-bold text-primary">390.000₫ <span
                      class="fs-6_5 text-gray fw-light text-decoration-line-through start-0">690.000₫</span></span>
                  <div class="smart position-relative"><img class="" src="{{asset('asset/img/union.png')}}" alt=""><span
                      class="fw-bold text-light zdex position-absolute r5 top-0">- 43% </span></div>
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