<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tbody>
            <tr>
                <th>STT</th>
                <th>NGÀY ĐƠN HÀNG</th>
                <th>TRẠNG THÁI</th>
                <th>ĐỊA CHỈ</th>
                <th>TỔNG TIỀN</th>
            </tr>
            @if($order->count() == 0)
                <tr>
                    <td colspan="5" class="text-center">Bạn chưa đặt đơn hàng nào</td>
                </tr>
            @else
                @foreach($order as $order)
                    <tr>
                        <td style="display:none"> {{ $order -> id }} <a class="account-order-id" href="#"></a>
                        </td>
                        <td> {{ $loop -> index + 1 }} </td>
                        <td> {{ $order ->created_at }} </td>
                        @if($order -> Status == 0)
                            <td>Đang chờ xử lý</td>
                        @elseif($order -> Status == 1)
                            <td>Đang giao hàng</td>
                        @elseif($order -> Status == 2)
                            <td>Đã giao hàng</td>
                        @elseif($order -> Status == 3)
                            <td>Đã hủy</td>
                        @endif
                        <td>{{ $order -> province_name }} - {{ $order -> district_name }} -
                            {{ $order -> ward_name }} - {{ $order -> address }}</td>
                        <td>{{ $order -> Total_selling_price }}</td>
                        <td>
                            <li data-bs-toggle="modal" data-bs-target="#quickModal2" style="list-style: none;">
                                <a class="btn btn-dark" data-tippy="xem" data-tippy-inertia="true"
                                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder" wire:click.prefetch="quickView({{ $order->id }})">
                                    Xem
                                </a>
                            </li>
                        </td>

                        <td>
                            @if($order -> Status == 0)
                            <li data-bs-toggle="modal" data-bs-target="#quickModal3" style="list-style: none;">
                                <a class="btn btn-danger" data-tippy="hủy đơn hàng" data-tippy-inertia="true"
                                    data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                                    data-tippy-theme="sharpborder" wire:click.prefetch="cancelOrder({{ $order->id }})">
                                    Hủy
                                </a>
                            </li>
                            @endif
                        </td>

                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
