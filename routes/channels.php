<?php
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{roomId}', function ($user, $roomId) {
    // Kiểm tra xem user có quyền tham gia vào kênh chat không
    return true; // hoặc false, tuỳ thuộc vào logic của bạn
});