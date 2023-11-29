<div class="swiper-wrapper">
    @foreach($productLastest2 as $p)
        <div class="swiper-slide product-item">
            <div class="product-img">
                <a href="/single-product/{{$p->id}}">
                    <img class="primary-img" src="http://127.0.0.1:8000/storage/images/{{ $p->image }}"
                        alt="Product Images">
                </a>
                <div class="product-add-action">
                    <ul>
                        <li>
                            <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true"
                                data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder">
                                <i class="pe-7s-like"></i>
                            </a>
                        </li>
                        <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                            <a data-tippy="Quickview" data-tippy-inertia="true"
                                data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder"
                                wire:click.prefetch="quickView({{ $p->id }})">
                                <i class="pe-7s-look"></i>
                            </a>

                        </li>
                        <li>
                            <a data-tippy="Add to cart" data-tippy-inertia="true"
                                data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                data-tippy-theme="sharpborder" wire:click="addToCart({{ $p->id }})">
                                <i class="pe-7s-cart"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product-content">
                <a class="product-name" href="/single-product/{{$p->id}}">{{ $p->name }}</a>
                <div class="price-box pb-1">
                    <span class="new-price">{{ $p->export_price }}</span>
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

