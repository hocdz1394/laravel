<?php
namespace App\Http\Controllers;


use Illuminate\Support\Facades\Mail; 
use App\Mail\UserEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Mail\InvoiceEmail;
use Illuminate\Support\Facades\Mail;
class EmailController extends Controller
{
    /**
     * Gửi email nhắc nhở thông qua ID đơn hàng.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmailReminder(Request $request)
    {

        
        // Tìm đơn hàng dựa trên order_id
        $order = Order::findOrFail();

        

            // Lấy thông tin bill từ cơ sở dữ liệu
            $bill = // lấy thông tin bill dựa trên $id_order

            // Gửi email
            Mail::to($bill->email)->send(new InvoiceEmail($bill));

            
        }

    
}
