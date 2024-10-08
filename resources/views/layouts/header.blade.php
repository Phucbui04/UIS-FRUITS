 <header>
     <div class="top-bar" id="topBar">
         <div class="container">
             <div class="d-flex justify-content-between align-items-center">
                 <ul class="contact-info nav">
                     <li class="nav-item d-flex align-items-center">
                         <i class='fa fa-phone'></i>
                         <a href="#" class="nav-link">0168216201</a>
                     </li>
                     <li class="nav-item d-flex align-items-center">
                         <i class="fa-solid fa-envelope"></i>
                         <a href="#" class="nav-link">contact@uis.com </a>
                     </li>
                 </ul>
                 <div class="auth-links nav justify-content-center align-items-center">
                     @if (Auth::check())
                         <li class="nav-item d-flex align-items-center">
                             <span class="nav-link">Xin chào, {{ Auth::user()->name }}</span>
                         </li>
                         <li class="nav-item">|</li>
                         <li class="nav-item d-flex align-items-center">
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                 @csrf
                             </form>
                             <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất</a>
                         </li>
                     @else
                         <li class="nav-item d-flex align-items-center">
                             <a href="{{ route('login') }}" class="nav-link">Đăng nhập</a>
                         </li>
                         <li class="nav-item">|</li>
                         <li class="nav-item d-flex align-items-center">
                             <a href="{{ route('register') }}" class="nav-link">Đăng ký</a>
                         </li>
                     @endif
                 </div>

             </div>
         </div>
     </div>


     <div class="nav-bar">
         <div class="container">
             <div class="row align-items-center justify-content-between">
                 <!-- Logo -->
                 <div class="logo col-lg-2  col-5">
                     <a href="#" class="text-decoration-none">
                         <h2 class="m-0">UIS <span>Fruits</span></h2>
                     </a>
                 </div>

                 <!-- Search Bar -->
                 <div class="search col-lg-4">
                     <input type="text" placeholder="Tìm kiếm sản phẩm">
                     <button><i class="fa-solid fa-magnifying-glass"></i></button>
                 </div>

                 <!-- Navigation Menu -->
                 <ul class="menu nav col-lg-5">
                     <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link">Trang chủ</a></li>
                     <li class="nav-item"><a href="about.html" class="nav-link">Giới thiệu</a></li>
                     <li class="nav-item"><a href="{{ route('product.index') }}" class="nav-link">Sản phẩm</a></li>
                     <li class="nav-item"><a href="news.html" class="nav-link">Tin tức</a></li>
                     <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
                 </ul>

                <!-- Biểu tượng Giỏ hàng -->
                <div class="cart col-lg-1">
                    <a href="{{ route('cart.index') }}" class="d-flex align-items-center">
                        <img src="{{ asset('layouts/img/cart-icon.svg') }}" alt="Giỏ hàng" class="img-fluid">
                        <span class="badge bg-danger translate-middle" id="cart-count">{{ count(Session::get('cart', [])) }}</span> <!-- Số lượng sản phẩm -->
                    </a>
                </div>



                     <!-- Mobile & Tablet Menu -->
                     <div class="mobile-menu col-5">
                         <button><i class="fa-solid fa-magnifying-glass"></i></button>
                         <button><i class="fa-solid fa-user"></i></button>
                         <button><i class="fa-solid fa-cart-shopping"></i></button>
                         <button type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-menu">
                             <i class="fa fa-bars"></i>
                         </button>
                     </div>
                 </div>
             </div>
         </div>
 </header>
