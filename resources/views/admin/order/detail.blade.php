@extends('admin.layout')
@section('content')
<style>
    .full-screen {
        position: relative;
        width: 100vw; /* Chiếm toàn bộ chiều rộng màn hình */
        height: 100vh; /* Chiếm toàn bộ chiều cao màn hình */
        padding: 20px; /* Thêm padding nếu cần */
        box-sizing: border-box; /* Đảm bảo padding không làm tăng kích thước */
    }

    .card {
        height: 100%; /* Đảm bảo card chiếm toàn bộ chiều cao của khung */
        overflow: auto; /* Cho phép cuộn nếu nội dung lớn hơn */
    }

    .table-responsive {
        height: calc(100% - 60px); /* Giữ lại không gian cho tiêu đề và các phần khác */
        overflow-y: auto; /* Cho phép cuộn theo chiều dọc */
    }
</style>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>DANH MỤC SẢN PHẨM </h4>
                    <h6>View/Search product Category</h6>
                </div>
                <div class="page-btn">
                    <a href="{{--  --}}" class="btn btn-added">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" class="me-1" alt="img">THÊM MÃ GIẢM GIÁ
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                        alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Brand</option>
                                            <option>Iphone</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <div class="card-body">
                                    <h5>Thông tin người dùng:</h5>
                                    <br>
                                    <p>Tên người dùng: {{ $order->user->name }}</p>
                                
                                    <p>Email: {{ $order->user->email }}</p>
                                    <h5>Mã đơn hàng</h5>
                                    
                                    <!-- Thêm thông tin khác của người dùng nếu cần -->
                
                                    <div class="table-top">
                                        <!-- Nội dung của table-top -->
                                    </div>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Tên sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Tổng giá</th>
                                    
                                    <th>ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderDetails as $orderDetail)
            <tr>
                <td><label class="checkboxs">
                    <input type="checkbox" id="select-all">
                    <span class="checkmarks"></span>
                </label></td>
                <td>{{ $orderDetail->product->name }}</td>
                <td>
                    <img src="{{ asset('storage/' . $orderDetail->product->image) }}" alt="{{ $orderDetail->product->name }}" width="100">
                </td>
                <td>{{ $orderDetail->quantity }}</td>
                <td>{{ number_format($orderDetail->price, 2) }}</td>
                <td>{{ number_format($orderDetail->total_price, 2) }}</td>
              
                <td>{{ $order->order_date }}</td>
            </tr>
        @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
