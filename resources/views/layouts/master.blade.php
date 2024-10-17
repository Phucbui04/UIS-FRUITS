<!doctype html>
<html lang="en">

<head>
    <title>UIS FRUITS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('layouts/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('layouts/css/global.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
</head>

<body>


    @include('layouts.header')


    <main>
        @yield('content')
    </main>


    @include('layouts.footer')



    <!-- Offcanvas Sidebar for Mobile Navigation -->
    <div class="offcanvas offcanvas-start" id="offcanvas-menu">
        <div class="offcanvas-header">
            <div class="offcanvas-title">
                <a href="{{route('home.index')}}" class="text-decoration-none">
                    <h2 class="m-0">UIS <span>Fruits</span></h2>
                </a>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="menu-offcanvas list-unstyled">
                <li class="nav-item"><a href="{{route('home.index')}}">Trang chủ</a></li>
                <li class="nav-item"><a href="#">Giới thiệu</a></li>
                <li class="nav-item"><a href="{{route('product.index')}}">Sản phẩm</a></li>
                <li class="nav-item"><a href="#">Tin tức</a></li>
                <li class="nav-item"><a href="#">Liên hệ</a></li>
            </ul>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" id="category-shop">
        <div class="offcanvas-header">
            <h3 class="offcanvas-title">Danh mục sản phẩm</h3>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <ul class="category-list list-unstyled mb-0">
            <li class="category-item"><a href="#">Khuyến mãi hot</a></li>
            <li class="category-item"><a href="#">Trái cây & hoa</a></li>
            <li class="category-item"><a href="#">Giỏ trái cây</a></li>
            <li class="category-item"><a href="#">Quà tặng</a></li>
            <li class="category-item"><a href="#">Thịt cá, trứng & hải sản</a></li>
            <li class="category-item"><a href="#">Rau củ & nấm</a></li>
        </ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var textContent = document.getElementById('text-content');
            var toggleButton = document.getElementById('toggle-button-content');

            // Kiểm tra nếu nội dung dài hơn 250 ký tự
            if (textContent.textContent.length > 900) {
                toggleButton.style.display = 'block'; // Hiển thị nút "Xem thêm"
            }

            toggleButton.addEventListener('click', function() {
                if (textContent.classList.contains('expanded')) {
                    textContent.classList.remove('expanded');
                    this.textContent = 'Xem thêm';
                } else {
                    textContent.classList.add('expanded');
                    this.textContent = 'Thu gọn ';
                }
            });
        });
    </script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="{{ asset('layouts/js/main.js') }}"></script>
    <!-- Slick Slider JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
   
</body>

</html>
