<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 255);
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->unsignedInteger('quantity')->default(0);
            $table->string('gender', 50)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('flash_sale')->default(0);
            $table->unsignedInteger('features')->default(0);
            $table->unsignedBigInteger('id_categories')->nullable();
            $table->foreign('id_categories')->references('id')->on('categories')->onDelete('set null');
            $table->timestamps(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};