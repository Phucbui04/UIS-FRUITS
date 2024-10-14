<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Psy\Command\WhereamiCommand;

class CheckoutController extends Controller
{
    public function index()
    {
        // $cart = session()->get('cart');
        // // dd($cart);
        // if (!is_array($cart)) {
        //     $cart = [];
        // }
        // $product_id = array_keys($cart);
        // $products = Product::whereIn('id', $product_id)->get();
        // foreach ($products as $product) {
        //     $product->quantity = $cart[$product->id]['quantity'];
        // }
        return view('pages.checkout', compact('products'));
    }
    public function checkout()
    {
        $cart = session()->get('cart');
        // dd($cart);
        if (!is_array($cart)) {
            $cart = [];
        }
        $product_id = array_keys($cart);
        $products = Product::whereIn('id', $product_id)->get();
        foreach ($products as $product) {
            $product->quantity = $cart[$product->id]['quantity'];
        }
        return view('pages.checkout', compact('products'));
    }
    public function completeCheckout(Request $request)
    {
        // Lấy dữ liệu giỏ hàng từ session
        $cart = session()->get('cart');
        // dd($cart);
        if (!$cart) {
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
        $token = Str::random(12);
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;  // Email không có trong bảng, bạn có thể thêm cột hoặc bỏ đi
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->payment_method = 'Thanh toán khi nhận hàng';  
        $order->status = 'Đã đặt hàng';
        $order->token = $token;  
        $order->order_date = now();  
        $order->user_id = Auth::id();

        // Kiểm tra nếu có mã giảm giá (discount)
        if ($request->has('discount_code')) {
            $discount = Discount::where('code', $request->discount_code)->first();
            if ($discount) {
                $order->discounts_id = $discount->id;
                $totalAmount -= $discount->amount;  // Trừ đi số tiền giảm giá
            }
        }

        // Lưu tổng số tiền sau khi giảm giá
        $order->total_amount = $totalAmount;

        // Lưu đơn hàng vào cơ sở dữ liệu
        $order->save();

        // Lưu chi tiết các sản phẩm trong đơn hàng (order_details)
        foreach ($cart as $item) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $item['product_id']; // Lấy product_id từ giỏ hàng
            $orderDetail->quantity = $item['quantity']; // Lấy quantity từ giỏ hàng
            $orderDetail->price = $item['price']; // Lấy price từ giỏ hàng
            $orderDetail->total_price = $item['price'] * $item['quantity']; // Tính total_price
            $orderDetail->save();
        }

        $mailInfo =  $order->email;     
        $mail = Mail::to($mailInfo)->send(new OrderMail($order));        
        session()->forget('cart');

        // Trả về trang thành công hoặc trang cảm ơn
        return view('pages.checkoutSuccess');
    }
    public function confirmOrder($token){
        $order = Order::where('token', $token)->first();
      
        if($order){
            $order->status = 1;
            $order->save();
            return redirect()->route('home.index')->with('success', 'Bạn đã xác nhận đơn hàng thành công.');
        }
        return abort(404);
    }
}
