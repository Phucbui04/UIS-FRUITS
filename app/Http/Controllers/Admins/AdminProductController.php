<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
    /*     dd( $request->all()); */
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           'child_images' => 'required|array|size:3', // Kiểm tra chính xác 3 ảnh
            'child_images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
 
        // Lưu ảnh sản phẩm chính
        $productImage = null; // Khởi tạo biến này

        if ($request->hasFile('product_image')) {
            $productImage = $request->file('product_image')->store( 'upload','public');
        }
    
        // Lưu sản phẩm vào DB và lấy ID
        try {
            $product = Product::create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'stock' => $request->stock,
                'description' => $request->description,
                'image' => $productImage,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // Kiểm tra thông báo lỗi
        }
       
    
        // Lưu ảnh con
        if ($request->hasFile('child_images')) {
            foreach ($request->file('child_images') as $image) {
                $childImage = $image->store('upload', 'public');
                // Lưu vào DB (nếu cần)
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $childImage,
                ]);
            }
        }
    
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function edit($id)
{
    // Lấy sản phẩm theo ID
    $product = Product::findOrFail($id);

    // Lấy danh sách danh mục để hiển thị trong dropdown
    $categories = Category::all();

    // Trả về view với sản phẩm và danh sách danh mục
    return view('admin.products.edit', compact('product', 'categories'));
}
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
