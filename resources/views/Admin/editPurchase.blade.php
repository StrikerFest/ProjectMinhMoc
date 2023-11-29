@extends('admin.layout.default')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <button type="button" class="btn btn-light px-5" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal"
            style="margin-bottom: 50px"><i class="text-white" data-feather="archive"></i>Thêm Sản Phẩm</button>
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
                            <input type="hidden" name="purchaseId" value="{{ $purchaseId }}">
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
        <form>
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Mã</th>
                        <th>Mã Hóa Đơn</th>
                        <th>Mã Sản Phẩm</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá nhập</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="_token2" value="{{ csrf_token() }}">

                    @foreach($purchaseDetails as $purchaseDetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span name="purchase_id">{{ $purchaseDetail->id }}</span></td>
                            <td>{{ $purchaseDetail->id_purchase }}</td>
                            <td>
                                <span
                                    onclick="editField(this, 'id_product', '{{ trim($purchaseDetail->id_product) }}')">
                                    {{ trim($purchaseDetail->id_product) }}

                                </span>
                            </td>
                            <td>{{ $purchaseDetail->name }}</td>
                            <td>
                                <input type="number" name="quantity[]" value="{{ $purchaseDetail->quantity }}">
                            </td>
                            <td>
                                <input type="number" name="price[]" value="{{ $purchaseDetail->price }}">
                            </td>
                            <td>{{ $purchaseDetail->total }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <button type="button" class="btn btn-light px-5" onclick="saveData()">Lưu</button>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>

<!-- ------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------- -->
<!--                                         JS                                                        -->
<!-- ------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------------------------------------------------------------- -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
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
    document.querySelector('form').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        var selectedProducts = document.querySelector('#selectedProductsInput').value;
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

        var purchaseId = document.querySelector('input[name="purchaseId"]').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/admin/apiinsertpurchase');
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
            purchaseId: purchaseId,
        }));
    });

</script>
<script>
    function editField(element, field, id) {
        const value = element.textContent.trim(); // Remove leading and trailing whitespace
        const input = document.createElement('input');
        input.type = 'text';
        input.value = value;
        input.addEventListener('blur', function () {
            updateField(this, field, id);
        });
        element.replaceWith(input);
        input.focus();
    }

    function updateField(input, field, id) {
        const value = input.value;
        console.log(`Update ${field} of ${id} to ${value}`);
        input.parentElement.textContent = value;
    }

</script>
<script>
    function saveData() {
        const rows = Array.from(document.querySelectorAll('#example2 tbody tr'));
        const data = rows.map(row => {
            const idProductElement = row.querySelector('td:nth-child(4) span');
            const idProduct = idProductElement.textContent.trim();
            const id = row.querySelector('td:nth-child(2) span').textContent.trim();
            const quantity = row.querySelector('td:nth-child(6) input').value;
            const price = row.querySelector('td:nth-child(7) input').value;
            return {
                id,
                idProduct,
                quantity,
                price
            };
        });
        var csrfToken = document.querySelector('input[name="_token2"]').value;
        console.log(csrfToken);
        var purchaseId = document.querySelector('input[name="purchaseId"]').value;
        console.log(purchaseId);
        console.log(data);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/admin/apiupdatepurchase');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onload = function () {
            if (xhr.status === 200) {
                document.getElementById('successMessage').style.display = 'block'; // Hiển thị thông báo thành công
                setTimeout(function () {
                    window.location.href = "/admin/purchase"; // Chuyển hướng trang sau một khoảng thời gian
                }, 1000);
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
            data: data,
            purchaseId: purchaseId,
        }));
    }

    function editField(element, field, id) {

        const value = element.textContent.trim();
        element.innerHTML = `<input type="text" value="${value}" onblur="updateField(this, '${field}', '${id}')">`;
        element.querySelector('input').focus();
    }

    function updateField(input, field, id) {
        const value = input.value;
        console.log(`Update ${field} of ${id} to ${value}`);
        input.parentElement.innerHTML = value;
    }

</script>
@endsection
