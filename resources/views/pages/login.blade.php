@extends('layouts.master')
@section('title', 'Đăng nhập')

@section('content')
    <br>
    <br>
    <br>

    <form id="login-form" action="{{ route('login') }}" method="POST" onsubmit="return validateForm()">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <span id="email-error" class="error-message" style="color: red; display: none;"></span> <!-- Thông báo lỗi cho email -->
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <span id="password-error" class="error-message" style="color: red; display: none;"></span> <!-- Thông báo lỗi cho password -->
        </div>
        <button type="submit">Login</button>
    </form>

    <script>
        function validateForm() {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const emailError = document.getElementById('email-error');
            const passwordError = document.getElementById('password-error');

            // Reset lỗi cũ
            emailError.style.display = 'none';
            emailError.innerHTML = '';
            passwordError.style.display = 'none';
            passwordError.innerHTML = '';

            // Kiểm tra xem có trường nào rỗng không
            let isValid = true; // Biến để kiểm tra tính hợp lệ

            if (!email) {
                emailError.innerHTML = 'Vui lòng nhập địa chỉ email.';
                emailError.style.display = 'block'; // Hiển thị thông báo lỗi cho email
                isValid = false; // Đánh dấu là không hợp lệ
            } else {
                // Kiểm tra định dạng email
                const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
                if (!email.match(emailPattern)) {
                    emailError.innerHTML = 'Vui lòng nhập địa chỉ email hợp lệ.';
                    emailError.style.display = 'block'; // Hiển thị thông báo lỗi cho email
                    isValid = false; // Đánh dấu là không hợp lệ
                }
            }

            if (!password) {
                passwordError.innerHTML = 'Vui lòng nhập mật khẩu.';
                passwordError.style.display = 'block'; // Hiển thị thông báo lỗi cho password
                isValid = false; // Đánh dấu là không hợp lệ
            }

            return isValid; // Trả về kết quả kiểm tra
        }
    </script>
@endsection
