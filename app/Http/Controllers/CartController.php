<?php

namespace App\Http\Controllers;

use App\Models\ImageProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // session()->forget('cart');
        return view("cart");
    }
    public function handelform(Request $request){
        $sl = $request->all();
        redirect()->route('checkout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        //Check có cart hay chưa?
        if (empty(session('cart'))) {
            session()->put('cart', []);
        }

        $cart = session('cart');
        $inCart = false;
        // Check sản phẩm đã có trong giỏ hàng -> Tăng số lượng
        foreach ($cart as $key => $item) {
            if (isset($item['id']) && $item['id'] == $request->id_product) {
                $cart[$key]['quantity'] += $request->quantity;
                $inCart = true;
                break;
            }
        }

        // Check sản phẩm chưa có trong giỏ hàng -> Thêm sản phẩm mới
        if (!$inCart) {
            $img = ImageProduct::where('id_product', $request->id_product)->first();
            $sp = Product::select('id', 'name', 'quantity', 'gender', 'flash_sale', 'features', 'id_categories', 'regular_price', 'sale_price', 'created_at', 'updated_at')
                         ->find($request->id_product);
            if ($sp) {
                $sp->quantity = $request->quantity;
                $sp->color = $request->color;
                $sp->size = $request->size;
                $sp->image = $img->path;

                session()->push('cart', $sp);
            } else {
                return response()->json([
                    "status" => false,
                    "message" => "Sản phẩm không tồn tại."
                ], 404);
            }
        }

        $response = [
            "status" => true,
            "message" => "Đã thêm vào giỏ hàng.",
            "data" => session('cart')
        ];
        return response()->json($response, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        foreach (session('cart') as $sp) {
            if($sp->id==$id){
                $sp->quantity = $request->quantity;
                break;
            }
        }
        $response = [
            "status" => true,
            "message" => "Đã cập nhật số lượng sản phẩm thành công.",
            "data" => session('cart')
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = session('cart');
        session()->forget('cart');
        array_splice($cart,$id,1);
        session()->put('cart', $cart);
        $response = [
            "status" => true,
            "message" => "Đã xoá sản phẩm thành công.",
            "data" => session('cart')
        ];
        return response()->json($response, 200);
    }
}
