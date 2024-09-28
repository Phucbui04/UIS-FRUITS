<!doctype html>
<html lang="en">

<head>
    <title>Uis Fruits | @yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="../">
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
            <h1 class="offcanvas-title">Menu</h1>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav-menu-mobile list-unstyled">
                <li class="nav-item"><a href="#">Trang chủ</a></li>
                <li class="nav-item"><a href="#">Giới thiệu</a></li>
                <li class="nav-item"><a href="#">Sản phẩm</a></li>
                <li class="nav-item"><a href="#">Tin tức</a></li>
                <li class="nav-item"><a href="#">Liên hệ</a></li>
            </ul>
        </div>
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

    <script src="{{ asset('layouts/js/script.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Slick Slider JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script type="text/javascript" src="{{ asset('layouts/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

</body>

</html>
