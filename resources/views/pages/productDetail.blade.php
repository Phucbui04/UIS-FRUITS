@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

        <section class="breadcrumb">
            <div class="container">
                <ul class="breadcrumb-list mb-0">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-separator">/</li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-separator">/</li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm 1</a></li>
                </ul>
            </div>
        </section>

        <section class="product-detail mb-4">
            <div class="container bg-white p-4">
                <div class="row">
                    <!-- Product Image Section -->
                    <div class="col-md-5">
                        <div class="product-images">
                            <div class="main-image">
                                <img id="main-image" src="{{ asset('layouts/img/product-1.webp') }}"
                                    alt="Product Main Image">
                            </div>
                            <div class="thumbnail-images">
                                <img src="{{ asset('layouts/img/product-1.webp') }}" alt="Image Thumbnail"
                                    onclick="changeImage('{{ asset('layouts/img/product-1.webp') }}')">
                                <img src="{{ asset('layouts/img/product-1.1.webp') }}" alt="Image Thumbnail"
                                    onclick="changeImage('{{ asset('layouts/img/product-1.1.webp') }}')">
                            </div>
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-md-7">
                        <div class="product-info">
                            <h2 class="product-title">Nho xanh Autumn Crisp Mỹ</h2>
                            <div class="product-status">
                                <span class="status">SKU: <span>I00000</span></span>
                                <span>|</span>
                                <span class="status">Danh mục: <span>Trái cây</span></span>
                                <span>|</span>
                                <span class="status">Tình trạng: <span>Còn hàng</span></span>
                            </div>
                            <div class="product-price">
                                <div class="price">
                                    $150.00 <span class="old-price">$120.00</span>
                                </div>
                            </div>

                            <form class="quantity-form" action="#">
                                <h4>Số lượng:</h4>
                                <div class="group-quantity">
                                    <button type="button" onclick="decreaseQuantity()">-</button>
                                    <input type="text" name="quantity" id="quantity" value="1" min="0">
                                    <button type="button" onclick="increaseQuantity()">+</button>
                                </div>

                            </form>

                            <div class="product-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia voluptate doloremque
                                beatae? Nesciunt reprehenderit facilis quia cumque officia eum libero laborum? At
                                reprehenderit beatae pariatur, accusamus ad totam illo id.
                            </div>

                            <div class="purchase-options">
                                <button class="btn-buy-now">
                                    <span><img src="img/i-muangay.svg" alt=""> Mua ngay</span>
                                    <p class="mb-0">Giao hàng tận tay quý khách</p>
                                </button>
                                <button class="btn-add-to-cart">
                                    <span>Cho vào giỏ</span>
                                    <p class="mb-0">Thêm vào giỏ để chọn tiếp</p>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail-bottom mt-5 col-md-12">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#description">Mô tả sản
                                    phẩm</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#comment">Đánh giá sản phẩm</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div id="description" class="text-container container tab-pane active"><br>
                                <p id="text-content">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nemo officia, ipsum error
                                    praesentium doloribus
                                    molestiae, possimus quibusdam recusandae, nostrum in voluptates libero iusto illo
                                    mollitia consequatur
                                    blanditiis eveniet eligendi eius.
                                </p>
                                <button id="toggle-button-content">Xem thêm </button>
                            </div>
                            <div id="comment" class="container tab-pane p-4 "><br>
                                <div class="comment-section row justify-content-center">
                                    <div class="col-md-6">
                                        <!-- Existing Comments -->
                                        <div class="comment-box ">
                                            <div class="d-flex justify-content-between">
                                                <span class="comment-user">John Doe</span>
                                                <span class="comment-time">2 hours ago</span>
                                            </div>
                                            <p>This product is amazing! Totally worth the price.</p>
                                        </div>

                                        <div class="comment-box ">
                                            <div class="d-flex justify-content-between">
                                                <span class="comment-user">Jane Smith</span>
                                                <span class="comment-time">1 day ago</span>
                                            </div>
                                            <p>I love the quality and the customer service was excellent!</p>
                                        </div>

                                    </div>
                                    <!-- Comment Form -->
                                    <div class="comment-form col-md-6">
                                        <form>
                                            <div class="mb-3">
                                                <label for="commentName" class="form-label">Your Name</label>
                                                <input type="text" class="form-control" id="commentName"
                                                    placeholder="Enter your name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="commentText" class="form-label">Your Comment</label>
                                                <textarea class="form-control" id="commentText" rows="4" placeholder="Write your comment"></textarea>
                                            </div>
                                            <button type="submit" class="btn ">Gửi đánh giá</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="product-related mb-4">
            <div class="container bg-white p-4">
                <h2 class="section-title">Sản phẩm tương tự</h2>
                <div class="related-stick row">
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                    <div class="col-md-4">
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
                </div>
            </div>
        </section>

    </main>
@endsection
