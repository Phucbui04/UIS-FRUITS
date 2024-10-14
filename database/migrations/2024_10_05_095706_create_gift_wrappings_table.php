<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftWrappingsTable extends Migration
{
    public function up()
    {
        Schema::create('gift_wrappings', function (Blueprint $table) {
            $table->bigIncrements('id'); // Khóa chính
            $table->unsignedBigInteger('products_id');  // Khóa ngoại liên kết với bảng products
            $table->unsignedBigInteger('user_id'); // Khóa ngoại liên kết với bảng users
            $table->double('price', 8, 2); // Giá
            $table->text('tag'); // Thẻ
            $table->timestamps(); // Cột created_at và updated_at

            // Đặt quan hệ khóa ngoại
            $table->foreign('products_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_wrappings');
    }
}
