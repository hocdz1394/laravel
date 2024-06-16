<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('voucher')->nullable();
            $table->enum('status', ['Chờ xác nhận', 'Chuẩn bị hàng', 'Đang vận chuyển', 'Đã giao', 'Huỷ đơn'])->default('Chờ xác nhận');
            $table->enum('payment_method', ['cod', 'vnpay', 'momo'])->default('cod');
            $table->integer('total_money')->default(0);
            $table->integer('total_quantity')->default(0);
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
