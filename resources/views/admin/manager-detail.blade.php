@extends('admin.layout')
@section('title', 'Quản lý chi tiết sản phẩm')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button d-flex justify-content-between">

                        <h3>{{$get_product->name}}</h3>
                        <div class="col-sm-2 me-auto">
                            <form action="{{ route('add-detailp',['id', $reqnum]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-add btn-sm"  title="Thêm"><i
                                    class="fas fa-plus"></i>
                                Thêm chi tiết</button>
                                <input type="hidden" name="name" value="{{$get_product->name}}">
                                <input type="hidden" name="id_product" value="{{$reqnum}}">
                            </form>
                        </div>
                        <div class="col-sm-3">
                            <form class="d-flex ng-pristine ng-valid" role="search">
                                <input class="form-control me-2 mb-1 h-25" type="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-success btn-sm" type="submit">Search</button>
                            </form>
                        </div>
                        
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr class="text-center">
                                <th width="" class="">Id</th>
                                <th width="250px">Màu</th>
                                <th width="">Size</th>
                                <th width="">Số lượng</th>
                                <th width="" style="width: 150px;">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($get_detail as $index => $item)
                                <tr>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->id }}</td>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->color }}</td>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->size }}</td>
                                    <td style="vertical-align: middle;" class="text-center">{{ $item->quantity }}</td>
                            
                                    <td style="vertical-align: middle;" class="text-center">
                                        <form action="{{route('delete-detail-manager',['id'=>$item->id])}}"
                                            onclick="return confirm('Bạn muốn xoá chi tiết sản phẩm này!')"
                                            method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm" type="submit" title="Xóa">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        
                                        <form action="{{ route('edit-detailp', ['id' => $item->id]) }}" class="d-inline" method="post">
                                            @csrf
                                            <button class="btn btn-warning btn-sm" type="submit" title="Sửa"
                                                id="show-emp" data-toggle="modal" data-target="#ModalUP">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <input type="hidden" name="name" value="{{$get_product->name}}">
                                            <input type="hidden" name="id_product" value="{{$reqnum}}">
                                            <input type="hidden" name="id_detail" value="{{$item->id}}">
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!isset($get_detail[0]->id))
                        <div class="alert alert-danger">Chi tiết sản phẩm hiện đang trống vui lòng thêm chi tiết sản phẩm !</div>
                    @endif
                </div>
            </div>
            {{-- {{ $get_detail->links('pagination::bootstrap-5') }} --}}
        </div>
    </div>
    </main>

@endsection
