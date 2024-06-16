@extends("layout")
@section('title','Liên hệ')
@section('content')
<div class="main lh row">
  <div class="lh-left col-md-6 col-sm-12">
    <div class="row row1">
      <h1 class="h4 fw-bold mb-4">Cửa hàng Denny Fashion</h1>
      <div class="lh-contact row">
        <div class="lh-contact-item col-md-6 d-flex">
          <i class="bi bi-geo-alt-fill"></i>
          <div class="hl-text vstack">
            <strong>Địa chỉ</strong>
            <p class="fs-6_5">70 Lữ Gia, Phường 15, Quận 11, TP. HCM</p>
          </div>
        </div>
        <div class="lh-contact-item col-md-6 d-flex">
          <i class="bi bi-clock-fill"></i>
          <div class="hl-text vstack">
            <strong>Thời gian làm việc</strong>
            <p class="fs-6_5">8h - 22h
              Từ thứ 2 đến chủ nhật</p>
          </div>
        </div>
        <div class="lh-contact-item col-md-6 d-flex">
          <i class="bi bi-telephone"></i>
          <div class="hl-text vstack">
            <strong>Hotline</strong>
            <p class="fs-6_5">1900 6750</p>
          </div>
        </div>
        <div class="lh-contact-item col-md-6 d-flex">
          <i class="bi bi-geo-alt-fill"></i>
          <div class="hl-text vstack">
            <strong>Email</strong>
            <p class="fs-6_5">support@sapo.vn</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row row2">
      <h1 class="h4 fw-bold my-4">Liên hệ với chúng tôi</h1>
      <p class="fs-6">Nếu bạn có thắc mắc gì, có thể gửi yêu cầu cho chúng tôi, và chúng tôi sẽ liên lạc lại với
        bạn sớm nhất có thể .</p>
      <form class="mb-2" action="">
        <input class="form-control mb-2" placeholder="Nhập tên" type="text" name="" id="">
        <input class="form-control mb-2" placeholder="Nhập Email" type="email" name="" id="">
        <input class="form-control mb-2" placeholder="Điện thoại" type="text" name="" id="">
        <textarea class="form-control content-area form-control-lg" name="" id="" cols="77">Nội dung</textarea>
        <input class="form-control btn btn-primary text-light mt-2" value="Gửi thông tin" type="submit">
      </form>
    </div>

  </div>
  <div class="lh-right col-md-6 col-sm-12">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443592406524!2d106.62525347525845!3d10.853826357760815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1710887636961!5m2!1svi!2s"
      width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
</div>
@endsection