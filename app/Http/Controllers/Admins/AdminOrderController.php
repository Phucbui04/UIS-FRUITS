<?php
namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
class AdminOrderController extends Controller
{
    function index()  {
        $orders = Order::all();

    
    return view('admin.order.index', compact('orders'));
    }
    public function show($id)
    {

        $order = Order::with('orderDetails.product', 'user')->findOrFail($id);
        if (!$order) {
            return redirect()->route('admin.orders.index')->with('error', 'Đơn hàng không tồn tại.');
        }
        // Lấy đơn hàng theo ID
        return view('admin.order.detail', compact('order')); // Trả về view chi tiết đơn hàng
    }
    
}