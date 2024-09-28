<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         // Sản phẩm mới nhất
    $newProducts = Product::orderBy('created_at', 'desc')->take(10)->get();

    // Sản phẩm bán chạy nhất (dựa trên số lượng bán từ bảng order_items)
    $topSellingProducts = Product::select('products.id', 'products.name', 'products.price', 'products.image', 'products.stock','products.discount')  // Chọn cột stock
    ->join('order_details', 'products.id', '=', 'order_details.product_id')
    ->selectRaw('SUM(order_details.quantity) as total_sales')
    ->groupBy('products.id', 'products.name', 'products.price', 'products.image', 'products.stock','products.discount')  // Thêm stock vào GROUP BY
    ->orderBy('total_sales', 'desc')
    ->take(10)
    ->get();


        return view('pages.home', compact('newProducts','topSellingProducts'));
    }
}
