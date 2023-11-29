<div class="offcanvas-minicart_wrapper" id="miniCart">
    @if($cart!=null)
        <div class="offcanvas-body">

            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4 class="mb-0">Giỏ hàng</h4>
                    <a class="button-close" wire:ignore.self><i class="pe-7s-close" data-tippy="Close"
                            data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                            data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
                </div>
                
                    <ul class="minicart-list">
                    @foreach($cart as $item)
                        <li class="minicart-product">
                          
                            <a class="product-item_img">
                                <img class="img-full"
                                    src="http://127.0.0.1:8000/storage/images/{{ $item['image'] }}"
                                    alt="Product Image">
                            </a>
                            <div class="product-item_content">
                                <a class="product-item_title">{{ $item['name'] }}</a>
                                <span class="product-item_quantity">{{ $item['quantity'] }} x
                                    {{ $item['price'] }}</span>
                            </div>
                        </li>
                        @endforeach
                    </ul>
               
            </div>
            <div class="minicart-item_total">
                <span>Tổng Tiền: </span>
                <span class="ammount">{{ $total }}</span>
            </div>
            <div class="group-btn_wrap d-grid gap-2">
                <a href="/cart" class="btn btn-dark">Xem chi tiết</a>
            </div>

        </div>
    @else
        <div class="offcanvas-body">
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4 class="mb-0">Giỏ hàng</h4>
                    <a class="button-close" wire:ignore.self><i class="pe-7s-close" data-tippy="Close"
                            data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                            data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
                </div>
                <div class="minicart-item_total">
                    <span>Bạn chưa có sản phẩm nào trong giỏ hàng</span>
                </div>
            </div>
        </div>
    @endif
</div>
<div class="global-overlay"></div>
