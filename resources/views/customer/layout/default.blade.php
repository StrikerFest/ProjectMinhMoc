<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Minh - Môc</title>
    <meta name="robots" content="index, follow" />
    <meta name="description"
        content="Pronia plant store bootstrap 5 template is an awesome website template for any home plant shop.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/Pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets_customers/assets/css/animate.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_customers/assets/css/nice-select.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/magnific-popup.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets_customers/assets/css/ion.rangeSlider.min.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets_customers/assets/css/style.css') }}">


    @livewireStyles

</head>

<body>
    <div class="preloader-activate preloader-active open_tm_preloader">
        <div class="preloader-area-wrap">
            <div class="spinner d-flex justify-content-center align-items-center h-100">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <header class="main-header-area">
            <div class="header-top bg-pronia-primary d-none d-lg-block">
                <div class="container">
                    
                </div>
            </div>
            <div class="header-middle py-30">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <div class="header-middle-wrap position-relative">
                                <div class="header-contact d-none d-lg-flex">
                                    <i class="pe-7s-call"></i>
                                    <a href="tel://0942603115">0942603115</a>
                                </div>

                                <a href="/home" class="header-logo">
                                    <img src="{{asset('assets_customers/assets/images/logo/dark.png')}}" style="width:111px;height:111px;"  alt="Header Logo">
                                </a>

                                <div class="header-right">
                                    <ul>
                                        <!-- <li>
                                            <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">
                                                <i class="pe-7s-search"></i>
                                            </a>
                                        </li> -->
                                        <li class="dropdown d-none d-lg-block">
                                            <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button"
                                                id="settingButton" data-bs-toggle="dropdown" aria-label="setting"
                                                aria-expanded="false">
                                                <i class="pe-7s-users"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="settingButton">
                                                @if(session()->has('customer'))
                                                <li><a class="dropdown-item" href="/myAccount">My account</a></li>
                                                <li><a class="dropdown-item" href="/logoutCustomer">logout</a></li>
                                                @else
                                                <li><a class="dropdown-item" href="/loginCustomer">Login |
                                                        Register</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li class="d-none d-lg-block">
                                            <a href="wishlist.html">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </li>
                                        @livewire('minicart')
                                        <li class="mobile-menu_wrap d-block d-lg-none">
                                            <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                                <i class="pe-7s-menu"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('menucustomer')
           
            <div class="mobile-menu_wrapper" id="mobileMenu">
                <div class="offcanvas-body">
                    <div class="inner-body">
                        <div class="offcanvas-top">
                            <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                        </div>
                        <div class="header-contact offcanvas-contact">
                            <i class="pe-7s-call"></i>
                            <a href="tel://0942603115">0942603115</a>
                        </div>
                        <div class="offcanvas-user-info">
                            <ul class="dropdown-wrap">
                               
                                
                                <li class="dropdown">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button"
                                        id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                        <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                        <li><a class="dropdown-item" href="/loginCustomer">Login | Register</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="offcanvas-menu_area">
                            <nav class="offcanvas-navigation">
                               
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            @livewire('cart')
        </header>
        <!-- Main Header Area End Here -->

        @yield('content')

        <!-- Begin Footer Area -->
        <div class="footer-area" data-bg-image="{{asset('assets_customers/assets/images/footer/bg/1-1920x465.jpg')}}">
            <div class="footer-top section-space-top-100 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="footer-widget-item">
                                <div class="footer-widget-logo">
                                    <a href="index.html">
                                        <img src="{{asset('assets_customers/assets/images/logo/dark2.png')}}" alt="Logo" style="width:111px;height:111px">
                                    </a>
                                </div>
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 pt-40">
                            <div class="footer-widget-item">
                                <h3 class="footer-widget-title">Useful Links</h3>
                                <ul class="footer-widget-list-item">
                                    <li>
                                        <a href="/contact">Liên Hệ với chúng tôi</a>
                                    </li>
                                    <li>
                                        <a href="#">Log in</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 pt-40">
                            <div class="footer-widget-item">
                                <h3 class="footer-widget-title">Tài Khoản của tôi</h3>
                                <ul class="footer-widget-list-item">
                                    <li>
                                        <a href="/loginCustomer">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a href="/cart">Xem Giỏ hàng</a>
                                    </li>
                                    <li>
                                        <a href="/contact">Help</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="col-lg-3 col-md-4 pt-40">
                            <div class="footer-contact-info">
                                <h3 class="footer-widget-title">Liên hệ qua hostline</h3>
                                <a class="number" href="tel://0942603115">0942603115</a>
                                <div class="address">
                                  
                                </div>
                            </div>
                            <div class="payment-method">
                                <a href="#">
                                    <img src="{{ asset('assets_customers/assets/images/checkout/momo.webp') }}" alt="Payment Method" style="width:50px;height:50px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright">
                                <span class="copyright-text">© 2023  Made with <i
                                        class="fa fa-heart text-danger"></i> by
                                    <a href="" rel="noopener" target="_blank">MinhChu</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End Here -->

        <!-- Begin Modal Area -->
        <div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away"
                            data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-wrap row">
                            <div class="col-lg-6">
                                <div class="modal-img">
                                    <div class="swiper-container modal-slider">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full"
                                                        src="{{asset('assets_customers/assets/images/product/large-size/1-1-570x633.jpg')}}"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full"
                                                        src="assets/images/product/large-size/1-2-570x633.jpg"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full"
                                                        src="assets/images/product/large-size/1-3-570x633.jpg"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                            <div class="swiper-slide">
                                                <a href="#" class="single-img">
                                                    <img class="img-full"
                                                        src="assets/images/product/large-size/1-4-570x633.jpg"
                                                        alt="Product Image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pt-5 pt-lg-0">
                                <div class="single-product-content">
                                    <h2 class="title">American Marigold</h2>
                                    <div class="price-box">
                                        <span class="new-price">$23.45</span>
                                    </div>
                                    <div class="rating-box-wrap">
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="review-status">
                                            <a href="#">( 1 Review )</a>
                                        </div>
                                    </div>
                                    <div class="selector-wrap color-option">
                                        <span class="selector-title border-bottom-0">Color</span>
                                        <select class="nice-select wide border-bottom-0 rounded-0">
                                            <option value="default">Black & White</option>
                                            <option value="blue">Blue</option>
                                            <option value="green">Green</option>
                                            <option value="red">Red</option>
                                        </select>
                                    </div>
                                    <div class="selector-wrap size-option">
                                        <span class="selector-title">Size</span>
                                        <select class="nice-select wide rounded-0">
                                            <option value="medium">Medium Size & Poot</option>
                                            <option value="large">Large Size With Poot</option>
                                            <option value="small">Small Size With Poot</option>
                                        </select>
                                    </div>
                                    <p class="short-desc">Lorem ipsum dolor sit amet, consectetur adipisic elit, sed do
                                        eiusmod
                                        tempo incid ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostru
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                        irure
                                        dolor
                                        in reprehenderit in voluptate</p>
                                    <ul class="quantity-with-btn">
                                        <li class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text">
                                            </div>
                                        </li>
                                        <li class="add-to-cart">
                                            <a class="btn btn-custom-size lg-size btn-pronia-primary"
                                                href="cart.html">Add to
                                                cart</a>
                                        </li>
                                        <li class="wishlist-btn-wrap">
                                            <a class="custom-circle-btn" href="wishlist.html">
                                                <i class="pe-7s-like"></i>
                                            </a>
                                        </li>
                                        <li class="compare-btn-wrap">
                                            <a class="custom-circle-btn" href="compare.html">
                                                <i class="pe-7s-refresh-2"></i>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="service-item-wrap pb-0">
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="assets/images/shipping/icon/car.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Free <br> Shipping</span>
                                            </div>
                                        </li>
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="assets/images/shipping/icon/card.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Safe <br> Payment</span>
                                            </div>
                                        </li>
                                        <li class="service-item">
                                            <div class="service-img">
                                                <img src="assets/images/shipping/icon/service.png" alt="Shipping Icon">
                                            </div>
                                            <div class="service-content">
                                                <span class="title">Safe <br> Payment</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="">
            <i class="fa fa-angle-double-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files
    ============================================ -->

    <script src="{{ asset('assets_customers/assets/js/vendor/bootstrap.bundle.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/vendor/jquery-3.6.0.min.js') }}">
    </script>
    <script
        src="{{ asset('assets_customers/assets/js/vendor/jquery-migrate-3.3.2.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/vendor/jquery.waypoints.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/vendor/modernizr-3.11.2.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/wow.min.js') }}"></script>
    <script src="{{ asset('assets_customers/assets/js/plugins/swiper-bundle.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/jquery.nice-select.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/parallax.min.js') }}"></script>
    <script
        src="{{ asset('assets_customers/assets/js/plugins/jquery.magnific-popup.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/tippy.min.js') }}"></script>
    <script src="{{ asset('assets_customers/assets/js/plugins/ion.rangeSlider.min.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/mailchimp-ajax.js') }}">
    </script>
    <script src="{{ asset('assets_customers/assets/js/plugins/jquery.counterup.js') }}">
    </script>

    <!--Main JS (Common Activation Codes)-->
    <script src="{{ asset('assets_customers/assets/js/main.js') }}"></script>
    @livewireScripts
</body>

</html>
