@extends('layouts.master')
@section('title', 'Giỏ hàng')
@section('content')
<style>

</style>
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
                        <tbody >
                            @foreach ($cart as $key => $item)
                            <tr class="cart-body">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><img src="{{ $item['image'] }}" alt="Product items" style="width: 50px; height: 50px;"></td>
                                <td>{{ $item['name'] }}</td>
                                <td>
                                    <input type="number" name="quantity" data-id="{{ $key }}" class="update-cart" value="{{ $item['quantity'] }}" min="0">
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
                        <br>
                            <div  id="cartItems"></div>
                            <br>
                        <div class="cart-title ">
                            
                            <h3 class=" mb-0">Tổng tiền</h3>
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
        <br>
        <h4 class="text-center">Tùy chọn giỏ quà</h4>
        <br>
        <div class="container text-center">
            <div class="row">
                @foreach($products as $item)
                <div class="col-12 col-md-4 col-lg-2 mb-4">
                    <div class="product-card p-2 border">
                        <input type="checkbox" name="selected_product" id="product_{{ $item->id }}"
                            class="product-checkbox"
                            data-id="{{ $item->id }}" 
                            data-name="{{ $item->name }}"
                            data-img="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                            style="float:right;">
                        <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png" 
                            alt="{{ $item->name }}" class="img-fluid">
                        <span class="d-block mt-2">{{ $item->name }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Khai báo biến totalPrice để lưu tổng giá
        let totalPrice = 0;

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

        // Bắt sự kiện khi người dùng click vào checkbox
        document.querySelectorAll('.product-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Bỏ chọn tất cả các checkbox khác
            document.querySelectorAll('.product-checkbox').forEach(function(otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false; // Bỏ chọn
                }
            });

            const productName = this.getAttribute('data-name');
            const productImg = this.getAttribute('data-img');
            const productId = this.getAttribute('data-id');
            const productPrice = 10; // Giả sử mỗi sản phẩm có giá $10, có thể thay bằng giá thực

            if (this.checked) {
                // Thêm sản phẩm vào danh sách giỏ hàng
                const cartItem = `
                    <tr id="cart-item-${productId}" class="cart-title text-center">
                        <th scope="row"></th>
                        <td><img src="${productImg}" alt="${productName}" style="width: 100px; height: 100px;"></td>
                        <td>${productName}</td>
                    </tr>
                `;
                cartItem   remove();

                document.getElementById('cartItems').insertAdjacentHTML('beforeend', cartItem);

                // Cập nhật tổng tiền
                totalPrice += productPrice;
            } else {
                // Xóa sản phẩm khỏi giỏ hàng
                const cartItem = document.getElementById(`cart-item-${productId}`);
                if (cartItem) {
                    totalPrice -= productPrice;
                    cartItem.remove();
                }
            }

            // Cập nhật tổng giá tiền hiển thị
            document.getElementById('totalPrice').textContent = totalPrice + '$';
        });
    });
    
});

</script>
@endsection
