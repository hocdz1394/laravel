@extends('admin.layout')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button d-flex justify-content-between">
                        <div class="col-sm-2 me-auto">
                            <a class="btn btn-add btn-sm" href="{{ route('add-product') }}" title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Thêm sản phẩm</a>
                        </div>
                        <div class="col-sm-3">
                            <form class="d-flex ng-pristine ng-valid" role="search">
                                <input class="form-control me-2 mb-1 h-25" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button  class="btn btn-outline-success btn-sm" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr class="text-center">
                                <th width="" class="">Id</th>
                                <th width="250px">Tên sản phẩm</th>
                                <th width="">Ảnh</th>
                                <th width="">Số lượng</th>
                                <th width="">Giá bán</th>
                                <th  width="">Thể loại</th>
                                <th width="">Trạng thái</th>
                                <th width="" style="width: 150px;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($get_allpro as $index => $item)
                                <tr>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->id }}</td>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->name }}</td>
                                    <td style="vertical-align: middle;" class="text-center">
                                        @if (isset($item->image_product[0]))
                                            <img class="img-thumbnail"
                                                src="{{ asset('/../../upload/product/' . $item->image_product[0]->path) }}"
                                                alt="" width="70px;">
                                        @endif
                                        {{-- @endforeach --}}
                                    </td>
                                    <td style="vertical-align: middle;" class="text-center">
                                    @php
                                        $totalQuantity=0;
                                    @endphp
                                    @if ($item->detail_product)
                                        @foreach ($item->detail_product as $qt)
                                            @php
                                                $totalQuantity += $qt->quantity;
                                            @endphp
                                        @endforeach
                                        {{$totalQuantity}}
                                    @else
                                        0
                                    @endif
                                    
                                    </td>
                                    @if (isset($item->sale_price))
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ number_format($item->sale_price, 0, ',', '.') }} đ</td>
                                    @else
                                        <td style="vertical-align: middle;" class="text-center">
                                            {{ number_format($item->regular_price, 0, ',', '.') }} đ</td>
                                    @endif
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->gender }}</td>
                                    @if (now()->diffInDays($item->created_at) >= 10)
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button disabled class="badge btn btn-secondary">Tồn kho</button>
                                        </td>
                                    @else
                                        <td style="vertical-align: middle;" class="text-center">
                                            <button disabled class="badge btn btn-primary">Mới nhập</button>
                                        </td>
                                    @endif
                                    <td style="vertical-align: middle;" class="text-center">
                                        <a class="text-decoration-none" href="{{ route('detail-product', ['id' => $item->id]) }}">
                                            <button data-toggle="modal" data-target="#modalProduct"
                                                class="btn btn-info btn-sm info pb-0 px-2" type="button" title="chitiet">
                                                <i class='bx bx-info-circle'></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('delete-product', $item->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Bạn muốn xoá sản phẩm này!')" type="submit"
                                                title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('edit-product', ['id' => $item->id]) }}">
                                            <button class="btn btn-warning btn-sm" type="button" title="Sửa"
                                                id="show-emp" data-toggle="modal" data-target="#ModalUP">
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
            {{ $get_allpro->links('pagination::bootstrap-5') }}
        </div>
    </div>
    </main>

    <!--
            MODAL
            -->
    {{-- <div class="modal fade py-4" id="modalProduct" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static"
        data-keyboard="false">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl " role="document">
            <div class="modal-content">
                <div class="col-md-12 scrolling">
                    <h3 class="tile-title mt-2 hstack gap-2 ">Thêm sản phẩm <div class="text-primary me-auto">
                        </div><button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </h3>
                    <div class="tile">
                        <form  class="">
                            <div class="tile-body row">
                                <div class="form-group col-md-3">
                                    <label class="control-label">Tên sản phẩm</label>
                                    <input ng-model="editProduct.name" class="form-control" type="text" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="exampleSelect1" class="control-label">Danh mục</label>
                                    <select class="form-control" ng-model="editProduct.categories_id" id="exampleSelect1"
                                        required="required">
                                    </select>
                                </div>
                                <div class=" form-group col-md-3">
                                    <label class="control-label">Giá thường</label>
                                    <input ng-model="editProduct.price" class="form-control" type="text" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Giá sale</label>
                                    <input ng-model="editProduct.listed_price" class="form-control" type="text"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label">Trạng thái</label> <br>
                                    <div class="row">
                                        <label class="mb-0" for=""><input type="checkbox"
                                                ng-model="editProduct.isFlashsale"
                                                ng-init="editProduct.isFlashsale = false"> Flash sale</label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-0" for=""><input type="checkbox"
                                                ng-model="editProduct.isNewproducts"
                                                ng-init="editProduct.isNewproducts = false"> Sản phẩm mới</label>
                                    </div>
                                    <div class="row">
                                        <label class="mb-0" for=""><input type="checkbox"
                                                ng-model="editProduct.isFeature" ng-init="editProduct.isFeature = false">
                                            Sản phẩm nổi bật</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Thể loại</label> <br>
                                    <div class="hstack gap-2"><input type="radio" name="gender"
                                            ng-model="editProduct.gender" value="Nam" id="">
                                        <div class="">Nam</div>
                                    </div>
                                    <div class="hstack gap-2"><input type="radio" name="gender"
                                            ng-model="editProduct.gender" value="Nữ" id="">
                                        <div class="">Nữ</div>
                                    </div>
                                    <div class="hstack gap-2"><input type="radio" name="gender"
                                            ng-model="editProduct.gender" value="Unisex" id="">
                                        <div class="">Unisex</div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="control-label">Ảnh chính & ảnh chi tiết 1,2,3</label>
                                    <div id="myfileupload">
                                        <input type="file" accept="image/*" multiple="multiple" />
                                    </div>
                                    <div class="w-50">
                                        <img class="w-100 img-thumbnail" src="" style="max-width: 200px;"><br>
                                        <br>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <img class="w-100 img-thumbnail" src=""
                                                style="max-width: 200px;"><br>
                                        </div>
                                        <div class="col-3">
                                            <img class="w-100 img-thumbnail" src=""
                                                style="max-width: 200px;"><br>
                                        </div>
                                        <div class="col-3">
                                            <img class="w-100 img-thumbnail" src=""
                                                style="max-width: 200px;"><br>
                                        </div>
                                        <div class="col-3">

                                            <img class="w-100 img-thumbnail" src="../../img/"
                                                style="max-width: 200px;"><br>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Mô tả của chi tiết sản phẩm</label>
                                    <textarea ck-editor ng-model="editProduct.product_detail[0].infor_detail" class="form-control" name="mota"
                                        id="mota"></textarea>
                                </div>

                            </div>
                            <div class="footer hstack">
                                <div class="me-auto"></div>
                                <button class="btn btn-success" type="submit">Lưu lại</button>
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

@endsection
