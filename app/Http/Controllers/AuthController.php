<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\ErrorHandler\Debug;

class AuthController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegisterForm()
    {
        return view('pages.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15', // Validate số điện thoại
            'address' => 'nullable|string|max:255', // Validate địa chỉ (không bắt buộc)
        ]);
        // Tạo người dùng mới
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        // Đăng nhập ngay sau khi đăng ký
        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('login'); // Điều hướng đến trang dashboard sau khi đăng ký
    }


    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('pages.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Kiểm tra thông tin đăng nhập
        if (Auth::attempt($request->only('email', 'password'))) {
            // Lấy thông tin người dùng đã đăng nhập
            $user = Auth::user();

            // Kiểm tra vai trò của người dùng
            if ($user->role == 1) {
                return redirect('/admin'); // Điều hướng đến trang admin nếu role = 1
            }

            return redirect()->route('home.index'); // Điều hướng đến trang dashboard nếu không phải admin
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }


    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home.index'); // Điều hướng về trang login
    }
}
