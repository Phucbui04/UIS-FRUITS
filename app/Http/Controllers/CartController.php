<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Hiển thị giỏ hàng
    public function index()
    {
        $cart = Session::get('cart', []);
        $totalPrice = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('pages.cart', compact('cart', 'totalPrice'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity
            ];
        }
    
        Session::put('cart', $cart);
    
        // Tính tổng số lượng sản phẩm trong giỏ
        $cartItemCount = array_sum(array_column($cart, 'quantity'));
    
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');

    }
    // Cập nhật số lượng giỏ hàng
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;

            Session::put('cart', $cart);
        }

        return response()->json(['success' => true, 'totalPrice' => $this->calculateTotal()]);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delete($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);

        Session::put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Sản phẩm đã xóa thành công', 'totalPrice' => $this->calculateTotal()]);    }

    // Tính tổng tiền
    private function calculateTotal()
    {
        $cart = Session::get('cart', []);
        return array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
