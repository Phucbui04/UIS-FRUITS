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
        $totalPrice = $this->calculateTotal();

        return view('pages.cart', compact('cart', 'totalPrice'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart', []);
    
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity; // Cập nhật số lượng sản phẩm nếu đã tồn tại
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $request->quantity
            ];
        }
    
        Session::put('cart', $cart);
    
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }

    // Cập nhật số lượng giỏ hàng
    public function updateCart(Request $request, $id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$id])) {
            if ($request->quantity > 0) {
                $cart[$id]['quantity'] = $request->quantity;
                Session::put('cart', $cart);
            } else {
                // Nếu số lượng bằng 0, xóa sản phẩm khỏi giỏ hàng
                unset($cart[$id]);
                Session::put('cart', $cart);
            }
        }

        // Tính tổng tiền và số lượng sản phẩm
        $totalPrice = $this->calculateTotal();
        $cartItemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'totalPrice' => $totalPrice,
            'cartItemCount' => $cartItemCount
        ]);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function delete($id)
    {
        $cart = Session::get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]); // Xóa sản phẩm khỏi giỏ hàng
            Session::put('cart', $cart);
        }

        // Tính tổng tiền và số lượng sản phẩm
        $totalPrice = $this->calculateTotal();
        $cartItemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'message' => 'Sản phẩm đã xóa thành công',
            'totalPrice' => $totalPrice,
            'cartItemCount' => $cartItemCount
        ]);
    }

    // Tính tổng tiền
    private function calculateTotal()
    {
        $cart = Session::get('cart', []);
        return array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
    }
}
