@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')
    <!-- Main Content -->
    <main class="main-content">

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
                    <div class="col-md-3">
                        <aside class="collection-sidebar">
                            <!-- Product Categories -->
                            <div class="category-box bg-white p-4">
                                <h2 class="category-title">Danh mục sản phẩm</h2>
                                <ul class="category-list list-unstyled mb-0">
                                     @foreach($categories as $category)
              
                                    <li class="category-item"><a href="{{ route('product.index', ['category' => $category->id]) }}">{{$category->name}}</a></li>
                                  
                                      @endforeach
                                </ul>
                            </div>
                            <!-- Sidebar Banner -->
                            <div class="sidebar-banner mt-4 d-none d-md-block">
                                <img src="{{ asset('layouts/img/banner_sidebar.webp') }}" alt="Banner" class="img-fluid">
                            </div>
                        </aside>
                    </div>

                    <!-- Main Content Section -->
                    <div class="col-md-9">
                        <div class="products-container bg-white p-4">
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
                            @foreach($products as $pr)
                            <div class="product-grid">
                                <div class="product-card">
                                    <div class="new-badge">New</div>
                                    <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                                        alt="Red Amaranth">
                                    <h5>{{$pr->name}}</h5>
                                    <div class="price">
                                       {{$pr->disount}} <span class="old-price">{{$pr->price}}</span>
                                    </div>
                                    <div class="add-to-cart">
                                        <i class="fa-solid fa-basket-shopping"></i>
                                        <span class="cart-text">Thêm giỏ hàng</span>
                                    </div>
                                </div>
@endforeach
                                
                               
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



    </main>
@endsection
