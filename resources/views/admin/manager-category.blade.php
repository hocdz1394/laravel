@extends('admin.layout')
@section('title', 'Danh sách danh mục')
@section('content')

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="row element-button d-flex justify-content-between">
            <div class="col-sm-2 me-auto">
              <a class="btn btn-add btn-sm" href="{{route('add-category')}}" title="Thêm"><i
                  class="fas fa-plus"></i>
                Thêm danh mục</a>
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
                <th width="" class="">Id</th>
                <th>Tên danh mục</th>
                {{-- <th width="">Ảnh</th> --}}
                <th width="">Mô tả</th>
                <th width="">Sethome</th>
                <th width="" style="width: 150px;">Chức năng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($get_category as $item)
                <tr>
                  <td class="text-center">{{$item->id}}</td>
                  <td class="text-center">{{$item->name}}</td>
                  {{-- <td class="text-center">
                    <img class="img-thumbnail" src="{{asset('../../img/'.$item->image)}}" alt="" width="70px;">
                  </td> --}}

                  @if (isset($item->description))
                    <td class="text-center">{{$item->description}}</td>
                  @else
                    <td class="text-center">Chưa có mô tả</td>
                  @endif

                  @if (isset($item->description))
                  <td class="text-center">
                    <button disabled class="badge btn btn-success">Đã kích hoạt</button>
                  </td>
                  @else
                  <td class="text-center">
                    <button disabled class="badge btn btn-secondary">Chưa kích hoạt</button>
                  </td>
                  @endif
                  <td class="text-center">
                    <form action="{{ route('delete-category', $item->id) }}" method="POST" style="display: inline;">
                      @csrf
                      @method('POST')
                      <button class="btn btn-danger btn-sm" onclick="return confirm('Bạn muốn xoá danh mục này')" type="submit" title="Xóa">
                          <i class="fas fa-trash-alt"></i>
                      </button>
                  </form>        
                  <a href="{{ url('admin/manager-category/edit-category', $item->id) }}">
                    <button class="btn btn-warning btn-sm"  type="button" title="Sửa" id="show-emp">
                      <i class="fas fa-edit"></i>
                    </button>
                    </a>          
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

<!--
MODAL THÊM
-->
{{-- <div class="modal fade py-4" id="ModalAdd" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"

data-keyboard="false">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg " role="document">
    <div class="modal-content">
      <div class="col-md-12 scrolling">
        <h3 class="tile-title mt-2 hstack gap-2 ">Thêm danh mục <div class="text-primary me-auto">
          </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </h3>
        <div class="tile">
          <form class="" method="POST">
            @csrf
            <div class="tile-body row">
              <div class="form-group col-md-6">
                <label class="control-label">Tên danh mục</label>
                <input class="form-control" name="name" type="text" required>
              </div>
              <div class="form-group col-md-3">
                <label class="control-label">Sethome</label> <br>
                <div class="row">
                  <label class="mb-0  ms-4" for=""><input type="checkbox" class="w-25" ng-model="editProduct.isFlashsale"
                      ng-init="editProduct.isFlashsale = false"></label>
                </div>
              </div>
              <div class="form-group col-md-12">
                <label class="control-label">Mô tả của chi tiết danh mục</label>
                <textarea ck-editor class="form-control"
                  name="description" id="mota"></textarea>
              </div>

            </div>
            <div class="footer hstack">
              <div class="me-auto"></div>
              <input class="btn btn-success" value="Lưu lại" type="submit">
              <a class="ms-2 btn btn-danger" data-dismiss="modal" href="#">Hủy bỏ</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div> --}}

<!--
MODAL
-->
{{-- <div class="modal fade" id="modalProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6 col-sm-12">
            <div class="modal-pro-img">
              <img class="w-90 img-thumbnail" src="" alt="">
            </div>
            <div class=" modal-pro-imgmini d-flex gap-4 w-100 mt-2">
              <img src="" alt="" class="w-25 h-25 img-thumbnail">
              <img src="" alt="" class="w-25 h-25 img-thumbnail">
              <img src="" alt="" class="w-25 h-25 img-thumbnail">
              <img src="" alt="" class="w-25 h-25 img-thumbnail">
            </div>
          </div>
          <div class="col-lg-6 col-sm-12">
            <div class="details-pro">
              <h1 class="title-product hv fw-bold fs-4">Áo thun mùa hè nóng bức</h1>
              <div class="thump-break vstack gap-3 my-2">
                <div class="brand hstack">
                  <div class="me-auto">Giá bán</div> <span class="text-primary">1,390,000đ</span>
                </div>
                <div class="status hstack">
                  <div class="me-auto">Giá niêm yết</div><span class="text-primary">1,000,000đ</span>
                </div>
              </div>
              <div class="thump-break vstack gap-3 my-2">
                <div class="brand hstack">
                  <div class="me-auto">Danh mục</div> <span class="text-primary">Áo</span>
                </div>
                <div class="status hstack">
                  <div class="me-auto">Thể loại</div><span class="text-primary">Nam</span>
                </div>
              </div>

              <div class="ct-size mb-3">
                <div class="text-black mb-1">Kích thước: size S</div>
                <a href="#" class="btn btn-primary text-light">S</a>
                <a href="#" class="btn btn-default border ">M</a>
                <a href="#" class="btn btn-default border">L</a>
                <a href="#" class="btn btn-default border">XL</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}
@endsection
