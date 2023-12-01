<div class="modal quick-view-modal fade" id="quickModal3" data-bs-backdrop="static" data-bs-keyboard="false"
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
                <p>Bạn muốn hủy đơn hàng này?</p>
                <button class="btn btn-danger" wire:click="cancel()">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<script>
    function refreshPage() {
        location.reload();
    }
</script>
