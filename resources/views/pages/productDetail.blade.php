@extends('layouts.master')
@section('title', 'Chi tiết sản phẩm')

@section('content')
    <!-- Main Content -->
    <main class="main-content">

        <section class="breadcrumb">
            <div class="container">
                <ul class="breadcrumb-list mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-separator">/</li>
                    <li class="breadcrumb-item"><a href="#">Chi tiết</a></li>
                    <li class="breadcrumb-separator">/</li>
                    <li class="breadcrumb-item"><a href="#">Sản phẩm {{ $product_detail->id }}</a></li>
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
                                <img id="main-image" src="{{ asset ( $product_detail->image ) }}"
                                    alt="Product Main Image">
                            </div>
                            <div class="thumbnail-images">
                                @foreach ($product_detail->images as $item)
                                    <img src="{{ asset( $item->image ) }}" alt="Image Thumbnail"
                                    onclick="changeImage('{{ asset( $item->image ) }}')">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Product Details Section -->
                    <div class="col-md-7">
                        <div class="product-info">
                            <h2 class="product-title">{{ $product_detail->name }}</h2>
                            <div class="product-status">
                                <span class="status">SKU: <span>{{ $sku }}</span></span>
                                <span>|</span>
                                <span class="status">Danh mục: <span>{{ $product_detail->category->name }}</span></span>
                                <span>|</span>
                                <span class="status">Tình trạng: 
                                    @if($product_detail->stock > 0)
                                        <span style="color: green;">Còn hàng</span>
                                    @else
                                        <span style="color: red;">Hết hàng</span>
                                    @endif
                                </span>
                            </div>
                            <div class="product-price">
                                <div class="price">
                                    {{ $product_detail->discount }} VND <span class="old-price">{{ $product_detail->price }} VND</span>
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
                                {{ $product_detail->description }}
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
                                    {{ $product_detail->descriptiondetail }}
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
            @foreach($related_products as $item)
            <div class="col-md-4">
                <div class="product-card">
                    <div class="new-badge">New</div>
                    <img src="https://product.hstatic.net/1000141988/product/nho_xanh_autumn_crisp_my_7ae52124f8474603bf8aeee5313abd08_large.png"
                        alt="Red Amaranth">
                    <h5>{{ $item->name }}</h5>
                    <div class="price">
                        $100.00 <span class="old-price">$120.00</span>
                    </div>
                    <div class="add-to-cart">
                        <i class="fa-solid fa-basket-shopping"></i>
                        <span class="cart-text">Thêm giỏ hàng</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

</main>
@endsection
