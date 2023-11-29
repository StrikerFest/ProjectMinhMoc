<div class="row">
    <div class="col-lg-6 col-12">
        <form action="/order" method="post">
            @method('POST')
            @csrf
            <div class="checkbox-form">
                <h3>Địa chỉ của bạn</h3>
                <div class="row">
                    <div class="col-md-12">
                    </div>
                    @if($customer==null)
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Tên <span class="required">*</span></label>
                                <input placeholder="" type="text" name="name" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <input type="text" name="phone" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Địa chỉ email <span class="required">*</span></label>
                                <input placeholder="" type="email" name="email" required="required">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                <select name="province" id="province" wire:model="province_id" required="required">
                                    <option value="">Chọn Tỉnh / Thành Phố</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Quận / Huyện <span class="required">*</span></label>
                                <select name="district" id="district" wire:model="district_id">
                                    @if($districts==null)
                                        <option value="">Chọn Quận / Huyện</option>
                                    @else
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Xã / Phường <span class="required">*</span></label>
                                <select name="ward" id="ward">
                                    @if($wards==null)
                                        <option value="">Chọn Xã / Phường</option>
                                    @else
                                        @foreach($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                <input placeholder="Street address" type="text" name="address" required="required">
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="checkout-form-list">
                                <label>Tên <span class="required">*</span></label>
                                <input placeholder="" type="text" name="name" value="{{ $customer->name }}"
                                    required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <input type="text" name="phone" value="{{ $customer->phone }}" required="required">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="checkout-form-list">
                                <label>Địa chỉ email <span class="required">*</span></label>
                                <input placeholder="" type="email" name="email" value="{{ $customer -> email }}"
                                    required="required">
                            </div>
                        </div>
                        @if($address == null)
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                    <select name="province" id="province" wire:model="province_id" required="required">
                                        <option value="">Chọn Tỉnh / Thành Phố</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Quận / Huyện <span class="required">*</span></label>
                                    <select name="district" id="district" wire:model="district_id">
                                        @if($districts==null)
                                            <option value="">Chọn Quận / Huyện</option>
                                        @else
                                            @foreach($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Xã / Phường <span class="required">*</span></label>
                                    <select name="ward" id="ward">
                                        @if($wards==null)
                                            <option value="">Chọn Xã / Phường</option>
                                        @else
                                            @foreach($wards as $ward)
                                                <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text" name="address" required="required">
                                </div>
                            </div>
                        @else
                            @foreach($address as $address)
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Tỉnh / Thành Phố <span class="required">*</span></label>
                                        <select name="province" id="province" wire:model="province_id"
                                            required="required">
                                            <option value="{{ $idCustomeraddress -> province }}">
                                                {{ $address->province }}
                                            </option>
                                            @foreach($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Quận / Huyện <span class="required">*</span></label>
                                        <select name="district" id="district" wire:model="district_id">
                                            @if($districts==null)
                                                <option value="{{ $idCustomeraddress -> district }}">
                                                    {{ $address->district }}</option>
                                            @else
                                                @foreach($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->name }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Xã / Phường <span class="required">*</span></label>
                                        <select name="ward" id="ward">
                                            @if($wards==null)
                                                <option value="{{ $idCustomeraddress -> ward }}">
                                                    {{ $address->ward }}</option>
                                            @else
                                                @foreach($wards as $ward)
                                                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ chi tiết <span class="required">*</span></label>
                                        <input placeholder="Địa chỉ chi tiết" type="text" name="address"
                                            required="required" value="{{ $address -> address }}">
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="payment-method">
                    <div class="payment-accordion">
                        <div id="accordion">
                            <h5>Hình Thức thanh toán</h5>
                            <label for="payment-cod" class="payment-option">
                                <input type="radio" name="payment_method" id="payment-cod" value="0">
                                Thanh toán khi nhận hàng
                            </label>
                            <br>
                            <label for="payment-momo" class="payment-option">
                                
                                <input type="radio" name="payment_method" id="payment-momo" value="1">
                                <img src="{{ asset('assets_customers/assets/images/checkout/momo.webp') }}" alt="" style="width: 20px; height: 20px; margin-left:10px;margin-right:10px;">
                                Thanh toán qua Momo
                            </label>
                            <br>                          
                        </div>
                    </div>
                </div>

                <div class="payment-method">
                    <div class="order-button-payment">
                        <input value="Đặt hàng " type="submit">
                    </div>
                </div>

            </div>

    </div>
    <div class="col-lg-6 col-12">
        <div class="your-order">
            <h3>Hóa Đơn</h3>
            <div class="your-order-table table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="cart-product-name">Sản Phẩm</th>
                            <th class="cart-product-total">Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $cartItem)
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    {{ $cartItem['name'] }}<strong class="product-quantity">
                                        × {{ $cartItem['quantity'] }}</strong></td>

                                <td class="cart-product-total"><span
                                        class="amount">{{ $cartItem['quantity']*$cartItem['price'] }}</span>
                                </td>

                                <td>

                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td>Phí ship</td>
                            <td>20.000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="cart-subtotal">
                        </tr>
                        <tr class="order-total">
                            <th>Tổng Tiền</th>
                            <td><strong><span class="amount">{{ $total + 20000 }}</span></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

</div>

