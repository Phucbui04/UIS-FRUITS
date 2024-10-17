<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_details;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
       
           
            $userId = Auth::id();
            $purchasedProductIds = Order::where('user_id', $userId)
                ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->pluck('order_details.product_id')->toArray();
          /*       dd($purchasedProductIds); */
            // Lấy danh mục của các sản phẩm mà người dùng đã mua
            $purchasedCategoryIds = Product::whereIn('id', $purchasedProductIds)
                ->pluck('category_id')->toArray();
         /*        dd($purchasedProductIds); */
            // Lấy các sản phẩm liên quan dựa trên danh mục
            $recommendedProducts = Product::whereIn('category_id', $purchasedCategoryIds)
                ->whereNotIn('id', $purchasedProductIds) 
                ->take(12) 
                ->get();
             /*    dd($recommendedProducts); */
             $newProducts = Product::select('products.id', 'products.name', 'products.price', 'products.image', 'products.stock', 'products.discount', 'categories.name as category_name')
             ->join('categories', 'products.category_id', '=', 'categories.id')
             ->where('products.created_at', '>=', now()->subDays(30) ) // Chọn sản phẩm được tạo trong 30 ngày qua
             ->orderBy('products.created_at', 'desc')
             ->take(5) // Lấy 8 sản phẩm mới nhất
             ->get();
    // Sản phẩm bán chạy nhất (dựa trên số lượng bán từ bảng order_items)
    $topSellingProducts = Product::select(
        'products.id', 
        'products.name', 
        'products.price', 
        'products.image', 
        'products.stock', 
        'products.discount',
        'categories.name as category_name' // Lấy tên danh mục và đặt tên là category_name
    )
    ->join('order_details', 'products.id', '=', 'order_details.product_id')
    ->join('categories', 'products.category_id', '=', 'categories.id') // Kết nối với bảng categories
    ->selectRaw('SUM(order_details.quantity) as total_sales')
    ->groupBy(
        'products.id', 
        'products.name', 
        'products.price', 
        'products.image', 
        'products.stock', 
        'products.discount', 
        'categories.name' // Đảm bảo group theo tên danh mục
    )
    ->orderBy('total_sales', 'desc')
    ->take(4)
    ->get();


        return view('pages.home', compact('newProducts','topSellingProducts','recommendedProducts'));
    }
}
