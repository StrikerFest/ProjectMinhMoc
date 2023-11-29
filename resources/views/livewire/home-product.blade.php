<div class="product-area section-space-top-100">
    <div class="container">
        <div class="section-title-wrap">
            <h2 class="section-title mb-0">Sản Phẩm</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="active" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab"
                            aria-controls="featured" aria-selected="true">
                            Mới Nhất
                        </a>
                    </li>
                    <!-- <li class="nav-item" role="presentation">
                        <a id="latest-tab" data-bs-toggle="tab" href="#latest" role="tab" aria-controls="latest"
                            aria-selected="false">
                            Mới Nhất
                        </a>
                    </li> -->
                    <li class="nav-item" role="presentation">
                        <a id="bestseller-tab" data-bs-toggle="tab" href="#bestseller" role="tab"
                            aria-controls="bestseller" aria-selected="false">
                            Bán Chạy Nhất
                        </a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="product-item-wrap row">
                            @foreach($productLastest as $productLastest)
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="/single-product/{{ $productLastest->id }}">
                                                <img class="primary-img"
                                                    src="http://127.0.0.1:8000/storage/images/{{ $productLastest->image }}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <!-- <a href="wishlist.html" data-tippy="Add to wishlist"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a> -->
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a data-tippy="Quickview" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                            wire:click.prefetch="quickView({{ $productLastest->id }})">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-tippy="Add to cart" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                            wire:click="addToCart({{ $productLastest->id }})">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name"
                                                href="/single-product/{{ $productLastest->id }}">{{ $productLastest->name }}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{ $productLastest->export_price }}</span>
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
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">

                    </div>
                    <div class="tab-pane fade" id="bestseller" role="tabpanel" aria-labelledby="bestseller-tab">
                        <div class="product-item-wrap row">
                            @foreach($productBestSeller as $productBestSeller)
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="/single-product/{{ $productBestSeller->id }}">
                                                <img class="primary-img"
                                                    src="http://127.0.0.1:8000/storage/images/{{ $productBestSeller->image }}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a data-tippy="Quickview" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                            wire:click.prefetch="quickView({{ $productBestSeller->id }})">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a data-tippy="Add to cart" data-tippy-inertia="true"
                                                            data-tippy-animation="shift-away" data-tippy-delay="50"
                                                            data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                            wire:click="addToCart({{ $productBestSeller->id }})">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name"
                                                href="/single-product/{{ $productLastest->id }}">{{ $productBestSeller->name }}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{ $productBestSeller->export_price }}</span>
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
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
