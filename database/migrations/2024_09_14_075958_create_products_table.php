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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->unsignedBigInteger('category_id'); 
            $table->decimal('price', 8, 2);
            $table->decimal('discount', 8, 2)->default(0); // Thêm giá trị mặc định cho discount
            $table->integer('stock')->default(0); // Thêm giá trị mặc định cho stock
            $table->text('description')->nullable(); 
            $table->string('image')->nullable();  
            $table->unsignedBigInteger('productType_id');
            $table->timestamps();
            
            // Thêm ràng buộc khóa ngoại cho category_id
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            // Thêm ràng buộc khóa ngoại cho productType_id
            $table->foreign('productType_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
