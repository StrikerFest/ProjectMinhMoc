@extends('admin.layout.default')
@section('content')

<div class="page-wrapper">
    <div class="page-content">
        <div style="height: 600px;">
            <h6 class="mb-0 text-uppercase">Comments</h6>
            <hr />
            <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 row-cols-xl-2">
                @foreach($comment as $cmt)
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="http://127.0.0.1:8000/storage/images/{{ $cmt->image_product }}"
                                        alt="..." class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Trên khách hàng : {{ $cmt -> name_customer }} đã
                                            bình
                                            luận
                                            về sản phẩm {{ $cmt -> name_product }}</h5>
                                        <p class="card-text">Nội dung: {{ $cmt -> content }}</p>
                                        <p class="card-text"><small class="">Thời gian:
                                                {{ $cmt ->created_at }}</small>
                                        </p>
                                        <button type="button" class="btn btn-outline-danger btn-delete"
                                            data-id="{{ $cmt->id }}" data-bs-toggle="modal"
                                            data-bs-target="#exampleDangerModal">Xóa</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleDangerModal" tabindex="-1" aria-hidden="true" style="z-index: 999;">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h5 class="modal-title text-white">Xóa Bình luận</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-white">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    const btnDeleteElements = document.querySelectorAll('.btn-delete');
    btnDeleteElements.forEach(btnDelete => {
        btnDelete.addEventListener('click', () => {
            // Lấy ID của sản phẩm tương ứng
            const id = btnDelete.dataset.id;
            // Lấy phần tử modal-body của popup
            const modalBody = document.querySelector('#exampleDangerModal .modal-body');
            const modalFooter = document.querySelector(
                '#exampleDangerModal .modal-footer');

            // Cập nhật thông tin sản phẩm trong modal-body
            modalBody.innerHTML = `Bạn có muốn xóa bình luận này?`;
            modalFooter.innerHTML = `
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Không</button>
                    <a href="/admin/comment/deleteComment/${id}" ><button type="button" class="btn btn-light">Có</button></a>
                `;

        });
    });
</script>
@endsection
