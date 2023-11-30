@extends('customer.layout.default')
@section('content')

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height"
        data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Trang Thanh Toán</h2>
                        <ul>
                            <li>
                                <a href="/cart">Giỏ hàng</a>
                            </li>
                            <li>Thanh Toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="coupon-accordion">
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">
                                <form action="javascript:void(0)">
                                    <p class="form-row-first">
                                        <label class="mb-1">Username or email <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row-last">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="text">
                                    </p>
                                    <p class="form-row">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </p>
                                    <p class="lost-password"><a href="#">Lost your password?</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @livewire('checkout')
        </div>
    </div>
</main>
@endsection
