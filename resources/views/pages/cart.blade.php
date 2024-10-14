@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
<main class="main-content">
    <section class="cart-page mb-4">
        <div class="container bg-white p-2 p-md-4">
            <div class="row">
                <div class="col-md-12 col-lg-8 pr-3 border-r">
                    <form action=" {{ route('checkout.process') }} " method="post">
                        @csrf
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
                                    <input type="number" name="quantity" data-id="{{ $key }}" class="update-cart" value="{{ $item['quantity'] }}" min="0">
                                </td>
                                <td>{{ $item['price'] }}$</td>
                                <td>
                                    <a class="btn btn-danger delete-cart-item" data-id="{{ $key }}">Xóa</a>
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
                            <button class="bnt" type="submit" >Tiến hành thanh toán</button>
                        </div>
                        <div class="continue">
                            <a href="{{ route('home.index') }}" class="btn btn-continue">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
                </form>
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
                        document.getElementById('cart-count').textContent = data.cartItemCount || 0; // Đảm bảo rằng số lượng là 0 nếu không có sản phẩm
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

                if (quantity === 0) {
                    // Nếu số lượng bằng 0, gọi hàm xóa sản phẩm
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
                                // Xóa sản phẩm khỏi giao diện
                                this.closest('tr').remove();

                                // Cập nhật tổng giá tiền
                                document.getElementById('totalPrice').textContent = data.totalPrice + '$';

                                // Cập nhật số lượng sản phẩm trên icon giỏ hàng
                                document.getElementById('cart-count').textContent = data.cartItemCount || 0; // Đảm bảo rằng số lượng là 0 nếu không có sản phẩm
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
                            // Cập nhật tổng giá tiền sau khi thay đổi số lượng
                            document.getElementById('totalPrice').textContent = data.totalPrice + '$';

                            // Cập nhật số lượng sản phẩm trên icon giỏ hàng
                            document.getElementById('cart-count').textContent = data.cartItemCount || 0; // Đảm bảo rằng số lượng là 0 nếu không có sản phẩm
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
                }
            });
        });
    });
</script>
@endsection
