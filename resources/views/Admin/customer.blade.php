@extends('admin.layout.default')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div style="height: 600px;">

            <h6 class="mb-0 text-uppercase">Khách hàng</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $customer)
                                <tr>
                                    <th scope="row">{{ $loop -> index + 1 }}</th>
                                    <td>{{ $customer -> name }}</td>
                                    <td>{{ $customer -> phone }}</td>
                                    <td>{{ $customer -> email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
