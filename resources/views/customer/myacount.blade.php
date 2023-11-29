@extends('customer.layout.default')
@section('content')


<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height"
        data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">TÀI KHOẢN CỦA TÔI</h2>
                        <ul>
                            <li>
                                <a href="">Trang Chủ</a>
                            </li>
                            <li>Tài khoản của tôi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="account-page-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                aria-selected="true"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-address-tab" data-bs-toggle="tab" href="#account-address"
                                role="tab" aria-controls="account-address" aria-selected="false">Địa Chỉ</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details"
                                role="tab" aria-controls="account-details" aria-selected="false">Account Details</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" id="account-logout-tab" href="/logoutCustomer" role="tab"
                                aria-selected="false">Đăng Xuất</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                        <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                            aria-labelledby="account-dashboard-tab">
                            <div class="myaccount-dashboard">
                                <p>Hello <b>{{ $customer->name }}</b> (Không Phải là {{ $customer->name }}? <a
                                        href="/logoutCustomer">Sign
                                        out</a>)</p>
                                <p>Từ đây, bạn có thể xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh
                                    toán .</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-orders" role="tabpanel"
                            aria-labelledby="account-orders-tab">
                            <div class="myaccount-orders">
                                <h4 class="small-title">ĐƠN HÀNG CỦA TÔI</h4>
                                @livewire('customervieworder')

                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-address" role="tabpanel"
                            aria-labelledby="account-address-tab">
                            <div class="myaccount-address">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Địa chỉ</td>
                                            <td>
                                                trạng thái
                                            </td>
                                        </tr>
                                        @foreach($addressCustomer as $addressCustomer)
                                            <tr>

                                                <td>
                                                    <p>{{ $addressCustomer -> address }} ,
                                                        {{ $addressCustomer -> ward }},{{ $addressCustomer->district }},{{ $addressCustomer->province }}
                                                    </p>
                                                </td>
                                                @if($addressCustomer -> status == 1)
                                                    <td>Đang sử dụng</td>
                                                @else
                                                    <td><a href="/setAddress/{{ $addressCustomer -> id }}">Đặt làm
                                                            mặc định</a></td>
                                                @endif

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <li data-bs-toggle="modal" data-bs-target="#quickModal" style="list-style: none;">
                                    <a href="#" class="btn btn-dark" data-tippy="Thêm địa chỉ" data-tippy-inertia="true"
                                        data-tippy-animation="shift-away" data-tippy-delay="10" data-tippy-arrow="true">
                                        <span>Thêm Địa Chỉ</span>
                                    </a>
                            </div>
                        </div>
                        <!-- <div class="tab-pane fade" id="account-details" role="tabpanel"
                            aria-labelledby="account-details-tab">
                            <div class="myaccount-details">
                                <form action="#" class="myaccount-form">
                                    <div class="myaccount-form-inner">
                                        <div class="single-input single-input-half">
                                            <label>First Name*</label>
                                            <input type="text">
                                        </div>
                                        <div class="single-input single-input-half">
                                            <label>Last Name*</label>
                                            <input type="text">
                                        </div>
                                        <div class="single-input">
                                            <label>Email*</label>
                                            <input type="email">
                                        </div>
                                        <div class="single-input">
                                            <label>Current Password(leave blank to leave
                                                unchanged)</label>
                                            <input type="password">
                                        </div>
                                        <div class="single-input">
                                            <label>New Password (leave blank to leave
                                                unchanged)</label>
                                            <input type="password">
                                        </div>
                                        <div class="single-input">
                                            <label>Confirm New Password</label>
                                            <input type="password">
                                        </div>
                                        <div class="single-input">
                                            <button class="btn btn-custom-size lg-size btn-pronia-primary"
                                                type="submit">
                                                <span>SAVE CHANGES</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
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
                    @livewire('customeraddress')
                </div>
            </div>
        </div>
    </div>
</div>
@livewire('customerorder')
@livewire('cancelorder')

    @endsection
    <!-- Main Content Area End Here -->
