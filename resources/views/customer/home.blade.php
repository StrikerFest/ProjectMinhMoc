@extends('customer.layout.default')
@section('content')


<!-- Begin Slider Area -->
<div class="slider-area">

<!-- Main Slider -->
<div class="swiper-container main-slider swiper-arrow with-bg_white">
    <div class="swiper-wrapper">
        <div class="swiper-slide animation-style-01">
            <div class="slide-inner style-1 bg-height" data-bg-image="{{ asset('assets_customers/assets/images/slider/bg/1-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                            <div class="slide-content text-black">
                               
                                <h2 class="title">Minh Mộc</h2>
                                <p class="short-desc"> Vua sen đá </p>
                                <!-- <div class="btn-wrap">
                                    <a class="btn btn-custom-size xl-size btn-pronia-primary" href="shop.html">Discover Now</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                            <div class="inner-img">
                                <div class="scene fill">
                                    <div class="expand-width" data-depth="0.2">
                                        <img src="{{asset('assets_customers/assets/images/slider/inner-img/banner1.png')}}" alt="Inner Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide animation-style-01">
            <div class="slide-inner style-1 bg-height" data-bg-image="{{ asset('assets_customers/assets/images/slider/bg/1-1.jpg') }}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                            <div class="slide-content text-black">
                                <h2 class="title">Minh Mộc</h2>
                                <p class="short-desc">Vua sen đá</p>
                                <!-- <div class="btn-wrap">
                                    <a class="btn btn-custom-size xl-size btn-pronia-primary" href="shop.html">Discover Now</a>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                            <div class="inner-img">
                                <div class="scene fill">
                                    <div class="expand-width" data-depth="0.2">
                                        <img src="{{asset('assets_customers/assets/images/slider/inner-img/Untitled-1.png')}}" alt="Inner Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination d-md-none"></div>

    <!-- Add Arrows -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

</div>
<!-- Slider Area End Here -->

<!-- Begin Shipping Area -->

<!-- Shipping Area End Here -->

<!-- Begin Product Area -->
@livewire('home-product')
<!-- Product Area End Here -->

<!-- Begin Banner Area -->
<div class="banner-area section-space-top-90">
<div class="container">
    <div class="row g-min-30 g-4">
        <div class="col-lg-8">
            <div class="banner-item img-hover-effect">
                <div class="banner-img">
                    <img src="{{asset('assets_customers/assets/images/banner/banner1.png')}}" alt="Banner Image">
                </div>
                <div class="banner-content text-position-left">
                    <span class="collection" style="color : white;">Bộ Sưu tâp </span>
                    <h3 class="title" style="color : white;">Sen Đá</h3> 
                    <div class="button-wrap">
                        <a class="btn btn-custom-size btn-pronia-primary" href="shop.html"> Xem Thêm</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="banner-item img-hover-effect">
                <div class="banner-img">
                    <img src="{{asset('assets_customers/assets/images/banner/banner3.png')}}" alt="Banner Image">
                </div>
                <!-- <div class="banner-content text-position-center">
                    <div class="button-wrap">
                        <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Xem Thêm</a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="banner-item img-hover-effect">
                <div class="banner-img">
                    <img src="{{asset('assets_customers/assets/images/banner/banner4.png')}}" alt="Banner Image">
                </div>
                <!-- <div class="banner-content text-position-center">
                    <span class="collection">New Collection</span>
                    <h3 class="title">Plant Port</h3>
                    <div class="button-wrap">
                        <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                            Now</a>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="col-lg-8">
            <div class="banner-item img-hover-effect">
                <div class="banner-img">
                    <img src="{{asset('assets_customers/assets/images/banner/banner2.png')}}" alt="Banner Image">
                </div>
                <div class="banner-content text-position-left">
                    <span class="collection" style="color : white;">Bộ Sưu tâp </span>
                    <h3 class="title" style="color : white;">Cây Xương Rồng</h3> 
                    <div class="button-wrap">
                        <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Xem Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Banner Area End Here -->

<!-- Begin Product Area -->
<div class="product-area section-space-top-100">
<div class="container">
    <div class="row">
        <div class="section-title-wrap without-tab">
            <h2 class="section-title">Sản Phẩm Mới</h2>
        </div>
        <div class="col-lg-12">
            <div class="swiper-container product-slider">
               @livewire('home')
            </div>
        </div>
    </div>
</div>
</div>
<!-- Product Area End Here -->

<!-- Begin Testimonial Area -->
<div class="testimonial-area section-space-top-90 section-space-bottom-95">
<div class="container-fluid">
    <div class="testimonial-bg" data-bg-image="assets/images/testimonial/bg/1-1-1820x443.jpg">
        <div class="section-title-wrap">
            <h2 class="section-title">Khác hàng nói gì</h2>
            <p class="section-desc mb-0">
            </p>
        </div>
    </div>
    <div class="container custom-space">
        <div class="swiper-container testimonial-slider with-bg">
            <div class="swiper-wrapper">
                <div class="swiper-slide testimonial-item">
                    <div class="user-info mb-3">
                        <div class="user-shape-wrap">
                            <div class="user-img">
                                <img src="{{asset('assets_customers/assets/images/testimonial/user/2.jpg')}}" alt="User Image" style="width:77px;height: 77px;">
                            </div>
                        </div>
                        <div class="user-content text-charcoal">
                            <h4 class="user-name mb-1">Anh</h4>
                            <span class="user-occupation">Client</span>
                        </div>
                    </div>
                    <p class="user-comment mb-6">Cây rất đẹp
                    </p>
                </div>
                <div class="swiper-slide testimonial-item">
                    <div class="user-info mb-3">
                        <div class="user-shape-wrap">
                            <div class="user-img">
                                <img src="{{asset('assets_customers/assets/images/testimonial/user/1.jpg')}}" alt="User Image" style="width:77px;height: 77px;">
                            </div>
                        </div>
                        <div class="user-content text-charcoal">
                            <h4 class="user-name mb-1">Eigo</h4>
                            <span class="user-occupation">Client</span>
                        </div>
                    </div>
                    <p class="user-comment mb-6">Đóng gói cẩn thận
                    </p>
                </div>
                <div class="swiper-slide testimonial-item">
                    <div class="user-info mb-3">
                        <div class="user-shape-wrap">
                            <div class="user-img">
                                <img src="{{asset('assets_customers/assets/images/testimonial/user/3.jpg')}}" alt="User Image" style="width:77px;height: 77px;">
                            </div>
                        </div>
                        <div class="user-content text-charcoal">
                            <h4 class="user-name mb-1">Nhung</h4>
                            <span class="user-occupation">Client</span>
                        </div>
                    </div>
                    <p class="user-comment mb-6"> Giao hàng nhanh
                    </p>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination without-absolute"></div>
        </div>
    </div>
</div>
</div>
<!-- Testimonial Area End Here -->

<!-- Begin Brand Area -->
<div class="brand-area section-space-bottom-100">
<div class="container">
    <div class="brand-bg" data-bg-image="{{asset('assets_customers/assets/images/brand/bg/1-1170x300.jpg')}}">
        <div class="row">
            <div class="col-lg-12">
                <div class="swiper-container brand-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <a class="brand-item" href="#">
                                <img src="{{asset('assets_customers/assets/images/brand/1-1.jpg')}}" alt="Brand Image" style="width: 150px;height: 150px;">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="#">
                                <img src="{{asset('assets_customers/assets/images/brand/1-2.jpg')}}" alt="Brand Image" style="width: 150px;height: 150px;">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="#">
                                <img src="{{asset('assets_customers/assets/images/brand/1-3.jpg')}}" alt="Brand Image" style="width: 150px;height: 150px;">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="#">
                                <img src="{{asset('assets_customers/assets/images/brand/1-4.jpg')}}" alt="Brand Image" style="width: 150px;height: 150px;">
                            </a>
                        </div>
                        <div class="swiper-slide">
                            <a class="brand-item" href="#">
                                <img src="{{asset('assets_customers/assets/images/brand/1-5.jpg')}}" alt="Brand Image" style="width: 150px;height: 150px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Brand Area End Here -->

<!-- Begin Blog Area -->
<div class="blog-area section-space-bottom-100">
<!-- <div class="container">
    <div class="section-title-wrap">
        <h2 class="section-title mb-7">Latest Blog</h2>
        <p class="section-desc">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
            roots in a piece of classical Latin literature
        </p>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="swiper-container blog-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="blog-item">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li class="author">
                                            <a href="#">By: Admin</a>
                                        </li>
                                        <li class="date">24 April 2021</li>
                                    </ul>
                                </div>
                                <h2 class="title">
                                    <a href="blog.html">There Many Variations</a>
                                </h2>
                                <p class="short-desc mb-7">Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                    sed do eiusmod tempor incidio ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="blog-img img-hover-effect">
                                <a href="blog.html">
                                    <img class="img-full" src="{{asset('')}}" alt="Blog Image">
                                </a>
                                <div class="inner-btn-wrap">
                                    <a class="inner-btn" href="blog.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li class="author">
                                            <a href="#">By: Admin</a>
                                        </li>
                                        <li class="date">24 April 2021</li>
                                    </ul>
                                </div>
                                <h2 class="title">
                                    <a href="blog.html">Maecenas Laoreet Massa</a>
                                </h2>
                                <p class="short-desc mb-7">Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                    sed do eiusmod tempor incidio ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="blog-img img-hover-effect">
                                <a href="blog.html">
                                    <img class="img-full" src="assets/images/blog/medium-size/1-2-310x220.jpg" alt="Blog Image">
                                </a>
                                <div class="inner-btn-wrap">
                                    <a class="inner-btn" href="blog.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="blog-item">
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <ul>
                                        <li class="author">
                                            <a href="#">By: Admin</a>
                                        </li>
                                        <li class="date">24 April 2021</li>
                                    </ul>
                                </div>
                                <h2 class="title">
                                    <a href="blog.html">Aenean Vulputate Lorem</a>
                                </h2>
                                <p class="short-desc mb-7">Lorem ipsum dolor sit amet, consecteturl adipisl elit,
                                    sed do eiusmod tempor incidio ut labore et dolore magna aliqua.</p>
                            </div>
                            <div class="blog-img img-hover-effect">
                                <a href="blog.html">
                                    <img class="img-full" src="assets/images/blog/medium-size/1-3-310x220.jpg" alt="Blog Image">
                                </a>
                                <div class="inner-btn-wrap">
                                    <a class="inner-btn" href="blog.html">
                                        <i class="pe-7s-link"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div> -->
</div>
<!-- Blog Area End Here -->

<!-- Begin Modal Area -->
    @livewire('quickview')
        <!-- Modal Area End Here -->

@endsection