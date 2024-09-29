<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // app/Http/Controllers/ProductController.php
    public function index(Request $request)
    {
        // Lấy danh mục từ query parameters
        $categoryId = $request->query('category');

        // Lấy tất cả các danh mục để hiển thị trên view
        $categories = Category::all();

        // Lấy sản phẩm theo danh mục nếu có, nếu không lấy tất cả sản phẩm
        $products = Product::when($categoryId, function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->get();


        $keyword = $request->input('query');

        // Tìm kiếm sản phẩm theo tên hoặc mô tả
        $products = Product::where('name', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->get();

        return view('pages.product', compact('products', 'categories' ,'keyword'));
    }


    public function detail($id)
    {
        $product_detail = Product::with('category','images')->find($id);
        
        if (!$product_detail) {
            abort(404);
        }
        // lần sau note zô chứ nhiều lúc lại phải mò
        $sku = 'I' . str_pad($product_detail->id, 5, '0', STR_PAD_LEFT);

        $related_products = Product::where('category_id', $product_detail->category_id)
            ->where('id', '!=', $product_detail->id)
            ->limit(4) 
            ->get();
        return view('pages.productDetail', compact('product_detail', 'sku','related_products'));
    }

    // app/Http/Controllers/ProductController.php

  

}
