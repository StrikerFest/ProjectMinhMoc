@extends('admin.layout.default')
@section('content')

@if($product==null)
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin/product"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <form action="/admin/addNewProduct2" method="POST" enctype="multipart/form-data">
                        {{ Method_field('POST') }}
                        @csrf
                        @method('POST')
                        <h5 class="card-title">Thêm Sản Phẩm</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tên Cây</label>
                                            <input required type="text" name="name" class="form-control" id="inputProductTitle"
                                                placeholder="Nhập Tên Cây">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control"
                                                id="inputProductDescription" rows="3"></textarea>
                                        </div>
                                        <input required type="file" name="image" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputPrice" class="form-label">Giá nhập</label>
                                                <input name="import_price" type="number" class="form-control"
                                                    id="inputPrice" placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Giá Bán</label>
                                                <input required min="0" type="number" name="export_price" class="form-control"
                                                    id="inputCostPerPrice" placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Số Lượng</label>
                                                <input required min="1" value="1" type="number" name="quantity" class="form-control"
                                                    id="inputStarPoints" placeholder="00.00">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Loại Cây</label>
                                                <select name="id_category" class="form-select" id="inputProductType">
                                                    @foreach($productCategory as $productCategory1)
                                                        <option value="{{ $productCategory1->id }}">
                                                            {{ $productCategory1->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" onclick="validateEmpty()" class="btn btn-light">Thêm Sản Phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin/product"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <form action="/admin/product/editProduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        {{ Method_field('POST') }}
                        @csrf
                        @method('POST')
                        <h5 class="card-title">Sửa Sản phẩm</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle"  class="form-label">Tên Cây</label>
                                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="inputProductTitle"
                                                placeholder="Nhập Tên Cây">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control"
                                                id="inputProductDescription" rows="3">{{$product->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <p>Ảnh sản phẩm</p>
                                            <input name="image" type="file" value="{{$product->image}}" accept="image/*">
                                                {{$product->image}}
                                            </input>
                                            <hr>
                                            <p>Ảnh cũ</p>
                                            <img src="{{ asset('storage/images/'. $product->image ) }}" class="card-img-top" alt="">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Giá Bán</label>
                                                <input type="number" value="{{$product->export_price}}" name="export_price" class="form-control"
                                                    id="inputCostPerPrice" placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Số Lượng</label>
                                                <input type="text" value="{{$product->quantity}}" name="quantity" class="form-control"
                                                    id="inputStarPoints" >
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Loại Cây</label>
                                                <select name="id_category" class="form-select" id="inputProductType">
                                                    @foreach($productCategory as $productCategory1)
                                                        <option value="{{ $productCategory1->id }}">
                                                            {{ $productCategory1->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light">Sửa Sản Phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
<!--end page wrapper -->
<!--start overlay-->
@endsection
