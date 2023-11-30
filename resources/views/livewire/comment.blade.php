<div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" wire:ignore>
    <div class="product-review-body">
        <div class="blog-comment mt-0">
            <h4 class="heading">Bình Luận ({{ $count }})</h4>
            <div class="blog-comment-item">
                @if($count>0)
                    @foreach($comments as $comment)
                        <div class="blog-comment-content">
                            <div class="user-meta">
                                <h2 class="user-name">{{ $comment -> customer_name }}</h2>
                                <span class="date">{{ $comment -> created_at }}</span>
                            </div>
                            <p class="user-comment">{{ $comment -> content }}
                            </p>
                        </div>
                    @endforeach
                @else
                    <div class="blog-comment-content">
                        <p>Chưa có bình luận nào về sản phẩm , hãy là người đầu tiên bình luận</p>
                    </div>
                @endif
            </div>
        </div>
        @if($customer_id!=null)
            <div class="feedback-area">
                <h2 class="heading"> comment</h2>
                <form class="feedback-form" wire:submit.prevent="submitForm">
                    <div class="form-field mt-30">
                        <textarea wire:model="message" placeholder="Message" class="textarea-field"></textarea>
                    </div>
                    <div class="button-wrap pt-5">
                        <button type="submit" value="submit" class="btn btn-custom-size xl-size btn-pronia-primary"
                            name="submit" onclick="reloadPage()" >Gửi review</button>
                    </div>
                </form>
            </div>
        @else
            <div class="feedback-area">
                <h2 class="heading"> comment</h2>
                <p>Bạn phải <a href="/loginCustomer">Đăng nhập</a> để có thể comment</p>
            </div>
        @endif
    </div>
</div>
<script>
    function reloadPage() {
        location.reload();
    }
</script>
