<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
    function product(Request $request){
        $product_all = Product::pro_all();
        $get_category = Category::get_Category();
        $query = Product::query();
        if(isset($request->start_price)&&($request->start_price!=null)&& isset($request->end_price)&&($request->end_price!=null)){
            $query->whereBetween('sale_price', [$request->start_price, $request->end_price]);
        }

        if (isset($request->category) && $request->category != null) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('id', $request->category);
            });
        }
        if (isset($request->color) && is_array($request->color) && count($request->color) > 0) {
            $colors = array_map(function($color) {
                return "'" . $color . "'";
            }, $request->color);
            
            $colorString = implode(', ', $colors);
            $query->whereIn('color', $colors);
        }        
        // if(isset($request->color)&&($request->color!=null)){
        //     $color_str = $request->color . implode(',', $request->color);
        //     $query->where('color', $request->color);
        // }
        $product_all = $query->paginate(8);
        return view("product",compact('product_all','get_category'));
    }
    public function search(Request $request){
        $keyword = $request->input('keyword');
        $product_all = Product::where('name', 'LIKE', "%$keyword%")
        ->orderBy('id','DESC')
        ->paginate(8);
        return view('product', compact('product_all'));
    }

    function detail($id){
        $product = $this->productService->pro_one($id);
        $recmd_pro = Product::recommend($id);
        return view("detail", compact('product', 'recmd_pro'));
    }

    // api
    function show_product($id){
        $pro = Product::find($id)->with('detail_product','image_product')->first();
        return response()->json($pro);
    }
}


