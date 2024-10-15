@extends('layouts.master')
@section('title', 'Thanh toán')
@section('content')

<div class="checkout-container">
    <div class="container bg-white p-4">
        <form action="{{ route('checkout.complete') }}" method="POST"> <!-- Thay route với route thực tế của bạn -->
            @csrf
            <div class="row">
                <div class="checkout-left col-lg-7 p-3 border-r">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="info-title">Thông tin nhận hàng</h2>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="name" placeholder="Họ và tên" required>
                            <input type="text" name="phone" placeholder="Số điện thoại" required>
                            <input type="text" name="address" placeholder="Địa chỉ" required>
                            <textarea name="note" placeholder="Ghi chú" rows="4"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <h2 class="shipping-title">Vận chuyển</h2>
                            <div class="form-check">
                                <div class="form-check-l">
                                    <input type="radio" class="form-check-input" name="shipping_method" id="shipping-checkbox" value="home_delivery" required>
                                    <label for="shipping-checkbox" class="form-check-label">Giao hàng tận nơi</label>
                                </div>
                            </div>

                            <h2 class="payment-title mt-4">Thanh toán</h2>
                            <div class="form-check">
                                <div class="form-check-l">
                                    <input type="radio" class="form-check-input" name="payment_method" id="payment-checkbox" value="cod" required>
                                    <label for="payment-checkbox" class="form-check-label">Thanh toán khi nhận hàng</label>
                                </div>
                                <span class="form-check-r"><i class="fa-regular fa-money-bill-1"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($products) && count($products) > 0)
                @php 
                    $totalPrice = 0;
                @endphp
                <div class="checkout-right col-lg-5 px-4">
                    <div class="gift">
                        <p class="text-center"> giỏ quà của bạn chọn bạn c </p>
                        @if($selectedGift)
                        <div class="selected-gift text-center">
                            <img src="{{ $selectedGift->image }}" alt="{{ $selectedGift->name }}" class="img-fluid" style="width: 100px;">
                            <br>
                            <span>{{ $selectedGift->name }}</span>
                        </div>
                    @else
                        <p>Không tìm thấy sản phẩm quà tặng.</p>
                    @endif
                    </div>
                    
                    <h2 class="sidebar-title"> {{ count($products) }} Sản phẩm trong giỏ hàng </h2>
                    @foreach($products as $item)
                    <div class="info-order-product">
                        <img src="{{ $item->image }}" alt="Product Image" class="img-fluid">
                        <span class="ml-3">{{ $item->quantity }}</span>
                        <span class="ml-auto total">{{ number_format($item->price) }} VND</span>
                    </div>
                    @php
                        $totalPrice += $item->price * $item->quantity;
                    @endphp
                    @endforeach

                    <div class="form-group">
                        <input type="text" name="discount_code" placeholder="Nhập mã giảm giá">
                    </div>

                    <div class="order-summary">
                        <div class="d-flex justify-content-between">
                            <p class="mb-0">Tạm tính</p>
                            <span>{{ number_format($totalPrice) }} VND </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            @php
                            $shippingCost = 10000; 
                            $totalPrice += $shippingCost; 
                            @endphp
                            <p class="mb-0">Phí vận chuyển</p>
                            <span>{{ number_format($shippingCost) }} VND</span>
                        </div>
                    </div>
                    <div class="total-summary d-flex justify-content-between">
                        <p class="mb-0">Tổng cộng</p>
                        <span>{{ number_format($totalPrice) }} VND</span>
                    </div>
                    <div class="action-buttons mt-4 d-flex justify-content-between">
                        <a href="#" class="btn btn-outline-secondary">Quay lại giỏ hàng</a>
                        <button type="submit" class="btn">Đặt hàng</button>
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

@endsection
