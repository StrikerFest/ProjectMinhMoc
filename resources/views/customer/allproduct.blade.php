@extends('customer.layout.default')
@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg')}}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Shop</h2>
                        <ul>
                            <li>
                                <a href="/">Trang Chủ</a>
                            </li>
                            <li>Sản Phẩm</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel"
                            aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row g-y-20">
                                @foreach($product as $item)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="/single-product/{{$item->id}}">
                                                <img class="primary-img"
                                                    src="http://127.0.0.1:8000/storage/images/{{$item->image}}"
                                                    alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/add-to-cart/{{$item->id}}" data-tippy="Add to cart"
                                                            data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                            data-tippy-delay="50" data-tippy-arrow="true"
                                                            data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="/single-product/{{$item->id}}">{{$item->name}}</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">{{$item->export_price}}</span>
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
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection;
