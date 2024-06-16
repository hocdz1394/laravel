@extends("layout")
@section('title','Về chúng tôi')
@section('content')
<div class="main">
  <div class="row">
    <div class="col-6"><img class="w-100" src="asset/img/about1.png" alt=""></div>
    <div class="col-6">
      <h1 class="fw-bold" style="margin-top: 50%;">
        “Denny đang tạo ra những bộ trang phục sản xuất trong nước hoàn toàn có thể sánh ngang với các thương hiệu thời
        trang nam đến từ nước ngoài</h1>
      <p class="fs-6">Thời trang Denny thuyết phục khách hàng bằng từng kiểu dáng trang phục thiết kế độc quyền, sự sắc
        sảo trong mỗi đường nét cắt may, sử dụng chất liệu vải cao cấp và luôn hòa điệu cùng xu hướng quốc tế. Đây là
        con đường Denny theo đuổi và hướng đến phát triển bền vững.</p>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <h1 class="fw-bold" style="margin-top: 10%;">
        Được thành lập vào năm 2023 và khởi đầu chỉ là một cơ sở kinh doanh nhỏ, một Website bán hàng sơ khai với mặt
        hàng chủ yếu là áo thun.</h1>
      <p class="fs-6">Dù là chàng trai mạnh mẽ, cá tính hay chững chạc, nghiêm túc thì Dennyvẫn tin rằng mình có thể đáp
        ứng được nhu cầu mặc đẹp mỗi ngày cho bạn. Không chỉ mang lại sản phẩm đầy phong cách, kiểu dáng độc đáo mà
        chúng tôi còn cam kết chất lượng, các sản phẩm được kiểm duyệt kỹ lưỡng từ khâu chọn chất liệu đến thiết kế,
        hoàn thiện. Bởi vậy mặt hàng mà Denny cung cấp khi đến tay khách hàng sẽ mang lại sự hài lòng tuyệt đối.
      </p>
    </div>
    <div class="col-6"><img class="w-100" src="asset/img/about2.png" alt=""></div>
  </div>
  <video id="video" class="film video-js" data-setup="{'fluid': true, 'controls': false}" muted="" playsinline=""
    autoplay="" loop="">
    <source
      src="https://www.dropbox.com/scl/fi/milp6cy80n55edaqbw1r3/_import_60c5963b9920e8.61835599_FPpreview.mp4?rlkey=2wnkhr6uca0exn3yuqd25a5hn&amp;raw=1"
      type="video/mp4">
  </video>
  <div class="quesion text-center">
    <h1 class="fs-3 mt-4 fw-bold">BẠN CÓ CÂU HỎI GÌ KHÔNG?</h1>
    <h1 class=" fw-bold">LIÊN HỆ VỚI CHÚNG TÔI NGAY</h1>
    <p>Đội ngũ thân thiện của chúng tôi mong muốn liên hệ lại với bạn trong vòng 48 giờ.</p>
    <a class="btn btn-primary text-light mb-6" href="#">Liên hệ chúng tôi</a>
  </div>
</div>
@endsection