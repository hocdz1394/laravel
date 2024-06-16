<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Mailer\Event\MessageEvent;

class MessageController extends Controller
{
    // Admin
    public function view_message()
    {
        return view('admin.manager-message');
    }
    public function getUsers() {
        // Lấy danh sách tất cả người dùng
        $users = User::all();
        return response()->json($users);
    }


    public function getMessages($userId) {
        
        
        // Lấy tất cả tin nhắn giữa admin và người dùng cụ thể
        $adminId = Auth::id();
        $messages = Message::with(['sender', 'recipient'])
        ->where(function($query) use ($userId, $adminId) {
            $query->where('sender_id', $adminId)
                  ->where('recipient_id', $userId);
        })
        ->orWhere(function($query) use ($userId, $adminId) {
            $query->where('sender_id', $userId)
                  ->where('recipient_id', $adminId);
        })
        ->get();

        return response()->json($messages);
        
    }

     // Gửi tin nhắn từ admin đến người dùng cụ thể
     public function sendMessage(Request $request)
     {
        $adminId = Auth::id();
        Log::info('Admin ID: ' . $adminId);
        Log::info('Request Data: ', $request->all());
    
        $message = Message::create([
            'sender_id' => $adminId,
            'recipient_id' => $request->input('recipient_id'),
            'message' => $request->input('message')
        ]);
    
        Log::info('Message Created: ', $message->toArray());
    
        return response()->json($message);
     }

    // Cline
    public function index($userId)
    {

      // Find the admin user
      $admin = User::where('role', 'admin')->first();
      $adminId = $admin->id;

         // Get all messages between the authenticated user and the admin
         $messages = Message::with(['sender', 'recipient'])
         ->where(function($query) use ($userId, $adminId) {
             $query->where('sender_id', $adminId)
                   ->where('recipient_id', $userId);
         })
         ->orWhere(function($query) use ($userId, $adminId) {
             $query->where('sender_id', $userId)
                   ->where('recipient_id', $adminId);
         })
         ->orderBy('created_at', 'asc') // Order messages by creation time
         ->get();

     return response()->json($messages);

      
    }

    public function store(Request $request)
    {
        $admin = User::where('role', 'admin')->first();
        $adminId = $admin->id;

        $request->validate([
            'message' => 'required|string|max:255', // Example validation rules, adjust as needed
        ]);
        $message = new Message();
        $message->recipient_id =$adminId; 
        $message->sender_id =$request->input('sender_id'); 
        $message->message = $request->input('message');
        $message->save();
        return response()->json($message);
    
        // return response()->json($message->load('user'));
    }
}
