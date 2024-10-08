@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')
    <section class="breadcrumb">
        <div class="container">
            <ul class="breadcrumb-list mb-0">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-separator">/</li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
            </ul>
        </div>
    </section>

    <section class="collection-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar Section -->
                <div class="col-md-4 col-lg-3 d-none d-md-none d-lg-block">
                    <aside class="collection-sidebar">
                        <!-- Product Categories -->
                        <div class="category-box bg-white p-3">
                            <h2>Danh mục sản phẩm</h2>
                            <ul class="category-list list-unstyled mb-0">
                                <li class="category-item"><a href="#">Khuyến mãi hot</a></li>
                                <li class="category-item"><a href="#">Trái cây & hoa</a></li>
                                <li class="category-item"><a href="#">Giỏ trái cây</a></li>
                                <li class="category-item"><a href="#">Quà tặng</a></li>
                                <li class="category-item"><a href="#">Thịt cá, trứng & hải sản</a></li>
                                <li class="category-item"><a href="#">Rau củ & nấm</a></li>
                            </ul>
                        </div>
                        <!-- Sidebar Banner -->
                        <div class="sidebar-banner mt-4 d-none d-md-block">
                            <img src="{{ asset('layouts/img/banner_sidebar.webp') }}" alt="Banner" class="img-fluid">
                        </div>
                    </aside>
                </div>

                <div class="collection-sidebar-mb d-block d-md-block d-lg-none">
                    <!-- Button to open the offcanvas sidebar -->
                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#category-shop">
                        <i class="fa-solid fa-filter"></i>
                    </button>
                </div>

                <!-- Main Content Section -->
                <div class="col-md-12 col-lg-9 p-0 px-md-2">
                    <div class="products-container bg-white p-3 p-md-4">
                        <!-- Sorting Options -->
                        <div class="collection-header">
                            <h2 class="collection-title">Tất cả sản phẩm</h2>
                            <select class="sort-options" aria-label="Sort by">
                                <option selected>Mặc định</option>
                                <option value="1">Giá tăng dần</option>
                                <option value="2">Giá giảm dần</option>
                                <option value="3">Mới nhất</option>
                                <option value="4">Cũ nhất</option>
                            </select>
                        </div>

                        <!-- Products Area -->
                        <div class="product-grid">
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>

                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                            <div class="product-card">
                                <div class="new-badge">New</div>
                                <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                    alt="Red Amaranth">
                                <h5>Red Amaranth</h5>
                                <div class="price">
                                    $100.00 <span class="old-price">$120.00</span>
                                </div>
                                <div class="add-to-cart">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                    <span class="cart-text">Thêm giỏ hàng</span>
                                </div>
                            </div>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation" class="mt-4 ">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
