@extends('layouts.master')
@section('title', 'Trang chủ')
@section('content')
    <!-- Main Content -->
    <main class="main-content">

        <section class="category-carousel mb-4">
            <div class="container p-0">
                <div class="d-flex justify-content-between align-items-center gap-4">
                    <!-- Categories Section -->
                    <div class="category-swaper d-md-block d-none">
                        <div class="category-menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                style="fill: rgb(255, 255, 255); margin: 0px 5px;">
                                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                            </svg>
                            <span>Danh mục</span>
                        </div>
                        <ul class="category-list list-unstyled mb-0">
                            <li class="category-item"><a href="">Khuyến mãi hot</a></li>
                            <li class="category-item"><a href="">Trái cây & hoa</a></li>
                            <li class="category-item"><a href="">Giỏ trái cây</a></li>
                            <li class="category-item"><a href="">Quà tặng</a></li>
                            <li class="category-item"><a href="">Thịt cá, trứng & hải sản</a></li>
                            <li class="category-item"><a href="">Rau củ & nấm</a></li>
                            <li class="category-item"><a href="">Rau củ & nấm</a></li>
                            <li class="category-item"><a href="">Quà tặng</a></li>
                            <li class="category-item"><a href="">Thịt cá, trứng & hải sản</a></li>
                            <li class="category-item"><a href="">Thịt cá, trứng & hải sản</a></li>
                        </ul>
                    </div>
                    <!-- Carousel -->
                    <div class="carousel-slider col-md-9 p-0">
                        <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators -->
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="0"
                                    class="active"></button>
                                <button type="button" data-bs-target="#categoryCarousel" data-bs-slide-to="1"></button>
                            </div>

                            <!-- Slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('layouts/img/banner-01.png') }}" alt="Slide 1"
                                        class="d-block w-100 rounded">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('layouts/img/banner-02.png') }}" alt="Slide 2"
                                        class="d-block w-100 rounded">
                                </div>
                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services mb-4">
            <div class="container container-wrapper bg-white">
                <div class="service-stick row align-items-center">
                    <div class="service-item col-md-4">
                        <div class="service-content">
                            <h2 class="service-title">Hỗ trợ 24/7</h2>
                            <span class="service-text">Liên hệ chúng tôi 24h</span>
                        </div>
                        <div class="service-icon">
                            <img src="{{ asset('layouts/img/service_1.svg') }}" alt="Service 1">
                        </div>
                    </div>
                    <div class="service-item col-md-4">
                        <div class="service-content">
                            <h2 class="service-title">Thanh toán</h2>
                            <span class="service-text">Bảo mật thanh toán</span>
                        </div>
                        <div class="service-icon">
                            <img src="{{ asset('layouts/img/service_2.svg') }}" alt="Service 2">
                        </div>
                    </div>
                    <div class="service-item col-md-4">
                        <div class="service-content">
                            <h2 class="service-title">Giao hàng</h2>
                            <span class="service-text">Giao hàng tận nơi</span>
                        </div>
                        <div class="service-icon">
                            <img src="{{ asset('layouts/img/service_3.svg') }}" alt="Service 3">
                        </div>
                    </div>

                </div>
                <!-- Custom Prev and Next buttons -->
                <button class="custom-prev" id="prev-service">
                    <img src="img/arrow-left.png" alt="icon arrow-left">
                </button>
                <button class="custom-next" id="next-service">
                    <img src="img/arrow-right.png" alt="icon arrow-right">
                </button>


            </div>
        </section>


        <section class="best-sellers mb-4">
            <div class="container p-3 p-md-4 bg-white">
                <h2 class="section-title">Sản phẩm bán chạy</h2>
                <div class="product-grid">

                    @foreach ($topSellingProducts as $item)
                    <div class="product-card">
                        <a href="{{ route('product.detail',$item->id) }}"><img src="{{$item->image}}" alt="Red Amaranth"></a>
                        <h5>{{ $item->name }}</h5>
                        <div class="price">
                            {{ $item->discount }} VND <span class="old-price">{{ $item->price }} VND</span>
                        </div>
                        <div class="add-to-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                            <span class="cart-text">Thêm giỏ hàng</span>
                        </div>
                    </div>  
                    @endforeach
                </div>
                <div class="view-all ">
                    <a class="btn" href="#">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>
        </section>

        <section class="banner-section-1 mb-4">
            <div class="box container p-0">
                <a href="#"><img src="{{ asset('layouts/img/banner-section-1.webp') }}" alt="Banner Section"></a>
            </div>
        </section>

        <section class="new-arrivals mb-4">
            <div class="container p-3 p-md-4 bg-white">
                <h2 class="section-title">Sản phẩm mới</h2>
                <div class="product-grid ">

                    @foreach ($newProducts as $item)
                    <div class="product-card">
                        <div class="new-badge">New</div>
                        <a href="{{ route('product.detail',$item->id) }}"><img src="{{$item->image}}" alt="Red Amaranth"></a>
                        <h5>{{ $item->name }}</h5>
                        <div class="price">
                            {{ $item->discount }} VND <span class="old-price">{{ $item->price }} VND</span>
                        </div>
                        <div class="add-to-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                            <span class="cart-text">Thêm giỏ hàng</span>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="view-all ">
                    <a class="btn" href="#">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
                </div>
            </div>

        </section>

        <section class="banner-section-2 mb-4">
            <div class="container p-0">
                <div class="row">
                    <div class="col-md-3 d-md-block d-none">
                        <img src="{{ asset('layouts/img/banner-section-2.webp') }}" alt="Banner Section 2"
                            class="banner-image">
                    </div>
                    <div class="col-md-6 d-block">
                        <img src="{{ asset('layouts/img/banner-section-3.webp') }}" alt="Banner Section 3"
                            class="banner-image">
                    </div>
                    <div class="col-md-3 d-md-block d-none">
                        <img src="{{ asset('layouts/img/banner-section-4.webp') }}" alt="Banner Section 4"
                            class="banner-image">
                    </div>
                </div>
            </div>
        </section>


        <section class="latest-news">
            <div class="container p-3 p-md-4 bg-white">
                <div class="news-header">
                    <h2 class="section-title">Tin tức mới nhất</h2>
                    <a class="btn" href="#">Xem tất cả <i class="fa-solid fa-chevron-right"></i></a>
                </div>
                <div class="row py-3">
                    <!-- Featured News -->
                    <div class="col-md-5">
                        <div class="featured-news">
                            <div class="news-image">
                                <a href="">
                                    <img src="https://file.hstatic.net/1000141988/article/3_cc570ca6564f448280671cb67a8461aa.jpg"
                                        alt="Cherry">
                                </a>
                            </div>
                            <div class="news-details">
                                <h3 class="news-title">Bí quyết lựa chọn & bảo quản Cherry Mỹ ngon nhất!</h3>
                                <div class="news-meta">
                                    <span class="author">Phạm Hạ Tuyên</span>
                                    <small class="date">Th 2 06/05/2024</small>
                                </div>
                                <p class="news-summary">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula elit ac
                                    quam elementum, ac hendrerit nunc aliquet...
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Additional News -->
                    <div class="col-md-7">
                        <div class="additional-news">
                            <!-- News Item 1 -->
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="">
                                        <img src="https://file.hstatic.net/1000141988/article/mat_ong_manuka_novafarms_29e3abc63689432d9f4c634e95f36a73.jpeg"
                                            alt="Mật Ong Manuka">
                                    </a>
                                </div>
                                <div class="news-details">
                                    <h3 class="news-title">Tại Sao Mật Ong Manuka Lại Đặc Biệt?</h3>
                                    <div class="news-meta">
                                        <span class="author">Phạm Hạ Tuyên</span>
                                        <span class="date">Th 2 06/05/2024</span>
                                    </div>
                                    <p class="news-summary">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula...
                                    </p>
                                </div>
                            </div>
                            <!-- Repeat for additional news items -->
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="">
                                        <img src="https://file.hstatic.net/1000141988/article/mat_ong_manuka_novafarms_29e3abc63689432d9f4c634e95f36a73.jpeg"
                                            alt="Mật Ong Manuka">
                                    </a>
                                </div>
                                <div class="news-details">
                                    <h3 class="news-title">Tại Sao Mật Ong Manuka Lại Đặc Biệt?</h3>
                                    <div class="news-meta">
                                        <span class="author">Phạm Hạ Tuyên</span>
                                        <span class="date">Th 2 06/05/2024</span>
                                    </div>
                                    <p class="news-summary">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula...
                                    </p>
                                </div>
                            </div>
                            <!-- Additional news items can be added here -->
                            <div class="news-item">
                                <div class="news-image">
                                    <a href="">
                                        <img src="https://file.hstatic.net/1000141988/article/mat_ong_manuka_novafarms_29e3abc63689432d9f4c634e95f36a73.jpeg"
                                            alt="Mật Ong Manuka">
                                    </a>
                                </div>
                                <div class="news-details">
                                    <h3 class="news-title">Tại Sao Mật Ong Manuka Lại Đặc Biệt?</h3>
                                    <div class="news-meta">
                                        <span class="author">Phạm Hạ Tuyên</span>
                                        <span class="date">Th 2 06/05/2024</span>
                                    </div>
                                    <p class="news-summary">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection
