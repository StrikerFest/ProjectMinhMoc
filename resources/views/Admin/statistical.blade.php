@extends('admin.layout.default')
@section('content')


<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Thống Kê</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Thông kê doanh Thu</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>Thống kê doanh thu</h5>
                <br>
                <p>Bảng Thống kê doanh thu trong năm nay</p>
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Tháng 1</th>
                                <th>Tháng 2</th>
                                <th>Tháng 3</th>
                                <th>Tháng 4</th>
                                <th>Tháng 5</th>
                                <th>Tháng 6</th>
                                <th>Tháng 7</th>
                                <th>Tháng 8</th>
                                <th>Tháng 9</th>
                                <th>Tháng 10</th>
                                <th>Tháng 11</th>
                                <th>Tháng 12</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($monthly_revenue as $item)
                                    <th>{{ $item }}</th>
                                @endforeach
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5>Thống kê doanh thu theo ngày</h5>
                <br>
                <label for="selectYear">Chọn năm:</label>
                <form action="/admin/monyear" method="post">
                    @csrf
                    <select id="selectYear" name="selectedYear">
                        <option value="">-- Chọn năm --</option>
                        <?php
                    $currentYear = date("Y");
                    for ($year = $currentYear; $year >= ($currentYear - 10); $year--) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                    ?>
                    </select>
                    <label for="selectMonth">Chọn tháng:</label>
                    <select id="selectMonth" name="selectedMonth">
                        <option value="">-- Chọn tháng --</option>
                        <option value="1">Tháng 1</option>
                        <option value="2">Tháng 2</option>
                        <option value="3">Tháng 3</option>
                        <option value="4">Tháng 4</option>
                        <option value="5">Tháng 5</option>
                        <option value="6">Tháng 6</option>
                        <option value="7">Tháng 7</option>
                        <option value="8">Tháng 8</option>
                        <option value="9">Tháng 9</option>
                        <option value="10">Tháng 10</option>
                        <option value="11">Tháng 11</option>
                        <option value="12">Tháng 12</option>
                    </select>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Xem Thống kê</button>
                </form>
                <br>
                <p>Bảng Thống kê doanh thu trong Tháng</p>
                <div class="table-responsive">
                    <table id="example3" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Ngày</th>
                                <th>Doanh Thu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($revenueByDay as $item)
                                <tr>

                                    <td>{{ $item ->date }}</td>
                                    <td>{{ $item ->revenue }}</td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });

    </script>
    <script>
        $(document).ready(function () {
            var table = $('#example3').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example3_wrapper .col-md-6:eq(0)');
        });

    </script>
    @endsection
