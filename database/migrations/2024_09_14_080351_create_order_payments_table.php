<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method');  // Tên sản phẩm
            $table->unsignedBigInteger('order_id');  // Mã danh mục (liên kết với bảng categories)
            $table->timestamp('payment_date');  // Số lượng tồn kho
            $table->string('status')->nullable();  // Hình ảnh sản phẩm (có thể null)
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
