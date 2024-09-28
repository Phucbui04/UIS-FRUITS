<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        
        return view('pages.product');
    }

    public function detail($id)
    {
        $product_detail = Product::with('category','images')->find($id);
        
        if (!$product_detail) {
            abort(404);
        }
        $sku = 'I' . str_pad($product_detail->id, 5, '0', STR_PAD_LEFT);
        return view('pages.productDetail', compact('product_detail', 'sku'));
    }
}
