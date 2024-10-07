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
                                <th>#</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="cartItems">
                            @foreach ($cart as $key => $item)
                            <tr class="cart-body">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ $item['image'] }}" alt="Product items"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <input type="number" name="quantity" data-id="{{ $key }}" class="update-cart" value="{{ $item['quantity'] }}" min="1">
                                </td>
                                <td>{{ $item['price'] }}$</td>
                                <td>
                                    <button class="btn btn-danger delete-cart-item" data-id="{{ $key }}">Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="cart-summary">
                        <div class="cart-title">
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
                    // Xóa sản phẩm khỏi giao diện
                    this.closest('tr').remove();

                    // Cập nhật tổng giá tiền
                    document.getElementById('totalPrice').textContent = data.totalPrice + '$';

                    // Cập nhật số lượng sản phẩm trên icon giỏ hàng
                    document.getElementById('cart-count').textContent = data.cartItemCount;
                }
            })
            .catch(error => console.error('Lỗi:', error));
        });
    });

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    document.querySelectorAll('.update-cart').forEach(input => {
        input.addEventListener('change', function () {
            const id = this.getAttribute('data-id');
            const quantity = this.value;

            if (quantity <= 0) {
                alert('Số lượng phải lớn hơn 0');
                return;
            }

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
                    // Cập nhật tổng giá tiền sau khi thay đổi số lượng
                    document.getElementById('totalPrice').textContent = data.totalPrice + '$';

                    // Cập nhật số lượng sản phẩm trên icon giỏ hàng
                    document.getElementById('cart-count').textContent = data.cartItemCount;
                }
            })
            .catch(error => console.error('Lỗi:', error));
        });
    });

    });

</script>
@endsection
