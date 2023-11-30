<div>
    <div class="header-bottom d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-menu position-relative">
                        <nav class="main-nav">
                            <ul>
                                <li class="drop-holder">
                                    <a href="/home">Trang Chủ</a>

                                </li>
                                <li class="megamenu-holder">
                                    <a href="">Sản phẩm</a>
                                    <ul class="drop-menu megamenu">
                                        <li>
                                            <ul>
                                                @foreach($productCategory as $catergory)
                                                    <li>
                                                        <a
                                                            href="/all-product/{{ $catergory->id }}">{{ $catergory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="/contact">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-sticky py-4 py-lg-0">
        <div class="container">
            <div class="header-nav position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-6">

                        <a href="index.html" class="header-logo">
                            <img src="{{ asset('assets_customers/assets/images/logo/dark.png') }}"
                                style="width:111px;height:111px;" alt="Header Logo">
                        </a>

                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="main-menu">
                            <nav class="main-nav">
                                <ul>
                                    <li class="drop-holder">
                                        <a href="/home">Trang Chủ</a>
                                    </li>
                                    <li class="megamenu-holder">
                                        <a href="">Sản Phẩm</a>
                                        <ul class="drop-menu megamenu">
                                            <li>
                                                <ul>
                                                @foreach($productCategory as $catergory)
                                                    <li>
                                                        <a
                                                            href="/all-product/{{ $catergory->id }}">{{ $catergory->name }}</a>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li class="drop-holder">
                                                <a href="blog.html">Blog</a>
                                                <ul class="drop-menu">
                                                    <li>
                                                        <a href="blog-listview.html">Blog List View</a>
                                                    </li>
                                                    <li>
                                                        <a href="blog-detail.html">Blog Detail</a>
                                                    </li>
                                                </ul>
                                            </li> -->
                                    <!-- <li>
                                                <a href="about.html">About Us</a>
                                            </li> -->
                                    <!-- <li class="drop-holder">
                                                <a href="#">Pages</a>
                                                <ul class="drop-menu">
                                                    <li>
                                                        <a href="faq.html">FAQ</a>
                                                    </li>
                                                    <li>
                                                        <a href="404.html">Error 404</a>
                                                    </li>
                                                </ul>
                                            </li> -->
                                    <li>
                                        <a href="/contact">Liên hệ</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
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
                                        id="stickysettingButton" data-bs-toggle="dropdown" aria-label="setting"
                                        aria-expanded="false">
                                        <i class="pe-7s-users"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="stickysettingButton">
                                        @if(session()->has('customer'))
                                            <li><a class="dropdown-item" href="/myAccount">My account</a></li>
                                            <li><a class="dropdown-item" href="/logoutCustomer">Logout</a></li>
                                        @else
                                            <li><a class="dropdown-item" href="/loginCustomer">Login |
                                                    Register</a>
                                            </li>
                                        @endif
                                    </ul>
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
</div>
