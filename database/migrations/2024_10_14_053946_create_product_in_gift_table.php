<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductInGiftTable extends Migration
{
    public function up(): void
    {
        Schema::create('product_in_gift', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('gift_id');
            $table->integer('quantity');
            $table->double('price', 8, 2);
            $table->timestamps();
            
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('gift_id')->references('id')->on('gift_wrappings')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_in_gift');
    }
}
