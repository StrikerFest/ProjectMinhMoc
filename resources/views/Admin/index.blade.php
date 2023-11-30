@extends('admin.layout.default')
@section('content')
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Số lượng sản phẩm</p>
                                <h4 class="my-1">{{ $countProduct }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Tổng số khác hàng</p>
                                <h4 class="my-1">{{ $countCustomer }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0">Tổng số đơn hàng</p>
                                <h4 class="my-1">{{ $countOrder }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end row-->
        <div class="row row-cols-1 row-cols-xl-2">
            <div class="col-12 col-xl-12 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-1">Doanh Thu Theo Tháng</h5>

                            </div>
                            <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-sm-3 mt-4">
                            <div class="col">
                                <div>
                                    <p class="mb-0">Doanh thu trong tháng:</p>
                                    <h4 class="my-1 text-white">{{ $countRevenueInMonthInYear }}</h4>

                                    <p class="mb-0 font-13"><i class='bx bxs-up-arrow align-middle'></i>
                                        {{ $RevenueInmoth }}
                                        So với tháng trước</p>
                                </div>
                            </div>

                        </div>

                        <div id="chart4">
                            <input type="hidden" id="monthly_revenue" value="{{ $monthly_revenue }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Sản Phẩm bán chạy nhất</h5>
                            </div>

                        </div>
                    </div>
                    <div class="customers-list p-3 mb-3">
                        @foreach($top10Product as $top)
                            <div class="row border mx-0 py-2 radius-10 cursor-pointer">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center">
                                        <div class="product-img">
                                            <img src="http://127.0.0.1:8000/storage/images/{{ $top->image }}"
                                                alt="" />
                                        </div>
                                        <div class="ms-2">
                                            <h6 class="mb-1">{{ $top->name }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <h5 class="mb-0">Sản Phẩm Sắp hết hàng</h5>
                            </div>
                        </div>
                        <div class="customers-list p-3 mb-3">
                            @foreach($top5Product as $top)
                                <div class="row border mx-0 py-2 radius-10 cursor-pointer">
                                    <div class="col-sm-6">
                                        <div class="d-flex align-items-center">
                                            <div class="product-img">
                                                <img src="http://127.0.0.1:8000/storage/images/{{ $top->image }}"
                                                    alt="" />
                                            </div>
                                            <div class="ms-2">
                                                <h6 class="mb-1">{{ $top->name }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-lg-3">

        <div class="col-12 col-xl-12 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Tổng Hợp Đơn Hàng</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
                    <hr />
                    <div class="row m-0 row-cols-1 row-cols-md-4">
                        <div class="col border-end">
                            <div id="chart16"></div>
                            <input type="hidden" id="percentOrderCancel" value="{{ $percentOrderCancel }}">
                        </div>
                        <div class="col border-end">
                            <div id="chart17"></div>
                            <input type="hidden" id="percentOrderSuccess" value="{{ $percentOrderSuccess }}">
                        </div>
                        <div class="col">
                            <div id="chart18"></div>
                            <input type="hidden" id="percentOrderPending" value="{{ $percentOrderPending }}">
                        </div>
                        <div class="col">
                            <div id="chart30">
                                <input type="hidden" id="percentOrderProcessing" value="{{ $percentOrderProcessing }}">
                            </div>
                        </div>
                    </div>
                    <div id="chart19"></div>
                    <input type="hidden" id="countorder" value="{{ $countorder }}">
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
    <div class="row">
        <div class="col-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Khách Hàng Mới</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
                </div>
                <div class="customers-list p-3 mb-3">
                    @foreach($newCustomer as $cus)
                        <div class="customers-list-item d-flex align-items-center border-bottom p-2 cursor-pointer">
                            <div class="">
                                <img src="assets/images/avatars/avatar-7.png" class="rounded-circle" width="46"
                                    height="46" alt="" />
                            </div>
                            <div class="ms-2">
                                <h6 class="mb-1 font-14">{{ $cus->name }}</h6>
                                <p class="mb-0 font-13">{{ $cus->email }}</p>
                            </div>
                            <div class="list-inline d-flex customers-contacts ms-auto"> <a
                                    href="mailto:{{ $cus->email }}" class="list-inline-item"><i
                                        class='bx bxs-envelope'></i></a>
                                <a href="javascript:;" class="list-inline-item"><i class='bx bxs-microphone'></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-6 d-flex">
            <div class="card radius-10 w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Số lượng sản phẩm</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                    </div>
                    <div class="mt-5" id="chart15"></div>
                    <input type="hidden" id="countProductHasCategoryId1" value="{{ $countProductHasCategoryId1 }}">
                    <input type="hidden" id="countProductHasCategoryId2" value="{{ $countProductHasCategoryId2 }}">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Sen đá <span
                            class="badge bg-light-white-2 rounded-pill">{{ $countProductHasCategoryId1 }}</span>
                    </li>
                    <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">
                        Cây Xương rồng <span
                            class="badge bg-light-white-3 rounded-pill">{{ $countProductHasCategoryId2 }}</span>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!--end row-->

</div>
</div>
<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--><a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<!--plugins-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
</script>
<script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}">
</script>
<script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
</script>
<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}">
</script>
<script>
    $(document).ready(function () {
        $('#Transaction-History').DataTable({
            lengthMenu: [
                [6, 10, 20, -1],
                [6, 10, 20, 'Todos']
            ]
        });
    });
    var percentOrderCancel = document.getElementById('percentOrderCancel').value;

    e = {
        chart: {
            height: 180,
            type: "radialBar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "78%",
                    background: "transparent",
                    image: void 0,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                track: {
                    background: "rgba(255, 255, 255, 0.12)",
                    margin: 0,
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -8,
                        show: !0,
                        color: "#fff",
                        fontSize: "15px"
                    },
                    value: {
                        formatter: function (e) {
                            return e + "%"
                        },
                        color: "#fff",
                        fontSize: "25px",
                        show: !0,
                        offsetY: 10
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: ["#fff"],
                inverseColors: !1,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#fff"],
        series: [percentOrderCancel],
        stroke: {
            lineCap: "round",
            width: "5"
        },
        labels: ["Đơn Hủy"]

    };
    new ApexCharts(document.querySelector("#chart16"), e).render();

</script>
<script>
    var percentOrderSuccess = document.getElementById('percentOrderSuccess').value;
    var percentOrderPending = document.getElementById('percentOrderPending').value;
    var percentOrderProcessing = document.getElementById('percentOrderProcessing').value;
    var monthly_revenue = document.getElementById('monthly_revenue').value;
    var monthly_revenue = monthly_revenue.split(",");
    var countorder = document.getElementById('countorder').value;
    var countProductHasCategoryId1 = parseInt(document.getElementById('countProductHasCategoryId1').value);
    var countProductHasCategoryId2 = parseInt(document.getElementById('countProductHasCategoryId2').value);
    var sum = parseInt(countProductHasCategoryId1) + parseInt(countProductHasCategoryId2);
    var myArray = countorder.split(",");

    e = {
        chart: {
            height: 180,
            type: "radialBar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "78%",
                    background: "transparent",
                    image: void 0,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                track: {
                    background: "rgba(255, 255, 255, 0.12)",
                    margin: 0,
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -8,
                        show: !0,
                        color: "#fff",
                        fontSize: "15px"
                    },
                    value: {
                        formatter: function (e) {
                            return e + "%"
                        },
                        color: "#fff",
                        fontSize: "25px",
                        show: !0,
                        offsetY: 10
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: ["#fff"],
                inverseColors: !1,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#fff"],
        series: [percentOrderSuccess],
        stroke: {
            lineCap: "round"
        },
        labels: ["Đã Giao"]
    };
    new ApexCharts(document.querySelector("#chart17"), e).render();

    e = {
        chart: {
            height: 180,
            type: "radialBar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "78%",
                    background: "transparent",
                    image: void 0,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                track: {
                    background: "rgba(255, 255, 255, 0.12)",
                    margin: 0,
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -8,
                        show: !0,
                        color: "#fff",
                        fontSize: "15px"
                    },
                    value: {
                        formatter: function (e) {
                            return e + "%"
                        },
                        color: "#fff",
                        fontSize: "25px",
                        show: !0,
                        offsetY: 10
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: ["#fff"],
                inverseColors: !1,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#fff"],
        series: [percentOrderPending],
        stroke: {
            lineCap: "round"
        },
        labels: ["Đợi Xử Lý"]
    };
    new ApexCharts(document.querySelector("#chart18"), e).render();
    e = {
        chart: {
            height: 180,
            type: "radialBar",
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    margin: 0,
                    size: "78%",
                    background: "transparent",
                    image: void 0,
                    imageOffsetX: 0,
                    imageOffsetY: 0,
                    position: "front",
                    dropShadow: {
                        enabled: !1,
                        top: 3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                track: {
                    background: "rgba(255, 255, 255, 0.12)",
                    margin: 0,
                    dropShadow: {
                        enabled: !1,
                        top: -3,
                        left: 0,
                        blur: 4,
                        color: "rgba(0, 169, 255, 0.85)",
                        opacity: .65
                    }
                },
                dataLabels: {
                    showOn: "always",
                    name: {
                        offsetY: -8,
                        show: !0,
                        color: "#fff",
                        fontSize: "15px"
                    },
                    value: {
                        formatter: function (e) {
                            return e + "%"
                        },
                        color: "#fff",
                        fontSize: "25px",
                        show: !0,
                        offsetY: 10
                    }
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                shade: "light",
                type: "horizontal",
                shadeIntensity: .5,
                gradientToColors: ["#fff"],
                inverseColors: !1,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        colors: ["#fff"],
        series: [percentOrderProcessing],
        stroke: {
            lineCap: "round"
        },
        labels: ["Đang giao hàng"]
    };
    new ApexCharts(document.querySelector("#chart30"), e).render();



    e = {
        series: [{
            name: "Đơn Hàng",
            data: myArray
        }],
        chart: {
            foreColor: "rgba(255, 255, 255, 0.65)",
            type: "bar",
            height: 270,
            toolbar: {
                show: !1
            },
            zoom: {
                enabled: !1
            },
            dropShadow: {
                enabled: 0,
                top: 3,
                left: 14,
                blur: 4,
                opacity: .12,
                color: "#0d6efd"
            },
            sparkline: {
                enabled: !1
            }
        },
        markers: {
            size: 0,
            colors: ["#0d6efd"],
            strokeColors: "#fff",
            strokeWidth: 2,
            hover: {
                size: 7
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "30%",
                endingShape: "rounded"
            }
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 3,
            curve: "smooth"
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.12)',
            show: true,
        },
        colors: ["#fff"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            fixed: {
                enabled: !1
            },
            x: {
                show: !0
            },
            y: {
                formatter: function (e) {
                    return " " + e + " "
                }
            },
            marker: {
                show: !1
            }
        }
    };
    new ApexCharts(document.querySelector("#chart19"), e).render();

    e = {
        series: [countProductHasCategoryId1, countProductHasCategoryId2],
        chart: {
            height: 240,
            type: "donut"
        },
        legend: {
            position: "bottom",
            show: !1
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "80%"
                }
            }
        },
        colors: ["rgba(255, 255, 255, 0.70)", "#000", "rgba(255, 255, 255, 0.55)", "rgba(255, 255, 255, 0.25)"],
        xaxis: {
            categories: ["sen đá", "Cây xương rồng"]
        },
        dataLabels: {
            enabled: !1
        },

        tooltip: {
            enabled: true,
            theme: "dark",
            y: {
                formatter: function (e) {
                    return "$ " + e + " thousands"
                }
            }
        },
        labels: ["sen đá ($" + (countProductHasCategoryId1 / sum * 100).toFixed(1) + "%)", "Cây xương rồng ($" +
            (countProductHasCategoryId2 / sum * 100).toFixed(1) + "%)"
        ],
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 200
                },
                legend: {
                    position: "bottom"
                }
            }
        }]
    };
    new ApexCharts(document.querySelector("#chart15"), e).render();


    e = {
        series: [{
            name: "Doanh thu theo tháng",
            data: monthly_revenue
        }, ],
        chart: {
            foreColor: "#9ba7b2",
            type: "bar",
            height: 300,
            toolbar: {
                show: !1
            }
        },
        plotOptions: {
            bar: {
                horizontal: !1,
                columnWidth: "55%",
                endingShape: "rounded"
            }
        },
        grid: {
            borderColor: 'rgba(255, 255, 255, 0.12)',
            show: true,
        },
        dataLabels: {
            enabled: !1
        },
        stroke: {
            show: !0,
            width: 2,
            colors: ["transparent"]
        },
        colors: ["rgba(255, 255, 255, 0.60)", "#fff", "rgba(255, 255, 255, 0.25)"],
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            theme: "dark",
            y: {
                formatter: function (e) {
                    return "" + e + " VND"
                }
            }
        }
    };
    new ApexCharts(document.querySelector("#chart4"), e).render();

</script>

@endsection
