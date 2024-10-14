@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
<main class="main-content">
    <section class="cart-page mb-4">
        <div class="container bg-white p-2 p-md-4">
            <div class="row">
                <div class="col-md-12 col-lg-8 pr-3 border-r">
                    <table class="cart-items-table">
                        <thead>
                            <tr class="cart-header">
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">
                            @if (count($cart) > 0)
                                @foreach ($cart as $key => $item)
                                <tr class="cart-body">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img src="{{ $item['image'] }}" alt="Product items"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <input type="number" name="quantity" data-id="{{ $key }}" class="update-cart" value="{{ $item['quantity'] }}" min="0">
                                    </td>
                                    <td>{{ $item['price'] }}$</td>
                                    <td>
                                        <div class="action-btns"> <!-- Đặt nút xóa trong div này -->
                                            <button class="btn btn-danger delete-cart-item" data-id="{{ $key }}">Xóa</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">Chưa có sản phẩm nào được thêm vào giỏ hàng</td>
                                </tr>
                            @endif
                        </tbody>

                        
                    </table>
                    <!-- Nút xóa toàn bộ giỏ hàng -->
                        <div class="clear-cart mt-3 text-left">
                            <button class="btn btn-danger" id="clearCart">Xóa tất cả</button>
                        </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="cart-summary d-flex flex-column">
                        <div class="cart-title d-flex justify-content-between">
                            <h3 class="text-left mb-0">Tổng tiền</h3>
                            <span id="totalPrice" class="text-right">{{ $totalPrice }}$</span>
                        </div>
                        <div class="checkout">
                            <a href="#" class="btn">Tiến hành thanh toán</a>
                        </div>
                        <div class="continue">
                            <a href="{{ route('home.index') }}" class="btn btn-continue">Tiếp tục mua hàng</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Xóa sản phẩm khỏi giỏ hàng
        document.querySelectorAll('.delete-cart-item').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');

                fetch(`/cart/delete/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        this.closest('tr').remove();
                        document.getElementById('totalPrice').textContent = data.totalPrice + '$';
                        document.getElementById('cart-count').textContent = data.cartItemCount || 0;
                    }
                })
                .catch(error => console.error('Lỗi:', error));
            });
        });

        // Cập nhật số lượng sản phẩm trong giỏ hàng
        document.querySelectorAll('.update-cart').forEach(input => {
            input.addEventListener('change', function () {
                const id = this.getAttribute('data-id');
                const quantity = parseInt(this.value, 10); // Chuyển đổi thành số nguyên

                if (quantity < 0) {
                    alert('Số lượng không thể nhỏ hơn 0');
                    return;
                }

                // Nếu số lượng bằng 0, gọi hàm xóa sản phẩm
                if (quantity === 0) {
                    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
                        fetch(`/cart/delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.closest('tr').remove();
                                document.getElementById('totalPrice').textContent = data.totalPrice + '$';
                                document.getElementById('cart-count').textContent = data.cartItemCount || 0;
                            }
                        })
                        .catch(error => console.error('Lỗi:', error));
                    } else {
                        // Nếu người dùng không muốn xóa, đặt lại giá trị của input
                        this.value = 1; // Hoặc giá trị mặc định mà bạn muốn
                    }
                } else {
                    // Nếu số lượng lớn hơn 0, gửi yêu cầu cập nhật
                    fetch(`/cart/update/${id}`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ quantity })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('totalPrice').textContent = data.totalPrice + '$';
                            document.getElementById('cart-count').textContent = data.cartItemCount || 0;
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
                }
            });
        });

        // Xóa toàn bộ sản phẩm trong giỏ hàng
        document.getElementById('clearCart').addEventListener('click', function () {
            if (confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?')) {
                fetch('/cart/clear', {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('cartItems').innerHTML = '';
                        document.getElementById('totalPrice').textContent = '0$';
                        document.getElementById('cart-count').textContent = '0';
                    }
                })
                .catch(error => console.error('Lỗi:', error));
            }
        });
    });
</script>
@endsection
