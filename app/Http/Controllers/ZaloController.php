<?php
/* 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product; // Import model của bạn
use GuzzleHttp\Client; // Đảm bảo bạn đã cài đặt GuzzleHTTP
class ZaloController extends Controller
{
    // Phương thức để lấy dữ liệu
    public function index()
    {
        $data = Product::all(); // Đảm bảo tên model là đúng (chữ 't' trong 'Product')
        return response()->json($data);
    }

    // Phương thức chi tiết sản phẩm
    public function detail($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        }
        return response()->json(['error' => 'Product not found'], 404);
    }
}
 */
