@extends('admin.layout.default')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <button type="button" class="btn btn-light px-5" data-bs-toggle="modal"
            data-bs-target="#exampleExtraLargeModal"><i class="text-white" data-feather="archive"></i> Nhập
            Hàng</button>
        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nhập Hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Chọn Sản Phẩm</label>
                            <select class="multiple-select" data-placeholder="Choose anything" multiple="multiple"
                                id="product-select">
                                @foreach($products as $product)
                                    <option value="{{ $product -> id }}">{{ $product -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <form method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                            {{ Method_field('POST') }}
                            @csrf
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="mb-3"> <label class="form-label">Ngày nhập hàng </label> <input type="text"
                                    class="form-control datepicker" /></div>
                            <div style="height: 400px; overflow: auto;">
                                <ul class="product-list" style="list-style: none">

                                </ul>
                            </div>
                            <input type="hidden" name="selectedProducts" id="selectedProductsInput">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Ngày nhập</th>
                            <th>Tổng Tiền nhập</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                            <tr>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->date }}</td>
                                <td>{{ $purchase->Total }}</td>
                                <td>
                                    <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                        data-bs-target="#exampleFullScreenModal"
                                        data-purchase-id="{{ $purchase->id }}">Xem Chi Tiết</button>
                                    <button type="button" class="btn btn-light" style="margin-left: 30px" onclick="editPurchase({{ $purchase->id }})">Sửa</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Ngày nhập</th>
                            <th>Tổng Tiền nhập</th>
                            <th>Hành Động</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleFullScreenModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chi Tiết Hóa Đơn</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card" style="z-index: 1000">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Mã nhập</th>
                                            <th>Mã Sản Phẩm</th>
                                            <th>Tên Sản Phẩm</th>
                                            <th>Số lượng</th>
                                            <th>Giá nhập</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody id="purchaseDetailsTableBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/datetimepicker/js/legacy.js') }}"></script>
<script src="{{ asset('assets/datetimepicker/js/picker.js') }}"></script>
<script src="{{ asset('assets/datetimepicker/js/picker.date.js') }}"></script>
<script src="{{ asset('assets/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
<script
    src="{{ asset('assets/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}">
</script>

<script>
    $('.datepicker').pickadate({
        selectMonths: true,
        selectYears: true
    })

</script>
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
    $('.multiple-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),

    });

</script>
<script>
    $('.multiple-select').on('change', async function () {
        var selectedValues = $(this).val();

        // Lấy danh sách các sản phẩm đã hiển thị
        var displayedProducts = $('.product-list li');
        var displayedProductIds = displayedProducts.map(function () {
            return $(this).data('product-id');
        }).get();

        // Xóa các sản phẩm không còn nằm trong danh sách được chọn
        $('.product-list').empty();

        // Thêm lại các sản phẩm mới vào danh sách
        for (var i = 0; i < selectedValues.length; i++) {
            var productId = selectedValues[i];
            try {
                await getProductDetails(productId);
            } catch (error) {
                console.log('Error retrieving product details for ID:', productId);
            }
        }

        // Cập nhật giá trị của phần tử input ẩn khi thêm sản phẩm mới vào danh sách
        $('#selectedProductsInput').val(selectedValues.join(','));

        async function getProductDetails(productId) {
            return new Promise(function (resolve, reject) {
                $.ajax({
                    url: '/api/admin/apigetproduct/' + productId,
                    type: 'GET',
                    success: function (data) {
                        var listItem = $('<li data-product-id="' + data.id + '">' +
                            data.name + '</li>');
                        var inputField = $(
                            '<input type="hidden" name="products[' + data.id +
                            '][id]" value="' + data.id + '">' +
                            '<input class="form-control mb-3" type="number" name="products[' +
                            data.id +
                            '][quantity]" placeholder="Nhập Số Lượng" required>' +
                            '<div class="invalid-feedback">Vui lòng nhập số lượng</div>' +
                            '<input class="form-control mb-3" type="number" placeholder="Giá Nhập" name="products[' +
                            data.id +
                            '][price]" required>' +
                            '<div class="invalid-feedback">Vui lòng nhập giá</div>'
                        );
                        listItem.append(inputField);
                        $('.product-list').append(listItem);
                        resolve();
                    },
                    error: function (error) {
                        reject(error);
                    }
                });
            });
        }
    });

</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()

</script>

<script>
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        var selectedProducts = document.querySelector('#selectedProductsInput').value;
        var date = document.querySelector('.datepicker').value;
        var productListItems = document.querySelectorAll('.product-list li');
        var products = Array.from(productListItems).map(function (item) {
            var productId = item.getAttribute('data-product-id');
            var quantity = item.querySelector('input[name="products[' + productId + '][quantity]"]')
                .value;
            var price = item.querySelector('input[name="products[' + productId + '][price]"]').value;

            return {
                productId: productId,
                quantity: quantity,
                price: price,
            };
        });
        console.log(products);

        var csrfToken = document.querySelector('input[name="_token"]').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/admin/apiaddpurchase');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log('Purchase added successfully');
                // Handle success response here
            } else {
                console.log('Error adding purchase:', xhr.status);
                // Handle error response here
            }
        };
        xhr.onerror = function () {
            console.log('Request error');
            // Handle request error here
        };
        xhr.send(JSON.stringify({
            products: products,
            date: date,
        }));
    });

</script>

<script>
    const viewDetailButtons = document.querySelectorAll('[data-bs-target="#exampleFullScreenModal"]');
    viewDetailButtons.forEach(button => {
        button.addEventListener('click', () => {
            const purchaseId = button.getAttribute('data-purchase-id');

            fetch(`/api/admin/apigetpurchase/${purchaseId}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('purchaseDetailsTableBody');
                    tableBody.innerHTML = ''; // Xóa dữ liệu cũ trong bảng

                    data.forEach(purchaseDetail => {
                        const row = document.createElement('tr');

                        const purchaseIdCell = document.createElement('td');
                        purchaseIdCell.textContent = purchaseDetail.id;
                        row.appendChild(purchaseIdCell);

                        const purchaseIdPurchaseCell = document.createElement('td');
                        purchaseIdPurchaseCell.textContent = purchaseDetail.id_purchase;
                        row.appendChild(purchaseIdPurchaseCell);

                        const purchaseIdProductCell = document.createElement('td');
                        purchaseIdProductCell.textContent = purchaseDetail.id_product;
                        row.appendChild(purchaseIdProductCell);

                        const productNameCell = document.createElement('td');
                        productNameCell.textContent = purchaseDetail.name;
                        row.appendChild(productNameCell);

                        const quantityCell = document.createElement('td');
                        quantityCell.textContent = purchaseDetail.quantity;
                        row.appendChild(quantityCell);

                        const priceCell = document.createElement('td');
                        priceCell.textContent = purchaseDetail.price;
                        row.appendChild(priceCell);

                        const totalCell = document.createElement('td');
                        totalCell.textContent = purchaseDetail.total;
                        row.appendChild(totalCell);

                        tableBody.appendChild(row);
                    });
                })
                .catch(error => {
                    console.error(error);
                });
        });
    });

</script>

<script>
    function editPurchase(purchaseId) {
        // Chuyển hướng sang trang mới và gửi kèm purchase_id
        window.location.href = 'edit-purchase/' + purchaseId;
    }
</script>






@endsection
