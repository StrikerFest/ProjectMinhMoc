@extends('customer.layout.default')
@section('content')
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height"
        data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Giỏ hàng</h2>
                        <ul>
                            <li>
                                <a href="/">Trang Chủ</a>
                            </li>
                            <li>Giỏ Hàng</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewire('cartdetail')

</main>
@endsection
