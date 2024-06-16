<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\DetailProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class AdmProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    function qlsanpham(){
        $get_allpro = Product::get_allpro();
        return view("admin.manager-product", compact('get_allpro'));
    }
    // ADMIN CONTROLLER ZONE
    function add_sanpham(){
        $get_category = Category::all();
        return view("admin.add-product",compact('get_category'));
    }
    function create_sanpham(AddProductRequest $request){
        $this->productService->add_product($request);
        return redirect()->route('manager-product');
    }
    function edit_sanpham(Request $request, $id){
        $get_category = Category::all();
        $get_productId = $this->productService->get_productId($id);
        return view("admin.edit-product",compact('get_productId', 'get_category'));
    }
    function update_sanpham(UpdateProductRequest $request, $id){
        $this->productService->update_product($request,$id);
        return redirect()->route('manager-product');
    }
    function delete_product($id){
        $this->productService->delete_product($id);
        return redirect()->back();
    }
    //detail-img
    function qldetail($id){
        $get_img_detail = $this->productService->get_img_detail($id);
        $get_proId = $this->productService->get_productId($id);
        return view('admin.detail-product', compact('get_img_detail','get_proId'));
    }
    function create_detail(Request $request, $id){
        $this->productService->create_detailImg($request, $id);
        return redirect()->route('detail-product',['id'=> $id]);
    }
    function detete_image($id){
        $this->productService->del_imgpro($id);
        return redirect()->back();
    }
    //detai-product
    function ql_chitiet(Request $request, $id){
        $getId_detail = DetailProduct::find($id);
        $req = explode('/', $request->fullUrl());
        $reqnum = end($req);

        $get_product = Product::where('id', $reqnum)->first();
        $get_detail = $this->productService->get_detail($id);
        return view('admin.manager-detail', compact('get_product','get_detail','reqnum'));
    }
    function add_chitiet(Request $request){
        // $request->all;
        // dd($request);
        $keykeep = $request->input('id_product');
        $namekeep = $request->input('name');
        return view('admin.add-detail', compact('namekeep', 'keykeep'));
    }
    function create_chitiet(Request $request){
        // Lấy dữ liệu từ request
        $data = $request->only(['color', 'size', 'quantity' ,'id_product']);
        
        // Chuyển đổi tên màu sang mã màu
        switch (strtolower($data['color'])) {
            case 'đen':
                $data['color'] = '#000';
                break;
            case 'trắng':
                $data['color'] = '#fff';
                break;
            case 'xanh':
                $data['color'] = '#14841E';
                break;
            case 'đỏ':
                $data['color'] = '#EA6B60';
                break;
            case 'nâu':
                $data['color'] = '#88523F';
                break;
            case 'vàng':
                $data['color'] = '#FEFE74';
                break;
            case 'xanh lam':
                $data['color'] = '#2229AF';
                break;
            case 'tím':
                $data['color'] = '#A41F98';
                break;
            case 'be':
                $data['color'] = '#FCECD7';
                break;
            case 'xám':
                $data['color'] = '#b8b8b8';
                break;
            default:
                $data['color'] = null;
                break;
        }
    
        // Tạo mới chi tiết sản phẩm
        DetailProduct::create($data);
    
        // Lấy id_product từ request và chuyển hướng về trang quản lý chi tiết sản phẩm
        $id_product = $request->input('id_product');
        return redirect('/admin/manager-product/detail-product/manager-detail/'.$id_product);
    }
    
    function viewEdit_chitiet(Request $request,$id){
        $getId_detail = DetailProduct::find($id);
        $req = explode('/', $request->fullUrl());
        $reqnum = end($req);

        $name = $request->input('name');
        $id_detailk = $request->input('id_product');
        
        $get_product = Product::where('id', $reqnum)->first();
        return view('admin.edit-detail', compact('getId_detail','reqnum','get_product','name','id_detailk'));
    }
    function update_chitiet(Request $request, $id){
        $detail = DetailProduct::find($id);
        $data = $request->only(['color', 'size', 'quantity' ,'id_product']);
        $detail->update($data);
        $id_product = $request->input('id_product');
        // dd($data);\
        return redirect('/admin/manager-product/detail-product/manager-detail/'.$id_product);
    }
    function delete_chitiet(Request $request, $id){
        $data = DetailProduct::find($id);
        $data->delete();
        return redirect()->back();
    }
    // END ADMIN CONTROLLER ZONE
}

