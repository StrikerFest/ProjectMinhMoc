
<div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="quickModal" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close"
                    data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
                    data-tippy-arrow="true" data-tippy-theme="sharpborder">
                </button>
            </div>  
            <div class="modal-body" >
             @if($p!=null)
                <div class="modal-wrap row">
                    <div class="col-lg-6">
                        <div class="modal-img">
                            <div class="swiper-container modal-slider">
                            <img class="img-full" src="http://127.0.0.1:8000/storage/images/{{$p['image']}}" alt="Product Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <div class="single-product-content">
                            <h2 class="title">{{$p['name']}}</h2>
                            <div class="price-box">
                                <span class="new-price">{{$p['export_price']}}</span>
                            </div>
                            <div class="rating-box-wrap">
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="review-status">
                                    <a href="#">( 1 Review )</a>
                                </div>
                            </div>
                           
                            <p class="short-desc">{!!$p['description']!!}</p>
                            <ul class="quantity-with-btn">
                                <li class="add-to-cart">
                                    <a class="btn btn-custom-size lg-size btn-pronia-primary" href="/add-to-cart/{{$p['id']}}">Add to
                                        cart</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                 
                </div>
                @endif
            </div>
           
        </div>
    </div>
</div>
