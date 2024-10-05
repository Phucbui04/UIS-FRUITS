@extends('layouts.master')
@section('title', 'Giỏ hàng')

@section('content')
    <section class="breadcrumb">
        <div class="container">
            <ul class="breadcrumb-list mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-separator">/</li>
                <li class="breadcrumb-item"><a href="#">Giỏ hàng (1)</a></li>
            </ul>
        </div>
    </section>

    <section class="cart-page mb-4">
        <div class="container bg-white p-2 p-md-4">
            <div class="row">
                <div class="col-md-12 col-lg-8 pr-3 border-r">
                    <table class="cart-items-table">
                        <thead>
                            <tr class="cart-header ">
                                <th scope="col">#</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="cart-body">
                                <th scope="row">1</th>
                                <td><img src="{{ asset('layouts/img/product-1.webp') }}" alt="Product items"></td>
                                <td class="cart-product-name">Nho mỹ Nh </td>
                                <td>
                                    <input type="number" name="quantity" id="quantity" value="1" min="0">
                                </td>
                                <td><span>$120</span></td>
                                <td>
                                    <button class="btn btn-danger">Xóa</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="cart-summary">
                        <div class="cart-title">
                            <h3 class="text-left mb-0">Tổng tiền</h3>
                            <span class="text-right">$123</span>
                        </div>
                        <div class="checkout">
                            <a href="#" class="btn">Tiến hành thanh toán</a>
                        </div>
                        <div class="continue">
                            <a href="" class="btn btn-continue">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
