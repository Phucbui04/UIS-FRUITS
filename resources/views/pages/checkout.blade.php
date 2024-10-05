@extends('layouts.master')
@section('title', 'Thanh toán')
@section('content')

    <div class="checkout-container">
        <div class="container bg-white p-4">
            <div class="row">
                <div class="checkout-left col-lg-7 p-3 border-r">
                    <div class="row">
                        <div class="col-lg-6 ">
                            <h2 class="info-title">Thông tin nhận hàng</h2>
                            <form action="#">
                                <input type="email" placeholder="Email">
                                <input type="text" placeholder="Họ và tên">
                                <input type="text" placeholder="Số điện thoại">
                                <input type="text" placeholder="Địa chỉ">
                                <textarea placeholder="Ghi chú" rows="4"></textarea>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="shipping-title">Vận chuyển</h2>
                            <div class="form-check">
                                <div class="form-check-l">
                                    <input type="radio" class="form-check-input" id="shipping-checkbox">
                                    <label for="shipping-checkbox" class="form-check-label">Giao hàng tận nơi
                                    </label>
                                </div>
                                <span class="form-check-r">$30</span>
                            </div>

                            <h2 class="payment-title mt-4">Thanh toán</h2>
                            <div class="form-check">
                                <div class="form-check-l">
                                    <input type="radio" class="form-check-input" id="shipping-checkbox">
                                    <label for="shipping-checkbox" class="form-check-label">Thanh toán khi nhận hàng
                                    </label>
                                </div>
                                <span class="form-check-r"><i class="fa-regular fa-money-bill-1"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout-right col-lg-5 px-4">
                    <h2 class="sidebar-title">Đơn hàng (1 sản phẩm)</h2>
                    <div class="info-order-product">
                        <img src="{{ asset('layouts/img/product-1.1.webp') }}" alt="Product Image" class="img-fluid">
                        <span class="ml-3 qty-check">1</span>
                        <span class="ml-auto total">$123</span>
                    </div>
                    <form action="#">
                        <input type="text" placeholder="Nhập mã giảm giá">
                        <button class="btn">Áp dụng</button>
                    </form>
                    <div class="order-summary">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Tạm tính</p>
                            <span>$133</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Phí vận chuyển</p>
                            <span>$1</span>
                        </div>
                    </div>
                    <div class="total-summary d-flex justify-content-between">
                        <p class="mb-0">Tổng cộng</p>
                        <span>$133</span>
                    </div>
                    <div class="action-buttons mt-4 d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-secondary">Quay lại giỏ hàng</a>
                        <button class="btn">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
