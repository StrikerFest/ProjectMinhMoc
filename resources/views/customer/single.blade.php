@extends('customer.layout.default')
@section('content')
<main class="main-content">
    <div class="single-product-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-product-img">
                        <div class="swiper-container single-product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="assets/images/product/large-size/1-1-570x633.jpg"
                                        class="single-img gallery-popup">
                                        <img class="img-full"
                                            src="http://127.0.0.1:8000/storage/images/{{ $product->image }}"
                                            alt="Product Image">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="thumbs-arrow-holder">
                            <div class="swiper-container single-product-thumbs">
                                <div class="swiper-wrapper">
                                </div>
                                <!-- Add Arrows -->
                                <div class=" thumbs-button-wrap d-none d-md-block">
                                    <div class="thumbs-button-prev">
                                        <i class="pe-7s-angle-left"></i>
                                    </div>
                                    <div class="thumbs-button-next">
                                        <i class="pe-7s-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0">
                    <div class="single-product-content">
                        <h2 class="title">{{ $product->name }}</h2>
                        <div class="price-box">
                            <span class="new-price">{{ $product->export_price }}</span>
                        </div>
                        <div class="rating-box-wrap pb-4">
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
                                <a href="javascript:void(0);"></a>
                            </div>
                        </div>

                        <ul class="quantity-with-btn">

                            <li class="add-to-cart">
                                <a class="btn btn-custom-size lg-size btn-pronia-primary"
                                    href="/add-to-cart/{{ $product->id }}">Thêm Giỏ Hàng</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav product-tab-nav tab-style-2 pt-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" id="information-tab" data-bs-toggle="tab" href="#information" role="tab"
                                aria-controls="information" aria-selected="false">
                                Thông tin
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                                aria-controls="reviews" aria-selected="false">
                                Reviews({{ $count }})
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content product-tab-content">
                        <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                            <div class="product-information-body">
                                {!!$product->description!!}
                            </div>
                        </div>

                      @livewire('comment', ['product_id' => $product->id])
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin Product Area -->
    <div class="product-area section-space-y-axis-90">
        <div class="container">
            <div class="row">
                <div class="section-title-wrap without-tab">
                    <h2 class="section-title">Sản Phẩm Liên quan</h2>
                </div>
                <div class="col-lg-12">
                    <div class="swiper-container product-slider">
                        <div class="swiper-wrapper">
                            @foreach($productByCategory as $item)
                                <div class="swiper-slide product-item">
                                    <div class="product-img">
                                        <a href="/single-product/{{ $item->id }}">
                                            <img class="primary-img"
                                                src="http://127.0.0.1:8000/storage/images/{{ $item->image }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-add-action">
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a class="product-name"
                                            href="single-product-variable.html">{{ $item->name }}</a>
                                        <div class="price-box pb-1">
                                            <span class="new-price">{{ $item -> export_price }}</span>
                                        </div>
                                        <div class="rating-box">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

</main>

@endsection
