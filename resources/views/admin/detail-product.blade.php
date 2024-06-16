@extends('admin.layout')
@section('title', 'Danh sách chi tiết sản phẩm')
@section('content')
    <div class="row">
        <div class="tile mb-0">
            <h3 class="tile-title hstack mb-0">
                <div class="me-auto">Chi tiết sản phẩm</div>
            </h3>
            <div class="tile-">
                <div class="main">
                    <div class="row justify-content-between mb-5">
                        <div class=" col-12 px-7">
                            <div class="row p-4">
                                <div class="col-6">
                                    <h4 class=" text-primary fw-bold mt-3">Chi tiết sản phẩm</h4>
                                    <form action="{{route('detail-mangerp', ['id' => $get_proId->id])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_product" value="{{ $get_proId->id }}">
                                        <input type="hidden" name="name" value="{{ $get_proId->name }}">
                                        <button type="submit" class="text-decoration-none btn btn-info">
                                            <div class="">Quản lý chi tiết</div>
                                        </button>
                                    </form>
                                    <div class="row px-3 mt-2 fs-6">Tên sản phẩm: {{ $get_proId->name }}</div>
                                    <div class="row px-3 mt-2 fs-6">Giá thường:
                                        {{ number_format($get_proId->regular_price, 0, ',', '.') }} đ</div>
                                    @if (isset($get_proId->sale_price))
                                        <div class="row px-3 mt-2 fs-6">Giá giảm:
                                            {{ number_format($get_proId->sale_price, 0, ',', '.') }} đ</div>
                                    @else
                                        <div class="row px-3 mt-2 fs-6">Giá giảm: Sản phẩm không có khuyến mãi.</div>
                                    @endif
                                    <div class="row px-3 mt-2 fs-6">Thể loại: {{ $get_proId->gender }}</div>
                                    {{-- <div class="row px-3 mt-2 fs-6">Trạng thái: {{$get_proId->fla}}</div> --}}
                                </div>
                                <div class="col-6">
                                    <h4 class=" text-primary fw-bold mt-3">Hình ảnh của sản phẩm</h4>
                                    <ul style="list-style: none;">
                                        <li class="position-relative d-flex">
                                            @foreach ($get_img_detail as $item)
                                                <form action="{{ route('detail-image', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    {{-- @method('DELETE') --}}
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger borer-0 position-absolute"
                                                        onclick="return confirm('Bạn muốn xoá hình ảnh này !')">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                                <div class="w-25 d-flex" style=" max-height:220px; " class="">
                                                    <img class="p-3 w-100 thumbnail" data-toggle="tooltip"
                                                        data-placement="bottom"
                                                        src="{{ asset('../../upload/product/' . $item->path) }}"
                                                        alt="">
                                                </div>
                                            @endforeach
                                        </li>
                                        <li>
                                            <form action="{{ route('detail-product', ['id' => $get_proId->id]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="w-25 d-flex" style=" max-height:220px;" class="">
                                                    <img class="p-3 w-100 thumbnail" id="thumbnail" data-toggle="tooltip"
                                                        data-placement="bottom" title="Thêm hình ảnh "
                                                        src="{{ asset('../../asset/img/icon-add-image.jpeg') }}"
                                                        alt="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-custom-class="custom-tooltip"
                                                        data-bs-title="Thêm hình ảnh.">
                                                    <input type="file" class="mt-2 p-3" name="images[]" multiple
                                                        onchange="changeImg(this); this.form.submit()"
                                                        accept="image/x-png,image/gif,image/jepg,image/webp,image/jpg,image/jpeg"
                                                        class="image form-control-file" style="display:none;"
                                                        id="fileInput">
                                                    <input type="hidden" value="{{ $get_proId->id }}" name="id_product">
                                                </div>
                                            </form>

                                        </li>
                                    </ul>

                                </div>
                            </div>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var imgElement = document.getElementById('thumbnail');
            var fileInput = document.getElementById('fileInput');

            imgElement.addEventListener('click', function() {
                fileInput.click();
            });
            // Khởi tạo tooltip
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
    <script>
        function changeImg(input) {
            if (input.files && input.files.length > 0) {
                $('#thumbnail').empty(); // Clear previous images
                for (var i = 0; i < input.files.length; i++) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#thumbnail').append('<img class="p-3 w-100" src="' + e.target.result + '" alt="">');
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>
@endsection
