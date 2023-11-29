<div class="cart-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="javascript:void(0)">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>

                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Tên Sản Phẩm</th>
                                    <th class="product-price">Đơn giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng tiền</th>
                                    <th class="product_remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cart!=null)
                                    @foreach($cart as $item)

                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="http://127.0.0.1:8000/storage/images/{{ $item['image'] }}"
                                                        alt="Cart Thumbnail" style="width:100px;height:100px;">
                                                </a>
                                            </td>
                                            <td class="product-name"><a
                                                    href="#">{{ $item['name'] }}</a></td>
                                            <td class="product-price"><span
                                                    class="amount">{{ $item['price'] }}</span>
                                            </td>
                                            <td class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box"
                                                        value="{{ $item['quantity'] }}"
                                                        type="text" min="0">
                                                    <div class="dec qtybutton">
                                                        <i class="fa fa-minus"
                                                            wire:click.prefetch="reduce({{ $item['id'] }})"></i>
                                                    </div>
                                                    <div class="inc qtybutton">
                                                        <i class="fa fa-plus"
                                                            wire:click="increase({{ $item['id'] }})"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal"><span
                                                    class="amount">{{ $item['quantity']*$item['price'] }}</span>
                                            </td>
                                            <td class="product_remove">
                                                <a href="#">
                                                    <i class="pe-7s-close" data-tippy="Remove" data-tippy-inertia="true"
                                                        data-tippy-animation="shift-away" data-tippy-delay="50"
                                                        data-tippy-arrow="true" data-tippy-theme="sharpborder"
                                                        wire:click="remove({{ $item['id'] }})"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <h3>Không có sản phẩm nào trong giỏ hàng</h3>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @if($cart!=null)
                        <div class="row">
                            <div class="col-12">
                                <div class="coupon-all">
                                    <div class="coupon2">
                                        <input class="button" name="update_cart" value="Xóa toàn bộ giỏ hàng"
                                            type="submit" wire:click.prefetch="deleteAll()">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Tổng tiền</h2>
                                        <ul>
                                            <li>Subtotal <span>{{ $total }}</span></li>
                                            <li>Total <span>{{ $total }}</span></li>
                                        </ul>
                                        <a href="/checkout">Tiếp tục thanh toán</a>
                                    </div>
                                </div>
                            </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
