<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function qldonhang(){
        $get_all = Order::orderBy('created_at','desc')->take(10)->get();
        return view("admin.manager-order",compact('get_all'));
    }
    public function index($id)
    {
        $bill =Order::with('detail_order.product.image_product')->find($id);
        return response()->json($bill);
    }
    public function show_billuser()
    {
        $user = Auth::user();
        $orders = Order::where('id_user', $user->id)->with('detail_order.product.image_product')->orderBy("created_at",'desc')->get();

        return response()->json($orders);
    }
    public function status(Request $request)
    {
        $status = $request->input('status');
        $id_product = $request->input('id_product');


        // Update status based on current status
        if ($status == 'Chờ xác nhận') {
            $status = 'Chuẩn bị hàng';
        } elseif ($status == 'Chuẩn bị hàng') {
            $status = 'Đang vận chuyển';
        } elseif ($status == 'Đang vận chuyển') {
            $status = 'Đã giao';
        } 
        
        if($status == 'Huỷ đơn') {
            $status = 'Đã huỷ';
        }
        // Find order by ID and update status
        $order = Order::find($id_product);
        if ($order) {
            $order->status = $status;
            $order->save();
            return response()->json(['data' => $order, 'message' => 'Cập nhật trạng thái thành công.']);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }
    public function cancel_status(Request $request)
    {
        $status = $request->input('status');
        $id_product = $request->input('id');


        
        if ($status == 'Chờ xác nhận') {
            $status = 'Huỷ đơn';
        }else{
            return response()->json(['message' => 'Đơn hàng đang vận chuyển không thể huỷ.'], 400);
        }
        // Find order by ID and update status
        $order = Order::find($id_product);
        if ($order) {
            $order->status = $status;
            $order->save();
            return response()->json(['data' => $order, 'message' => 'Cập nhật trạng thái thành công.']);
        }

        return response()->json(['message' => 'Order not found'], 404);
    }
}
