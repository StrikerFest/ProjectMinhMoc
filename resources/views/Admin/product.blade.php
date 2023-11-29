@extends('admin.layout.default')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-3 col-xl-2">
                                <a href="/admin/product/addProduct" class="btn btn-light mb-3 mb-lg-0"><i class='bx bxs-plus-square'></i>Thêm Cây Mới</a>
                            </div>
                            <div class="col-lg-9 col-xl-10">
                                <form class="float-lg-end">
                                    <div class="row row-cols-lg-auto g-2">
                                        <div class="col-12">
                                            <div class="position-relative">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
            @foreach($product as $product1)
            <div class="col">
                <div class="card">
                    <img src="http://127.0.0.1:8000/storage/images/{{ $product1->image }}" class="card-img-top" alt="...">
                    <div class="">
                        <!-- @if($product1->quantity > 10)
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""
                                        style="color:black"> Còn Hàng</span> </div>
                                <blade
                                    elseif|%20(%24product1-%3Equantity%20%3E%200%20%26%26%20%24product-%3Equantity%20%3C%2010)%0D />
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""
                                        style="color:yellow"> sắp hết Hàng</span> </div>
@elseif($product1->quantity == 0)
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span class=""
                                        style="color:red"> Hết Hàng</span> </div>
@endif-->
                    </div>
                    <div class="card-body">
                        <h6 class="card-title cursor-pointer">{{ $product1->name }}</h6>
                        <div class="clearfix">
                            <p class="mb-0 float-start id_product" style="display: none;"><span>Id: </span>
                                {{ $product1->id }}
                            </p>
                            <br>
                            <p class="mb-0 float-start quantity" style="display: none;">
                                {{ $product1->quantity }}
                            </p>
                            <p class="mb-0 float-start quantity" style="display: none;"><span>Số Lượng:
                                </span>
                                {{ $product1->id_category }}
                            </p>
                            <br>
                            <p class="mb-0 float-start import_price" style="display: none;">
                                {{ $product1->import_price }}
                            </p>
                            <p class="mb-0 float-start export_price" style="display: none;">
                                {{ $product1->export_price }}
                            </p>
                            <p class="mb-0 float-start descrption" style="display: none;">
                                {{ $product1->description }}
                            </p>
                        </div>
                        <div class="d-flex align-items-center mt-3 fs-6" style="align-items: center;justify-content: center;">
                            <button type="button" class="btn btn-light btn-edit"><a href="/admin/product/editProductview/{{ $product1->id }}">Sửa</a></button>
                            <button type="button" class="btn btn-light ms-2 btn-view" data-bs-toggle="modal" data-bs-target="#exampleLargeModal">Xem</button>
                        </div>
                        @if($product1->Is_Active == 0)
                        <div class="d-flex align-items-center mt-3 fs-6" style="align-items: center;justify-content: center;">
                            <button type="button" class="btn btn-outline-danger btn-delete" data-id="{{ $product1->id }}" data-bs-toggle="modal" data-bs-target="#exampleDangerModal">Ngừng Bán</button>
                        </div>
                        @else
                        <div class="d-flex align-items-center mt-3 fs-6" style="align-items: center;justify-content: center;">
                            <button type="button" class="btn btn-outline-success btn-Sell" data-id="{{ $product1->id }}" data-bs-toggle="modal" data-bs-target="#exampleSuccessModal">Bán Lại</button>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

            @endforeach

        </div>
        {{ $product->links('admin.vendor.pagination') }}
        <!--end row-->

    </div>
</div>
<!--end page wrapper -->
<!--start overlay-->

<!-- popup -->

<div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <!-- <h3 class="product-title"></h3> -->
                        <!-- <img class="product-image" src="" alt=""> -->
                        <!-- <p class="product-quantity"></p>
                            <p class="product-price"></p>
                            <p class="product-description"></p> -->
                        <div class="col">
                            <div class="card">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="" alt="..." class="card-img product-image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title product-title"></h5>
                                            <p class="card-text product-quantity"></p>
                                            <p class="card-text product-price"></p>
                                            <p class="card-text export_price"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- popup delete -->
<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Ngưng Bán Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- popup -->
<div class="modal fade" id="exampleSuccessModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-success">
            <div class="modal-header">
                <h5 class="modal-title text-white">Bán lại sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-dark">Bán Lại</button>
            </div>
        </div>
    </div>
</div>
<!-- popupedit -->
<div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa Thông Tin Sản Phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="inputProductTitle" class="form-label">Tên Cây</label>
                    <input type="text" name="name" class="form-control ProductName" id="inputProductTitle" value="" placeholder="Nhập Tên Cây">
                    <p class="ProductName"></p>
                    <textarea id="mytextarea" name="mytextarea">Hello, World!</textarea>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- end popup -->
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>
<script>
    // Lấy các element cần dùng
    const viewButtons = document.querySelectorAll('.btn-view');
    const popup = document.getElementById('popup');
    const productTitle = popup.querySelector('.product-title');
    const productImage = popup.querySelector('.product-image');
    const productQuantity = popup.querySelector('.product-quantity');
    const productPrice = popup.querySelector('.product-price');
    const exportPrice = popup.querySelector('.export_price');
    const productDescription = popup.querySelector('.product-description');

    // Hàm hiển thị popup
    function openPopup() {
        popup.style.display = 'block';
    }

    // Hàm đóng popup
    function closePopup() {
        popup.style.display = 'none';
    }

    // Xử lý sự kiện khi người dùng click vào button Xem
    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Lấy thông tin sản phẩm được click
            const productCard = button.closest('.card');
            const idproduct = productCard.querySelector('.id_product').textContent;
            const title = productCard.querySelector('.card-title').textContent;
            const imageSrc = productCard.querySelector('.card-img-top').src;
            const quantity = productCard.querySelector('.quantity').textContent;
            const import_price = productCard.querySelector('.import_price').textContent;
            const export_price = productCard.querySelector('.export_price').textContent;
            const description = productCard.querySelector('.descrption').textContent;

            // Hiển thị thông tin sản phẩm trong popup
            productTitle.textContent = title;
            productImage.src = imageSrc;
            productQuantity.textContent = `Số lượng: ${quantity}`;
            productPrice.textContent = `${import_price}`;
            productDescription.textContent = description;
            exportPrice.textContent = `${export_price}`;
            openPopup();
        });
    });
    // Lấy tất cả các nút "Ngừng bán"
    const btnDeleteElements = document.querySelectorAll('.btn-delete');

    // Lặp qua từng nút để thêm xử lý sự kiện
    btnDeleteElements.forEach(btnDelete => {
        btnDelete.addEventListener('click', () => {
            // Lấy ID của sản phẩm tương ứng
            const id = btnDelete.dataset.id;
            // Lấy phần tử modal-body của popup
            const modalBody = document.querySelector('#exampleDangerModal .modal-body');
            const modalFooter = document.querySelector(
                '#exampleDangerModal .modal-footer');

            // Cập nhật thông tin sản phẩm trong modal-body
            modalBody.innerHTML = `Bạn có muốn ngừng bán sản phẩm có ID là ${id}?`;
            modalFooter.innerHTML = `
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Không</button>
                    <a href="/admin/product/deleteProduct/${id}" ><button type="button" class="btn btn-light">Có</button></a>
                `;

            // Hiển thị popup

        });
    });
    // Lấy tất cả các nút "Bán Lại"
    const btnSellElements = document.querySelectorAll('.btn-Sell');
    btnSellElements.forEach(btnSell => {
        btnSell.addEventListener('click', () => {
            // Lấy ID của sản phẩm tương ứng
            const id = btnSell.dataset.id;

            // Lấy phần tử modal-body của popup
            const modalBody = document.querySelector(
                '#exampleSuccessModal .modal-body');
            const modalFooter = document.querySelector(
                '#exampleSuccessModal .modal-footer');

            // Cập nhật thông tin sản phẩm trong modal-body
            modalBody.innerHTML = `Bạn có muốn bán lại sản phẩm có ID là ${id}?`;
            modalFooter.innerHTML = `
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Không</button>
                    <a href="/admin/product/deleteProduct/${id}" ><button type="button" class="btn btn-light">Có</button></a>
                `;

            // Hiển thị popup
        })
    })
    // Lấy tất cả các nút "Sửa"
    const btnEditElements = document.querySelectorAll('.btn-edit');
    btnEditElements.forEach(btnedit => {
        btnedit.addEventListener('click', () => {
            // lấy Id
            const id = btnedit.dataset.id;
            // Lấy thông tin sản phẩm được click
            const productCard = btnedit.closest('.card');
            const idproduct = productCard.querySelector('.id_product').textContent;
            const title = productCard.querySelector('.card-title').textContent;
            const imageSrc = productCard.querySelector('.card-img-top').src.trim();
            const quantity = productCard.querySelector('.quantity').textContent.trim();
            const import_price = productCard.querySelector('.import_price').textContent
                .trim();
            const export_price = productCard.querySelector('.export_price').textContent
                .trim();
            const description = productCard.querySelector('.descrption').textContent
                .trim();
            // Lấy phần tử modal-body của popup
            const modalBody = document.querySelector(
                '#exampleExtraLargeModal .modal-body');
            const modalFooter = document.querySelector(
                '#exampleExtraLargeModal .modal-footer');

            // Cập nhật thông tin sản phẩm trong modal-body

            modalBody.innerHTML = `
                <div class="card-body p-4">
                        <form action="/admin/product/editProduct/${id}" method="post" enctype="multipart/form-data">
                            {{ Method_field('POST') }}
@csrf
                            <div class="form-body mt-4">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="mb-3">
                                                <label for="inputProductTitle" class="form-label">Tên Cây</label>
                                                <input type="text" name="name" class="form-control" id="inputProductTitle" value="${title}" placeholder="Nhập Tên Cây">
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Mô tả</label>
                                                <textarea name="mytextarea" class="form-control" id="mytextarea"
                                            rows="3">${description}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="inputProductDescription" class="form-label">Ảnh Sản Phẩm</label>
                                                <input name="image" id="image-uploadify" type="file" accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf" multiple>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="border border-3 p-4 rounded">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="inputCostPerPrice" class="form-label">Giá Bán</label>
                                                    <input type="number" name="export_price" class="form-control" id="inputCostPerPrice" value="${export_price}" placeholder="00.00">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputProductType" class="form-label">Loại Cây</label>
                                                    <select name="id_category" class="form-select" id="inputProductType">
@foreach($productCategory as $productCategory)
                                                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>
@endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">Thay Đổi</button>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                        </form>
                    </div>
                `;
        })
    })
    tinymce.init({
        selector: '#mytextarea',
        // Add any additional configuration options for TinyMCE if needed
    });
</script>
@endsection