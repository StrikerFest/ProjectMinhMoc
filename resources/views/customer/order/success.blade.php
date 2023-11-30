@extends('customer.layout.default')
@section('content')
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height"
             data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <ul>
                                <li>
                                    <a href="/">Trang Chủ</a>
                                </li>
                                <li>Đặt hàng thành công</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h1 style="text-align: center">Đơn hàng {{$id}} đã được đặt thành công! <a href="/">Bấm vào đây để trở về trang chủ</a></h1>
        </div>
    </main>
@endsection
