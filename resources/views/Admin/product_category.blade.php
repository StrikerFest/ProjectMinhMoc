@extends('admin.layout.default')
@section('content')
        <div class="page-wrapper">
            <div class="page-content">
                <hr />
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/addCategory" method="post">
                            @csrf
                            <label for="" class="form-label">Tên Loại Sản Phẩm</label>
                            <input class="form-control form-control-lg mb-3" type="text" placeholder="Nhập Tên Sản Phẩm"
                                aria-label=".form-control-lg example" name="name">
                            <button type="submit" class="btn btn-secondary px-5">Thêm</button>
                        </form>

                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Name</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productCategory as $productCategory1)
                                    <tr>
                                        <th scope="row">{{ $productCategory1->id }}</th>
                                        <td>{{ $productCategory1->name }}</td>
                                        <td>
                                            <button id="edit-btn" class="edit-btn btn btn-light px-5"
                                                data-id="{{ $productCategory1->id }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-edit text-white">
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                    </path>
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <script>
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-id');
                const nameTd = btn.parentNode.previousElementSibling;
                const name = nameTd.textContent;
                nameTd.innerHTML = `
            <form>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="name" class="form-control form-control-lg mb-3" value="${name}">
                <button type="submit" class="btn btn-success px-5 radius-30 ">Lưu</button>
                <button type="button" class="cancel-btn btn btn-danger px-5 radius-30">Hủy</button>
            </form>
        `;
                const form = nameTd.querySelector('form');
                form.addEventListener('submit', (event) => {
                    event.preventDefault();
                    const input = form.querySelector('input[name="name"]');
                    const newName = input.value.trim();
                    if (newName) {
                        fetch(`/admin/editCategory/${id}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'input[name="_token"]').value,
                                },
                                body: JSON.stringify({
                                    name: newName,
                                }),
                            })
                            .then(data => {
                                nameTd.textContent = newName;
                            })
                            .then(() => {
                                location.reload();
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        nameTd.innerHTML = name;
                    }
                });
                const cancelBtn = nameTd.querySelector('.cancel-btn');
                cancelBtn.addEventListener('click', () => {
                    console.log('cancel');
                    nameTd.textContent = name;
                    btn.style.display = "block";
                });
            });
        });
        document.getElementById("edit-btn").addEventListener("click", function () {
            // Xử lý khi click vào nút "edit"
            this.style.display = "none"; // Ẩn nút "edit"
        });
    </script>

@endsection
