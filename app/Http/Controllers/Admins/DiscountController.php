<?php
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Discount;


class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discount::orderBy('id', 'desc')->get();
        return view('admin.discount.index', compact('discounts'));
    }

    public function create()
    {
        return view('admin.discount.create');
    }

    public function store(Request $request)
    {
        Discount::create([
            'code' => $request->input('code'),
            'discount_percent' => $request->input('discount_percent'), 
            'description' => $request->input('description'),
           'valid_form' => $request->input('valid_form'), 
    'valid_end' => $request->input('valid_end'), 
            'is_active' => true, // Có thể tự động đánh dấu là hoạt động
        ]);
       /*  dd($request->all()); */
        return redirect()->route('admin.discount.index')->with('success', 'Mã giảm giá đã được tạo thành công!');
    }

    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discount.edit', compact('discount'));
    }
    
    public function update(Request $request, $id)
    {
        $user = Discount::findOrFail($id); 
        $user->code = $request->input('code');
        $user->discount_percent = $request->input('discount_percent');
        $user->description = $request->input('description');
        $user->valid_form = $request->input('valid_form');
        $user->valid_end = $request->input('valid_end');
        $user->save();
    
        return redirect()->route('admin.dicount.index')->with('success', 'User đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();

        return redirect()->route('admin.discount.index')->with('success', 'Mã giảm giá đã được xóa thành công!');
    }

   
}
