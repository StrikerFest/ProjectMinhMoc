@extends('admin.layout.default')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Hóa Đơn</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa đơn chi tiết </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                </div>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        @if($order->Status)
                            <button type="button" class="btn btn-dark" onclick="window.print()"><i
                                    class="fa fa-print"></i> Print</button>
                        @else
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleDangerModal">Hủy Đơn Hàng</button>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#exampleSuccessModal">Xác Nhận Đơn Hàng</button>
                        @endif
                    </div>
                    <hr />
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
                                        <img src="assets/images/logo-icon.png" width="80" alt="" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
                                            Minh - Mộc
                                        </a>
                                    </h2>
                                    <div>A17 Tạ Quang Bửu, Bách Khoa, Hai Bà Trưng, Hà Nội</div>
                                    <div>0942603115</div>
                                    <div>Minh@gmail.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light"> Người Nhận:</div>
                                    <h2 class="to">{{ $order->name }}</h2>
                                    <div class="address"> {{$order -> address}}- {{ $ward -> name }} -
                                        {{ $district -> name }} - {{ $province -> name }}</div>
                                    <div class="email"><a href="mailto:{{ $order->email }}">{{ $order->email }}</a>
                                    <div class="phone">{{$order->phone}}</div>
                                    </div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">Mã Hóa Đơn: {{ $order->id }}</h1>
                                    <div class="date">Ngày Đặt Hàng: {{ $order -> created_at }}</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th class="text-left">Tên Sản Phẩm</th>
                                        <th class="text-right">Giá</th>
                                        <th class="text-right">Số Lượng </th>
                                        <th class="text-right">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_details as $or)
                                        <tr>
                                            <td class="no"></td>
                                            <td class="text-left">
                                                <h3>
                                                    {{ $or->product_name }}
                                                </h3>
                                            </td>
                                            <td class="unit">{{ $or->price }}</td>
                                            <td class="qty">{{ $or->quantity }}</td>
                                            <td class="total">{{ $or->price *$or->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <!-- <td colspan="2"></td>
                                            <td colspan="2">Tổng tiền</td>
                                            <td></td> -->
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Phí ship</td>
                                        <td>20000</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Tổng Tiền</td>
                                        <td>{{ $order->Total_selling_price }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="thanks">Cảm Ơn Bạn!</div>
                        </main>
                        <!-- <footer>Invoice was created on a computer and is valid without the signature and seal.
                            </footer> -->
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="exampleSuccessModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h5 class="modal-title text-white">Xác Nhân đơn Hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
                <p>Xác nhận đơn hàng này cho khách? {{ $order-> id }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                <a href="/changeStatus/{{ $order->id }}"><button type="button" class="btn btn-dark">Xác
                        Nhận</button></a>
            </div>
        </div>
    </div>
    
</div>
<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h5 class="modal-title text-white">Xác Nhận hủy Đơn Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <p> Xác nhận hủy đơn hàng </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Thoát</button>
                    <a href="/changeStatusCancel/{{$order->id}}"><button type="button" class="btn btn-dark">Xác Nhận</button></a>
                </div>
            </div>
        </div>
    </div>

@endsection
