@extends('layouts.master')
@section('title', 'Giỏ hàng')
@section('content')

<main class="main-content">
    <form action="{{ route('checkout.process') }}" method="post">
        @csrf
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
                                @foreach ($cart as $key => $item)
                                <tr class="cart-body">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img src="{{ $item['image'] }}" alt="Product items" style="width: 100px;"></td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>
                                        <input type="number" name="quantity[{{ $key }}]" data-id="{{ $key }}" class="update-cart" value="{{ $item['quantity'] }}" min="0">
                                    </td>
                                    <td>{{ $item['price'] }}$</td>
                                    <td>
                                        <a class="btn btn-danger delete-cart-item" data-id="{{ $key }}">Xóa</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Nút xóa toàn bộ giỏ hàng -->
                        <div class="clear-cart mt-3 text-left">
                            <button type="button" class="btn btn-danger" id="clearCart">Xóa tất cả</button>
                        </div>
                        <br>
                        <div class="continue">
                            <a href="{{ route('home.index') }}" class="btn btn-success">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="cart-summary d-flex flex-column">
                            <div class="gift"></div>
                            <div class="cart-title d-flex justify-content-between">
                                <h3 class="text-left mb-0">Tổng tiền</h3>
                                <span id="totalPrice" class="text-right">{{ $totalPrice }}$</span>
                            </div>
                            <div class="checkoutbtn btn btn-outline-success">
                                <button class="btn" type="submit">Tiến hành thanh toán</button>
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
                            <input type="checkbox" name="selected_product[]" id="product_{{ $item->id }}"
                                class="product-checkbox" value="{{ $item->id }}"
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
    </form>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Xóa sản phẩm khỏi giỏ hàng
        document.querySelectorAll('.delete-cart-item').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Xóa sản phẩm?',
                    text: 'Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Có, xóa!',
                    cancelButtonText: 'Không'
                }).then((result) => {
                    if (result.isConfirmed) {
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
                    }
                });
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
                    deleteCartItem(id);
                } else {
                    updateCartItem(id, quantity);
                }
            });
        });

        // Xóa toàn bộ sản phẩm trong giỏ hàng
        document.getElementById('clearCart').addEventListener('click', () => {
            Swal.fire({
                title: 'Xóa toàn bộ giỏ hàng?',
                text: 'Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
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
                            document.getElementById('cart-count').textContent = 0;
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
                }
            });
        });

        // Hàm xóa sản phẩm khỏi giỏ hàng
        function deleteCartItem(id) {
            Swal.fire({
                title: 'Xóa sản phẩm?',
                text: 'Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Có, xóa!',
                cancelButtonText: 'Không'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/cart/delete/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.querySelector(`[data-id="${id}"]`).closest('tr').remove();
                            document.getElementById('totalPrice').textContent = data.totalPrice + '$';
                            document.getElementById('cart-count').textContent = data.cartItemCount || 0;
                        }
                    })
                    .catch(error => console.error('Lỗi:', error));
                } else {
                    // Nếu người dùng không muốn xóa, đặt lại giá trị của input
                    document.querySelector(`input[data-id="${id}"]`).value = 1; // Giá trị mặc định
                }
            });
        }

        // Hàm cập nhật sản phẩm trong giỏ hàng
        function updateCartItem(id, quantity) {
            fetch(`/cart/update/${id}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ quantity: quantity })
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
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.product-checkbox');
        const giftContainer = document.querySelector('.gift');
    
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                // Nếu checkbox được chọn
                if (this.checked) {
                    // Xóa các checkbox khác
                    checkboxes.forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });
    
                    // Cập nhật nội dung của giftContainer
                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productImg = this.getAttribute('data-img');
    
                    // Hiển thị sản phẩm đã chọn
                    giftContainer.innerHTML = `
                        <div class="selected-gift text-center">
                            <img src="${productImg}" alt="${productName}" class="img-fluid" style="width: 100px;">
                            <br>
                            <span>${productName}</span>
                        </div>
                    `;
                } else {
                    // Nếu checkbox không được chọn, xóa nội dung giftContainer
                    giftContainer.innerHTML = '';
                }
            });
        });
    });
</script>
<script>
   
    </script>
@endsection
