<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::orderBy('id', 'desc')->get();
        return view('admin.categories.index' ,compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
public function create()
{
    return view('admin.categories.create'); // Tạo view cho form thêm danh mục
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Xác thực dữ liệu
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Tạo danh mục mới
    Category::create([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được thêm thành công!');
}
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->save();
    
        return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được cập nhật thành công!');
    }
    /**
     * Update the specified resource in storage.
     */
   
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Danh mục đã được xóa thành công!');
}
}
