<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class BillController extends Controller
{
    function view_bill($id){
        // $bill = Order::where('id', $id)->first();
        $bill = Order::with('detail_order.product.image_product')->find($id);
        // $pro_inbill = Product::where();
        return view('bill',compact('bill'));
    }
}
