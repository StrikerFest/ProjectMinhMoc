<div>
    <div class="row">
        <form action="/customeraddress" method="post">
            @method('POST')
            @csrf
            <div class="checkbox-form">
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
                <div class="col-md-12">
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
                <div class="col-md-12">
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
                <div class="order-button-payment">
                        <input value="Thêm" type="submit">
                    </div>
            </div>
        </form>
    </div>

</div>
