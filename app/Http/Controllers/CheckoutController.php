<?php

namespace App\Http\Controllers;
use App\Mail\InvoiceEmail;
use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;

use App\Models\DetailOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Env;
class CheckoutController extends Controller
{
    function checkout(){
        return view("checkout");
    }
    function handel_form(Request $request){
        $order = new Order();
        $order->id_user = (Auth::check()) ? Auth::user()->id : null;
        $order->total_money = 0;
        $order->total_quantity = 0;
        $order->name = $request->name;  
        $order->email = $request->email;  
        $order->phone = $request->phone;  
        $order->address = $request->address;  
        $order->payment_method = $request->payment;
        $order->save();

        foreach (session('cart') as $sp) {
            $detail_order = new DetailOrder();
            $detail_order->id_order = $order->id;
            $detail_order->id_product = $sp->id;
            $detail_order->quantity = $sp->quantity;
            $detail_order->price = is_null($sp->sale_price)?$sp->regular_price:$sp->sale_price;
            $detail_order->color = $sp->color;
            $detail_order->size = $sp->size;
            $detail_order->save();

            $order->total_money += $detail_order->price * $detail_order->quantity;
            $order->total_quantity += $detail_order->quantity;
            $order->save();

            // dd($detail_order->total_money);
        }
        
        $order->save();
        // Mail::to($order->email)->send(new InvoiceEmail($order));


        session()->forget('cart');

        //check payment method  

        // Xử lý thanh toán
        // if ($request->payment == 'vnpay') {
        //     return $this->vnpay_payment($order);
        // }
        return redirect()->route('bill',['id'=>$order->id]);
    }

    function vnpay_payment($order){
        $vnp_TmnCode = "CSBK6P7Q"; // Terminal ID
        $vnp_HashSecret = "FLYEE8Z64ODCLS7Z79TFGEQO3F0GXODT"; // Secret key
        $vnp_Url = "https://pay.vnpay.vn/vpcpay.html";
        $vnp_Returnurl = route('vnpay.return');

        $vnp_TxnRef = $order->id; // Transaction ID
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = 60000 * 100;// Số tiền thanh toán
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        $vnp_CreateDate = date('YmdHis');

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $vnp_CreateDate,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    
    }

    //Xử lý
    function vnpay_return(Request $request){
        $vnp_HashSecret = 'FLYEE8Z64ODCLS7Z79TFGEQO3F0GXODT'; 
        $inputData = array();
        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
    
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $hashData = "";
        foreach ($inputData as $key => $value) {
            $hashData .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $hashData = trim($hashData, '&');
        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($secureHash == $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                // Thanh toán thành công
                // Xử lý đơn hàng
                // session()->forget('cart');
                return redirect()->route('checkout')->with('success', 'Thanh toán thành công!');
            } else {
                return redirect()->route('checkout')->with('error', 'Thanh toán không thành công!');
            }
        } else {
            return redirect()->route('checkout')->with('error', 'Chữ ký không hợp lệ!');
        }
    }
    
}
