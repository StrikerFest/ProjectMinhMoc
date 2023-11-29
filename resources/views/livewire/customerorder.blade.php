<div class="modal quick-view-modal fade" id="quickModal2" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="quickModal" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder">
                </button>
            </div>
            <div class="modal-body">
                <div class="minicart-content">
                    <div class="table-responsive">
                        <h4>Chi tiết đơn hàng</h4>
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <td>STT</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Giá</td>
                                </tr>

                                @foreach($order_details as $or)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $or->product_name }}</td>
                                        <td>{{ $or->quantity }}</td>
                                        <td style="text-align:right">{{ $or->price }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td>Phí ship:</td>
                                    <td colspan="4" style="text-align:right">20.000</td>
                                </tr>
                            </tbody>
                            <p><strong>Trạng thái đơn hàng:</strong> 
                                
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
