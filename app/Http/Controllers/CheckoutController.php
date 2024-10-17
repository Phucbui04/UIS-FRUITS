<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Mail\OrderMail;
use App\Models\Product;
use App\Models\ProductType;
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
    public function checkout(Request $request)
    {
       /*  dd($request->all()); */
        $cart = session()->get('cart');
        // dd($cart);
        $selectedGiftId = $request->input('selected_product');
        $selectedGift = null;
        if (is_array($selectedGiftId) && count($selectedGiftId) > 0) {
            $firstGiftId = $selectedGiftId[0]; // Lấy ID đầu tiên
            // Xử lý với $firstGiftId, ví dụ: tìm kiếm sản phẩm
            $selectedGift = ProductType::find($firstGiftId); // Giả sử bạn có model Gift
        }   
     /*    dd($selectedGiftId);  */
        if (!is_array($cart)) {
            $cart = [];
        }
        $product_id = array_keys($cart);
        $products = Product::whereIn('id', $product_id)->get();
        foreach ($products as $product) {
            $product->quantity = $cart[$product->id]['quantity'];
        }
        return view('pages.checkout', compact('products','selectedGift'));
    }
    public function completeCheckout(Request $request)
    {dd($request->all());
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
             $order->selected_gift = json_encode($selectedGiftId);
            $orderDetail->save();
        }
        $selectedGiftIds = $request->input('selected_product');
        if (!empty($selectedGiftIds) && is_array($selectedGiftIds)) {
            foreach ($selectedGiftIds as $selectedGiftId) {
                $giftProduct = Product::find($selectedGiftId);
                if ($giftProduct) {
                    $productInGift = new ProductInGift(); // Mô hình ProductInGift đã được tạo
                    $productInGift->order_id = $order->id; // Giả sử bạn đã có order_id
                    $productInGift->product_id = $giftProduct->id; // ID của sản phẩm quà tặng
                    $productInGift->gift_id = $giftProduct->id; // Hoặc có thể là ID riêng của quà tặng
                    $productInGift->quantity = 1;  // Số lượng quà tặng mặc định là 1
                    $productInGift->price = 0; // Quà tặng có giá là 0
                    $productInGift->save();
                }
            }
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
