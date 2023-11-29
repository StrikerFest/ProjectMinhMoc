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
                            <a class="btn btn-custom-size lg-size btn-pronia-primary" href="cart.html">Thêm Giỏ Hàng</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
